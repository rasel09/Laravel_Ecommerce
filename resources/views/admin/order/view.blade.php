@extends('admin.admin_master')
@section('title') Order @endsection
@section('order')  active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{route('admin.index')}}">Admin</a>
      <a class="breadcrumb-item" href="">Home</a>
    </nav>
    <div class="sl-pagebody">
      <div class="sl-page-title">
       <div class="row">
           <div class="col-lg-10">
            @if (Session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>{{Session('success')}}</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
            @endif
               <div class="card">
                   <div class="card-body">
                       <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">Shipping Order</h6>
                        <div class="form-layout">
                          <div class="row mg-b-25">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{   $shippings->name}}"  readonly >
                              </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{   $shippings->email}}"  readonly>
                              </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label">Phone No: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="phone" value="{{   $shippings->phone}}"  readonly>
                                </div>
                              </div><!-- col-4 -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="address" value="{{   $shippings->address}}"  readonly>
                                </div>
                              </div><!-- col-4 -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="state" value="{{   $shippings->state}}" readonly>
                                </div>
                              </div><!-- col-4 -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label class="form-control-label">Post_code: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="post_code" value="{{   $shippings->post_code}}" readonly>
                                </div>
                              </div><!-- col-4 -->
                          </div><!-- row -->
                        </div><!-- form-layout -->
                      </div><!-- card -->
                   </div>
               </div>
               
               <div class="card mt-3">
                <div class="card-body">
                    <div class="card pd-20 pd-sm-40">
                     <h6 class="card-body-title">Orders</h6>
                     <div class="form-layout">
                       <div class="row mg-b-25">
                         <div class="col-lg-4">
                           <div class="form-group">
                             <label class="form-control-label">Invoice_no: <span class="tx-danger">*</span></label>
                             <input class="form-control" type="text" name="invoice_no" value="{{    $orders->invoice_no}}"  readonly >
                           </div>
                         </div><!-- col-4 -->
                         <div class="col-lg-4">
                           <div class="form-group">
                             <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                             <input class="form-control" type="email" name="payment_type" value="{{    $orders->payment_type}}"  readonly>
                           </div>
                         </div><!-- col-4 -->
                         <div class="col-lg-4">
                             <div class="form-group">
                               <label class="form-control-label">Totle: <span class="tx-danger">*</span></label>
                               <input class="form-control" type="text" name="totle" value="{{    $orders->totle}}"  readonly>
                             </div>
                           </div><!-- col-4 -->
                           <div class="col-lg-4">
                             <div class="form-group">
                               <label class="form-control-label">Subtotle: <span class="tx-danger">*</span></label>
                               <input class="form-control" type="text" name="subtotle" value="{{    $orders->subtotle}}"  readonly>
                             </div>
                           </div><!-- col-4 -->
                           <div class="col-lg-4 mt-4">
                             <div class="form-group">
                               <label class="form-control-label">Copon_discount: <span class="tx-danger">*</span></label>
                              @if ($orders->copon_discount==Null)
                                  <span class="badge badge-danger">No</span>
                                  @else
                                  <span class="badge badge-primary">{{$orders->discoute}}</span>
                              @endif
                             </div>
                           </div><!-- col-4 -->
                           
                       </div><!-- row -->
                     </div><!-- form-layout -->
                   </div><!-- card -->
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="mb-4">Order Item
                    </h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Image</th>
                                <th>Product name</th>
                                <th>Product Quantity</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $orderItem)
                            <tr>
                                <td>{{$orderItem->id}}</td>
                                <td>
                                       <img src="{{asset($orderItem->product->image)}}" alt="" style="width: 80px;">
                                </td>
                                <td>{{$orderItem->product->product_name}}</td>
                                <td>{{$orderItem->product_qty}}</td>
                       
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
             
                </div>
            </div>
           </div>
       </div>
      </div>
    </div>
  </div>
@endsection 
