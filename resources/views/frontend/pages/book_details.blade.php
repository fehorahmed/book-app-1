@extends('frontend.master')

@section('title')
    Book Category
@endsection

@section('styles')
    <style>
        .card_height {
            height: 65px;
        }
    </style>
@endsection

@section('main-content')
    <main class="main">
        <div class="features-section bg-gray">
            <div class="container">
                <h5 class="subtitle"><a href="{{ route('home') }}">লাইব্রেরি</a> » বইয়ের ধরণ</h5>
                <div class="row mt-5">
                    <script>
                        {{ $adShow->details_page_ad_one ?? '' }}
                    </script>
                    <div class="col-lg-8 mx-auto">
                        <img src="{{ !empty($book->image) ? asset('upload/book_image/' . $book->image) : null }}"
                            class="rounded mx-auto d-block" alt="">
                        <div>
                            <p>{!! $book->description !!}</p>
                        </div>

                        <a href="{{ route('book_download', encrypt($book->id)) }}" id="download_id"
                            class="btn btn-success btn-sm">Download
                            Pdf</a>
                        @if ($game_app_request)
                            <a href="{{ route('book_gift_coin', [
                                'id' => encrypt($book->id),
                                'other_user' => isset($req_data['other_user']) ? $req_data['other_user'] : null,
                                'other_visiting_id' => isset($req_data['other_visiting_id']) ? $req_data['other_visiting_id'] : null,
                                'other_url' => isset($req_data['other_url']) ? $req_data['other_url'] : null,
                            ]) }}"
                                id="gift_coin_id" class="btn btn-success btn-sm">Get Coin</a>
                        @endif


                        <div class="accordion" id="accordionExample">
                            @foreach ($bookPage as $data)
                                <div class="card mt-1">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                {{ $data->content_name ?? '' }}
                                            </button>
                                            <button class="btn btn-link btn-block text-right" type="button"
                                                data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}"
                                                aria-expanded="true" aria-controls="collapseOne" style="margin-top: -22px;">
                                                Read More
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $loop->iteration }}" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <h5>{!! $data->description ?? '' !!}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div><!-- End .col-lg-3 -->
                </div><!-- End .row -->
                <div class="row">

                    <div class="col-lg-8 mx-auto">
                        <h4>Like And Comments</h4>
                        <div class="card">
                            <h4 class="card-title mt-1 mx-3">
                                <a href="{{ route('like_add', $book->id) }}"> Like:</a> {{ $likes }}
                            </h4>
                        </div>

                        @foreach ($comments as $comment)
                            <div class="card">

                                <p class="card-title mt-1 mx-3">
                                    User: <strong><span>{{ $comment->user->email ?? '' }}</span></strong>
                                    <span style="color: rgb(177, 97, 197)"
                                        class="float-right">{{ date_format($comment->created_at, 'd-m-Y, H:i:s A') ?? '' }}</span>
                                <p class="ml-3">{{ $comment->comment_text ?? '' }}</p>
                                </p>
                            </div>
                        @endforeach

                        <form action="{{ route('comment_add', $book->id) }}">
                            <label for="">Comments</label>
                            <textarea name="comment_text" id="" cols="108" rows="10" class="from-control"></textarea>
                            <input type="submit" class="btn btn-success btn-sm" value="Post Comment">
                        </form>
                    </div>
                </div>
                <script>
                    {{ $adShow->details_page_ad_two ?? '' }}
                </script>
                <script>
                    {{ $adShow->details_page_ad_three ?? '' }}
                </script>
                <script>
                    {{ $adShow->details_page_ad_four ?? '' }}
                </script>
                <script>
                    {{ $adShow->details_page_ad_five ?? '' }}
                </script>
            </div><!-- End .container -->
        </div><!-- End .features-section -->
    </main>
@endsection

@section('scripts')
    <script>
        let clickCount = 0;
        var total_count = '{{ $book->ad_count }}';


        $('#download_id').click(function() {
            clickCount++;

            if (clickCount <= total_count) {
                // Prevent the default action of the link
                event.preventDefault();
                // Open the fixed URL in a new tab
                const fixedUrl = '{{ $book->ad_link }}';
                window.open(fixedUrl, '_blank');
            }
        })
        $('#gift_coin_id').click(function() {
            clickCount++;
            if (clickCount <= total_count) {
                // Prevent the default action of the link
                event.preventDefault();
                // Open the fixed URL in a new tab
                const fixedUrl = '{{ $book->ad_link }}';
                window.open(fixedUrl, '_blank');
            }
        })
    </script>
@endsection
