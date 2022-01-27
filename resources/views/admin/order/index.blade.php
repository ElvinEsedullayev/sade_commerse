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
                    <h4 class="card-title">Order table</h4>
                   
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Phone </th>
                            <th> Product Name </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Adress </th>
                            <th> status </th>
                            <th>Update</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($orders as $order)
                          <tr>
                            <td> {{$loop->index +1}} </td>
                            <td> {{$order->name}} </td>
                            <td> {{$order->phone}} </td>
                            <td> {{$order->product_name}} </td>
                            <td>
                              $ {{$order->price}}
                            </td>
                            <td> {{$order->quantity}} </td>
                            <td> 
                              {{$order->adress}}
                            </td>
                            <td> {{$order->status}} </td>
                            <td>
                              
                              <a href="{{route('admin.order.update',$order->id)}}" class="btn btn-@if(($order->status) == 'not delivered')primary @elseif(($order->status) =='delivered')success @endif">Delivered</a>
                             
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
