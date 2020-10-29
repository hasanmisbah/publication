@extends('layouts.admin')
@section('title', 'Customers')
@section('page-title', 'Customers')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('customers.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                <span class="text">Add New Customer</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($customers as $index => $customer)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>
                                <a data-name="{{$customer->name}}"
                                   data-email="{{$customer->email}}"
                                   data-phone="{{$customer->phone}}"
                                   data-address="{{$customer->address}}"
                                   data-customer="{{$customer->id}}"
                                   type="button" data-toggle="modal" data-target="#customerModal" href="#"
                                   class="customer-info btn btn-success btn-sm btn-circle d-inline-flex mb-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a
                                    data-name="{{$customer->name}}"
                                    data-email="{{$customer->email}}"
                                    data-phone="{{$customer->phone}}"
                                    data-address="{{$customer->address}}"
                                    data-customer="{{$customer->id}}"
                                    type="button" data-toggle="modal"
                                    data-target="#editModal"
                                    href="#"
                                    class="btn btn-info btn-sm btn-circle edit-customer d-inline-flex mb-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form class="form-inline d-inline-flex deleteform" method="POST"
                                      action="{{ route('customers.destroy', $customer->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-circle d-inline-flex mb-1" type="submit"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- Modal --}}

    <!-- Customer Edit Modal  -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm" method="POST" action="{{ route('customers.update', '') }}">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="customer_name" class="form-control" id="name"
                                       placeholder="Customer Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Customer Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="customer_email" class="form-control" id="email"
                                       placeholder="Customer Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label">Customer Mobile</label>
                            <div class="col-sm-10">
                                <input type="phone" name="customer_phone" class="form-control" id="phone"
                                       placeholder="Customer Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label">Customer Address</label>
                            <div class="col-sm-10">
                                <textarea name="customer_address" class="form-control" id="address"
                                          placeholder="Customer Address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Customer Edit Modal  -->

    <!-- Customer Show modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title customer-name">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="phone"></p>
                    <p class="email"></p>
                    <p class="address"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{-- /Modal --}}
@endsection
@section('js')
    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
    <script>
        $(function () {

            $('.edit-customer').on('click', function () {
                let form = $('#editForm');
                let action = form.attr('action') + `/${$(this).data().customer}`
                form.find('input[name="customer_name"]').val($(this).data().name);
                form.find('input[name="customer_email"]').val($(this).data().email);
                form.find('input[name="customer_phone"]').val($(this).data().phone);
                form.find('textarea[name="customer_address"]').val($(this).data().address);
                form.attr('action', action);
            });


            $('.customer-info').on('click', function (e) {
                e.preventDefault();
                $('.customer-name').text($(this).data().name);
                $('.phone').text($(this).data().phone);
                $('.email').text($(this).data().email);
                $('.address').text($(this).data().address);
            });

            $('.deleteform').on('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure you want to delete?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dd3333',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'delete!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).submit().then(function () {
                            alert('hello');
                        });
                    } else {
                        Swal.fire(
                            'Nothing Happened',
                            'Your Data is Safe'
                        )
                    }
                });
            });
        })
    </script>
@endsection
