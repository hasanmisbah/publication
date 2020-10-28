@extends('layouts.admin')
@section('title', 'Add New Customer')
@section('page-title', 'Add New Customer')
@section('css')
@endsection
@section('js')

@endsection
@section('main-content')
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="{{ route('customers.index') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="text">Back To Customer List</span>
                </a>
            </div>
            <div class="card-body col-11 mx-auto">
            <form method="POST" action="{{ route('customers.update', $customer->id) }}">     
                  @csrf
                  @method('PATCH')       
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Customer Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="customer_name" class="form-control" id="name" placeholder="Customer Name" value="{{$customer->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Customer Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="customer_email" class="form-control" id="email" placeholder="Customer Email" value="{{$customer->email}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label">Customer Mobile</label>
                        <div class="col-sm-10">
                            <input type="phone" name="customer_phone" class="form-control" id="phone" placeholder="Customer Phone Number" value="{{$customer->phone}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label">Customer Address</label>
                        <div class="col-sm-10">
                            <textarea name="customer_address" class="form-control" id="address" placeholder="Customer Address">{{$customer->address}}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-3 ml-auto">
                            <button class="btn btn-primary text-right btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
          </div>
@endsection
