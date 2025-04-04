@extends('backend.layouts.backend_master')
@section('title')
    {{-- @include('backend.admin.users.partials.title') --}}
@endsection
@section('styles')
    <style>
        .btn-sm-custom{
            padding: 5px 5px;
            line-height: 16px;
            font-size: 16px;
        }
        .btn-sm-custom i {
            margin-right: 0px !important;
        }
        .social-widget-card-custom{
            cursor: pointer;
        }

        #users_table_filter{
            text-align: right;
        }
    </style>
@endsection
@section('admin-content')
<section>

    <div class="row mt-2">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Home Page Ad Setting</h6>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="{{ route('home_page_ad_setting.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Banner 468x60</label>
                                    <input type="text" name="home_page_ad_one" value="{{ old('home_page_ad_one', $adCheck->home_page_ad_one ?? '' ) }}" id="details_page_ad_one" class="form-control">
                                    @error('home_page_ad_one')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Banner 300x250</label>
                                    <input type="text" name="home_page_ad_two" value="{{ old('home_page_ad_two', $adCheck->home_page_ad_two ?? '' ) }}" id="details_page_ad_two" class="form-control">
                                    @error('home_page_ad_two')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Banner 320x50</label>
                                    <input type="text" name="home_page_ad_three" value="{{ old('home_page_ad_three', $adCheck->home_page_ad_three ?? '' ) }}" id="details_page_ad_three" class="form-control">
                                    @error('home_page_ad_three')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Banner 160x300</label>
                                    <input type="text" name="home_page_ad_four" value="{{ old('home_page_ad_four', $adCheck->home_page_ad_four ?? '' ) }}" id="details_page_ad_four" class="form-control">
                                    @error('home_page_ad_four')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Banner 160x600</label>
                                    <input type="text" name="home_page_ad_five" value="{{ old('home_page_ad_five', $adCheck->home_page_ad_five ?? '' ) }}" id="details_page_ad_five" class="form-control">
                                    @error('home_page_ad_five')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                       <div class="row">
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <label for="" class="form-label"></label>
                                <input type="submit" class="btn btn-info" value="Update">
                            </div>
                        </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify();

            $('#users_table').DataTable({
                aLengthMenu: [[10,25, 50, 100, 1000, -1], [10,25, 50, 100, 1000, "All"]],
                "columnDefs": [
                    {
                        "targets": 0,
                        "className": "text-center",
                    },
                    {
                        'bSortable': false,
                        'bSearchable': false,
                        "className": "text-center",
                        'aTargets': [-1]
                    }
                ]
            });

            $('.verifyUser').on('click',function(){
                let id = $(this).data('id')
                swal.fire({
                    title: "Are you sure?",
                    text: "User will be verified!",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3fc3ee",
                    confirmButtonText: "Yes, verify it!"
                }).then((result) => {
                    if (result.value) {
                        $("#verifyForm"+id).submit();
                    }
                })
            });

            $('.unverifyUser').on('click',function(){
                let id = $(this).data('id')
                swal.fire({
                    title: "Are you sure?",
                    text: "User will be unverified!",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3fc3ee",
                    confirmButtonText: "Yes, unverify it!"
                }).then((result) => {
                    if (result.value) {
                        $("#unverifyForm"+id).submit();
                    }
                })
            });

            $('.deleteItem').on('click',function(){
                let id = $(this).data('id')
                swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.value) {
                        $("#deleteForm"+id).submit();
                    }
                })
            });
        });
    </script>
@endsection
