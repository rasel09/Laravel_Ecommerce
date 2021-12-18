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
                       <h4 class="mb-4">all Order
                       </h4>
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Sr No</th>
                                   <th>Invoice_No</th>
                                   <th>Payment_type</th>
                                   <th>Totle</th>
                                   <th>Subtotle</th>
                                   <th>Copon_discount</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ( $orders as $order)
                               <tr>
                                   <td>{{$order->id}}</td>
                                   <td>{{$order->invoice_no}}</td>
                                   <td>{{$order->payment_type}}</td>
                                   <td>{{$order->totle}}$</td>
                                   <td>{{$order->subtotle}}$</td>
                                   <td>
                                       @if ($order->copon_discount==Null)
                                           <span class="badge badge-danger">No</span>
                                           @else
                                           <span class="badge badge-primary">Yes</span>
                                       @endif
                                   </td>
                                   <td>
                                       <a href="{{route('order.view', $order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                       <form class="d-inline" action="{{route('order.destoy', $order->id)}}" method="POST">
                                           @csrf
                                           @method('delete')
                                           <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Are you shere data deleted!')"></i></button>
                                       </form>
                                      
                                   </td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                       {{$orders->links('vendor.pagination.bootstrap-4')}}
                   </div>
               </div>
           </div>
       </div>
      </div>
    </div>
  </div>
@endsection 
