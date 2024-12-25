{{-- <header class="header">
    <div class="header-top header_size" style="background-color: #1d6c4f">
        <div class="container">
            <div class="header-left d-none d-sm-block">
                <a href="{{ route('home') }}">
                    <p class="top-message text-uppercase text-white">Bangla Library</p>
                </a>
            </div>
            <!-- End .header-left -->

            <div class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100">
                <div class="header-dropdown dropdown-expanded d-none d-lg-block">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="{{ route('all_book') }}" class="text-white">নতুন সব বই</a></li>
                            <li><a href="{{ route('book_writer') }}" class="text-white">লেখক</a></li>
                            <li><a href="#" class="text-white">সিরিজ</a></li>
                            <li><a href="{{ route('book_category') }}" class="text-white">বইয়ের ধরণ</a></li>
                            <li><a href="#" class="text-white">পুরানো সব ক্যাটাগরি</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->
                <span class="separator"></span>
                <span class="separator"></span>

                <div class="">
                    @if (session('customerId'))
                        <a href="{{ route('book_page') }}" class="text-white mx-5">Book</a>
                        <a href="{{ route('own_book_list', encrypt(session('customerId'))) }}" class="text-white mx-5">নিজ বই </a>
                        <a href="{{ route('customer_profile') }}" class="text-white mx-5">Profile</a>
                        <a href="{{ route('customer_logout') }}" class="text-white mx-5">Logout</a>
                    @else
                        <a href="{{ route('customer_login') }}" class="text-white mx-5">My Account →</a>
                    @endif
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->

                <span class="separator"></span>
                <!-- End .social-icons -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-top -->
    <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">

            <!-- End .header-left -->
            <style>

                .searchBox input {
                    width: 100%;
                    background: #fff;
                    padding: 10px 20px;
                    border-radius: 50px;
                    border: none;
                }

                .searchData {
                    background: #fff;
                    color: #000;
                    padding: 10px;
                    width: calc(100% - 20px);
                    margin: 0 auto;
                    border-radius: 10px;
                    margin-top: 10px;
                    text-align: left;
                    display: none;
                    float: left;
                }

            </style>
            <div class="header-right w-lg-max">
                <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">


                    <div class="searchBox">
                        <input type="text" placeholder="Search here..." id="searchBox">
                        <div class="searchData"></div>
                    </div>

                    <script>

                        $(document).ready(function() {
                        $('#searchBox').on('input', function() {
                            var inputValue = $(this).val();
                            if (inputValue.trim() !== '') {

                                $('.searchData').css('display' , 'block');

                                var AjaxURL = '/searchbook';
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "get",
                                    url: AjaxURL,
                                    data: {
                                        id: inputValue
                                    },
                                    success: function(result) {
                                        $('.searchData').html(result);
                                    }
                                });

                            } else {

                                $('.searchData').css('display' , 'none');
                                $('.searchData').html(' ');

                            }
                        });
                        });
                    </script>


                </div>
                <!-- End .header-search -->
                <!-- End .dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->

    <div class="sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu">
                    <a href="{{ route('all_book') }}" class="text-white btn btn_color">বই</a>
                    <a href="{{ route('book_writer') }}" class="text-white btn btn_color">লেখক</a>
                    <a href="#" class="text-white btn btn_color">সিরিজ</a>
                    <a href="{{ route('book_category') }}" class="text-white btn btn_color">ধরন</a>

                    <a href="#" rel="noopener" class="text-white btn btn_color float-right">পুরানো ক্যাটাগরি</a>
                    <li class="float-right"><a href="#" class="pl-5"></a></li>
                </ul>
                <p class="text-white mt-1 font_size">Bangla Books (বাংলা বই)</p>
                <p class="text-white mt-1 font_size">Read Bengali Books online free. PDF download is not required.</p>
                <p class="text-white mt-1 font_size"></p>
            </nav>
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-bottom -->
</header> --}}


<style>
    .navDiv {
        /* background: #222529; */
        height: 50px;
        margin-bottom: 20px;
    }

    .navbar-brand {
        font-size: 30px;
        font-weight: bold;
        font-style: italic;
    }

    .navbar-nav {
        justify-content: flex-end;
    }

    .navbar {
        padding: 10px !important;
    }

    .nav-link {
        font-size: 18px;
        margin: 0 5px;
    }

    .loginBtn {
        padding: 5px 15px !important;
        border-radius: 5px;
        background: #3d7542;
        color: #fff !important;
        font-size: 18px;
        font-weight: bold;
    }

</style>

<div class="navDiv">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container"> <!-- centers Navbar elements in a container -->

              <a class="navbar-brand" href="/">Bangla Library</a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto"><!-- ml-auto shifts nav items to right -->
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is('all_book') ? 'active': '' }}" href="{{ route('all_book') }}">
                        নতুন সব বই
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is('book_writer') ? 'active': '' }}" href="{{ route('book_writer') }}">
                        লেখক
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                        সিরিজ
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is('book_category') ? 'active': '' }}" href="{{ route('book_category') }}">
                        বইয়ের ধরণ
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                        পুরানো সব ক্যাটাগরি
                    </a>
                  </li>

                  @if (session('customerId'))
                    @php
                        $user = App\Models\User::where('id', '=', session('customerId'))->first();
                    @endphp
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $user->name ?? '' }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('book_page') }}">Book</a>
                        <a class="dropdown-item" href="{{ route('own_book_list', encrypt(session('customerId'))) }}">নিজ বই</a>
                        <a class="dropdown-item" href="{{ route('customer_profile') }}">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('customer_logout') }}">Logout</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-bs-target="#searchModal" data-target="#exampleModalCenter">
                          <img class="image_height" src="{{ asset('img/search.png') }}" width="30" alt="Search" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Search Product" data-bs-original-title="Search Product">
                        </a>
                    </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link loginBtn" href="{{ route('customer_login') }}">
                                Login?
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-bs-target="#searchModal" data-target="#exampleModalCenter">
                              <img class="image_height" src="{{ asset('img/search.png') }}" width="30" alt="Search" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Search Product" data-bs-original-title="Search Product">
                            </a>
                        </li>

                  @endif
                </ul>
              </div>

            </div>
        </nav>
    </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><b>Search Book</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <style>

            .searchBox input {
                width: 100%;
                background: #fff;
                padding: 10px 20px;
                border-radius: 50px;
                /* border: none; */
            }

            .searchData {
                background: #fff;
                color: #000;
                padding: 10px;
                width: calc(100% - 20px);
                margin: 0 auto;
                border-radius: 10px;
                margin-top: 10px;
                text-align: left;
                display: none;
                float: left;
            }

        </style>
        <div class="modal-body">
            <div class="searchBox">
                <input type="text" placeholder="Search here..." id="searchBox">
                <div class="searchData"></div>
            </div>
        </div>

        <script>

            $(document).ready(function() {
            $('#searchBox').on('input', function() {
                var inputValue = $(this).val();
                if (inputValue.trim() !== '') {

                    $('.searchData').css('display' , 'block');

                    var AjaxURL = '/searchbook';
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "get",
                        url: AjaxURL,
                        data: {
                            id: inputValue
                        },
                        success: function(result) {
                            $('.searchData').html(result);
                        }
                    });

                } else {

                    $('.searchData').css('display' , 'none');
                    $('.searchData').html(' ');

                }
            });
            });
        </script>
      </div>
    </div>
  </div>

{{-- <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
    <div class="container">

        <!-- End .header-left -->
        <style>

            .searchBox input {
                width: 100%;
                background: #fff;
                padding: 10px 20px;
                border-radius: 50px;
                border: none;
            }

            .searchData {
                background: #fff;
                color: #000;
                padding: 10px;
                width: calc(100% - 20px);
                margin: 0 auto;
                border-radius: 10px;
                margin-top: 10px;
                text-align: left;
                display: none;
                float: left;
            }

        </style>
        <div class="header-right w-lg-max">
            <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">


                <div class="searchBox">
                    <input type="text" placeholder="Search here..." id="searchBox">
                    <div class="searchData"></div>
                </div>

                <script>

                    $(document).ready(function() {
                    $('#searchBox').on('input', function() {
                        var inputValue = $(this).val();
                        if (inputValue.trim() !== '') {

                            $('.searchData').css('display' , 'block');

                            var AjaxURL = '/searchbook';
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "get",
                                url: AjaxURL,
                                data: {
                                    id: inputValue
                                },
                                success: function(result) {
                                    $('.searchData').html(result);
                                }
                            });

                        } else {

                            $('.searchData').css('display' , 'none');
                            $('.searchData').html(' ');

                        }
                    });
                    });
                </script>


            </div>
            <!-- End .header-search -->
            <!-- End .dropdown -->
        </div>
        <!-- End .header-right -->
    </div>
    <!-- End .container -->
</div> --}}

{{-- <div class="sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
    <div class="container">
        <nav class="main-nav w-100">
            <ul class="menu">
                <a href="{{ route('all_book') }}" class="text-white btn btn_color">বই</a>
                <a href="{{ route('book_writer') }}" class="text-white btn btn_color">লেখক</a>
                <a href="#" class="text-white btn btn_color">সিরিজ</a>
                <a href="{{ route('book_category') }}" class="text-white btn btn_color">ধরন</a>

                <a href="#" rel="noopener" class="text-white btn btn_color float-right">পুরানো ক্যাটাগরি</a>
                <li class="float-right"><a href="#" class="pl-5"></a></li>
            </ul>
            <p class="text-white mt-1 font_size">Bangla Books (বাংলা বই)</p>
            <p class="text-white mt-1 font_size">Read Bengali Books online free. PDF download is not required.</p>
            <p class="text-white mt-1 font_size"></p>
        </nav>
    </div>
    <!-- End .container -->
</div> --}}

