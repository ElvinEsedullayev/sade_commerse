@extends('admin\layouts\master')
@section('content')

<div class="col-md-12 grid-margin stretch-card">
  
                <div class="card">
                  <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                      {{Session::get('success')}}
                      <button class="close" data-dismiss="alert" type="button">x</button>
                    </div>
                    @endif
                    <h4 class="card-title">Product Form
                      <p style="float: right;" class="card-description"><code><a href="{{route('admin.product.index')}}" class="btn btn-info">All Product</a></code>
                    </p>
                    </h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('admin.product.create')}}">
                      @csrf
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                          <input style="color: red;" type="text" class="form-control" name="title" id="exampleInputMobile" placeholder="Title">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                          <input style="color: red;" type="text" class="form-control" name="price" id="exampleInputMobile" placeholder="Price">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-9">
                          <input style="color: red;" type="text" class="form-control" name="quantity" id="exampleInputMobile" placeholder="Quantity">
                        </div>
                      </div>
                     <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input  type="file" class="form-control" name="img" id="exampleInputMobile" placeholder="Quantity">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="exampleTextarea1" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                          <textarea style="color: red;"  name="description"  cols="81" rows="5" id="exampleTextarea1">Description</textarea>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                  </div>
                </div>
              </div>
@endsection
