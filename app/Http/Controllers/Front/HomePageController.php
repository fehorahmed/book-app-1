<?php

namespace App\Http\Controllers\Front;

use App\Models\Book;
use App\Models\Footer;
use App\Models\Studio;
use App\Models\Writer;
use App\Models\Gallery;
use App\Models\HomeVideo;
use App\Models\Subscribe;
use App\Models\PrivacyTerm;
use App\Models\BookCategory;
use App\Models\StudioHeader;
use Illuminate\Http\Request;
use App\Models\GalleryHeader;
use App\Models\BookPageContent;
use App\Models\HomeThirdSection;
use App\Models\GalleryTopSection;
use App\Models\HomeSecondSection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\AdManage;
use App\Models\Like;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Http;
use Session;

class HomePageController extends Controller
{
    public function home()
    {
        $categories = BookCategory::where('status', 1)->get();
        $books = Book::where('status', 1)->with('writer')->latest()->take(6)->get();
        $categoryBooks = Book::where('category_id', 6)->with('writer')->take(6)->get();
        $islamicBooks = Book::where('category_id', 3)->with('writer')->take(6)->get();
        $popularBooks = Book::orderBy('like_count', 'desc')->with('writer')->take(6)->get();
        $user = User::first();
        return view('frontend.pages.home', compact('books', 'categoryBooks', 'islamicBooks', 'categories', 'user', 'popularBooks'));
    }
    public function bookCategory()
    {
        $user = User::first();
        $categories = BookCategory::where('status', 1)->get();
        return view('frontend.pages.book_category', compact('categories', 'user'));
    }
    public function bookWriter()
    {
        $user = User::first();
        $writers = Writer::where('status', 1)->get();
        return view('frontend.pages.book_writer', compact('writers', 'user'));
    }

    public function newAllBook()
    {
        $user = User::first();
        $books = Book::where('status', 1)->orderBy('id', 'desc')->get();
        $categories = BookCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $writers = Writer::where('status', 1)->get();
        return view('frontend.pages.new_all_book', compact('books', 'user', 'categories', 'writers'));
    }
    public function bookDetails(Request $request, $id)
    {

        $request->validate([
            "other_user" => 'nullable',
            "other_visiting_id" => 'nullable',
            "other_url" => 'nullable',
        ]);
        $req_data = $request->all();
        $data = decrypt($id);
        $book = book::find($data);
        $bookPage = BookPageContent::where('book_id', $book->id)->get();
        $likes = Like::where('book_id', $data)->get()->count();
        $comments = Comment::where('book_id', $data)->get();
        $ads = AdManage::where('book_id', $data)->get();

        return view('frontend.pages.book_details', compact('book', 'bookPage', 'likes', 'comments', 'ads', 'req_data'));
    }
    public function bookGiftCoin(Request $request, $id)
    {
        $request->validate([
            "other_user" => 'nullable',
            "other_visiting_id" => 'nullable',
            "other_url" => 'nullable',
        ]);
        // dd($request->all());
        $data = decrypt($id);
        $book = book::find($data);
        $req_data = $request->all();


        $url = 'http://127.0.0.1:8000/web_routing_visit_count/'.$request->other_visiting_id ;

        $response = Http::get($url,$req_data);
        $res = $response->json();

        // Check the response status and content


        if ($res['status'] == true) {
            $responseData = $response->json(); // If the response is JSON
            // Or use $response->body() if the response is a plain string

            $message = $res['message'];
        } else {
            $message = $res['message'];

        }

        return view('frontend.pages.book_gift_coin', compact('book','req_data','message'));
    }
    public function bookDownload($id)
    {
        $data = decrypt($id);
        $book = book::find($data);
        return view('frontend.pages.book_download', compact('book'));
    }


    public function searchbook(Request $req)
    {
        $user = User::first();
        $searchData = DB::table('books')
            ->where('name', 'LIKE', "%{$req->id}%")->get();

        return view('frontend.partials.searchView', compact('searchData', 'user'));
    }
    public function categoryWiseBook(Request $request, $id)
    {
        $user = User::first();
        $data = decrypt($id);
        $books = book::where('category_id', $data)->get();
        return view('frontend.pages.category_wise_book', compact('books', 'user'));
    }
    public function writerWiseBook(Request $request, $id)
    {
        $user = User::first();
        $data = decrypt($id);
        $writerWiseBooks = book::where('writer_id', $data)->get();
        return view('frontend.pages.writer_wise_book', compact('writerWiseBooks', 'user'));
    }

    public function getBook(Request $request)
    {
        $user = User::first();
        if ($request->category_id == 0) {
            $writerWiseBooks = book::get();
        } else {
            $writerWiseBooks = book::where('category_id', $request->category_id)->get();
        }
        return view('frontend.pages.book_filter', compact('writerWiseBooks', 'user'));
    }

    public function writerWiseGetBook(Request $request)
    {
        $user = User::first();
        if ($request->writer_id == 0) {
            $writerWiseBooks = book::get();
        } else {
            $writerWiseBooks = book::where('writer_id', $request->writer_id)->get();
        }
        return view('frontend.pages.book_filter_writer_wise', compact('writerWiseBooks', 'user'));
    }

    public function likeAdd(Request $request, $book_id)
    {
        $oldLikes = Like::where('user_id', '=', Session::get('customerId'))
            ->where('book_id', '=', $book_id)
            ->get();
        $oldLikeCount = count($oldLikes);
        if ($oldLikeCount) {
            $book = Book::find($book_id);
            $book->like_count = $book->like_count - 1;
            $book->save();
            $like = Like::find($oldLikes[0]['id']);
            $like->delete();
        } else {
            $book = Book::find($book_id);
            $book->like_count = $book->like_count + 1;
            $book->save();
            $like = new Like();
            $like->user_id = Session::get('customerId');
            $like->book_id = $book_id;
            $like->save();
        }
        $user = User::first();
        return redirect()->back();
    }

    public function commentAdd(Request $request, $book_id)
    {

        $like = new Comment();
        $like->user_id = Session::get('customerId');
        $like->book_id = $book_id;
        $like->comment_text = $request->comment_text;
        $like->save();
        $user = User::first();
        return redirect()->back();
    }

    public function bookPage()
    {
        $categories = BookCategory::where('status', 1)->get();
        $writers = Writer::where('status', 1)->get();
        return view('frontend.pages.customer_book_page', compact('writers', 'categories'));
    }
}
