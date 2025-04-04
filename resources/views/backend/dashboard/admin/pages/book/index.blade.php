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
    <div class="row">
        @include('backend.layouts.partials.messages')
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Books List</h6>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                        <div class="float-lg-end">
                            <a href="{{ route('book.create') }}" class="btn btn-info float-right">Add new</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive p-0">
                <table class="table table-bordered table-striped align-items-center mb-0" id="users_table">
                <thead>
                    <tr>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Sl No</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Writer</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($books as $item)
                    <tr>
                    <td><p class="text-xs text-center font-weight-medium mb-0">{{ $loop->iteration }}</p></td>
                    <td>
                        <p class="text-xs text-center font-weight-medium mb-0">{{ $item->category->name ?? '' }}</p>
                    </td>
                    <td>
                        <p class="text-xs text-center font-weight-medium mb-0">{{ $item->writer->name ?? '' }}</p>
                    </td>
                    <td>
                        <p class="text-xs text-center font-weight-medium mb-0">{{ $item->name ?? '' }}</p>
                    </td>
                    <td class="align-middle text-center">
                        @if ($item->status == 1)
                            <span class="badge badge-sm bg-success font-weight-bold">Active</span>
                        @elseif ($item->status == 0)
                            <span class="badge badge-sm bg-danger font-weight-bold">InActive</span>
                        @else

                        @endif
                        </td>
                    <td>
                        <a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit User Details" href="{{ route('book.edit', $item->id) }}">
                            <i class="fa fa-edit"></i></i>
                        </a>
                        <button class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white deleteItem" title="Delete User" data-id="{{$item->id}}">
                            <i class="fa fa-trash"></i>
                        </button>
                        <form id="deleteForm{{$item->id}}" action="{{route('book.destroy', [$item->id])}}" method="post" style="display:none">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                    class="icofont icofont-check"></i> Confirm Delete</button>
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-times"></i> Cancel</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            // alert('ok');
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
