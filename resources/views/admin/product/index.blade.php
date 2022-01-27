@extends('admin\layouts\master')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                      {{Session::get('success')}}
                      <button class="close" data-dismiss="alert" type="button">x</button>
                    </div>
                    @endif
                    <h4 class="card-title">Product table</h4>
                    <p class="card-description"><code><a href="{{route('admin.product.store')}}" class="btn btn-primary">Add Product</a></code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Title </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Images </th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $product)
                          <tr>
                            <td> {{$loop->index +1}} </td>
                            <td> {{$product->title}} </td>
                            <td>
                              $ {{$product->price}}
                            </td>
                            <td> {{$product->quantity}} </td>
                            <td> 
                              <img style="height: 100px; width: 100px; text-align:" src="productimg/{{$product->img}}" alt="">
                            </td>
                            <td>
                              <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-primary">Update</a>
                            </td>
                            <td>
                              <a href="{{route('admin.product.delete',$product->id)}}" class="btn btn-danger">Delete</a>
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
