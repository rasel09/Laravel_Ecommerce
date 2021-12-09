@extends('admin.admin_master')
@section('title') Product @endsection
@section('products')  active show-sub @endsection
@section('manageProduct')  active  @endsection

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
                       <h4 class="mb-4">all Product
                           <a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right">add Product</a>
                       </h4>
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Sr No</th>
                                   <th>Product_name</th>
                                   <th>Product_quantity</th>
                                   <th>Category</th>
                                   <th>Image</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($products as $product)
                               <tr>
                                   <td>{{$product->id}}</td>
                                   <td>{{$product->product_name}}</td>
                                   <td>{{$product->quantity}}</td>
                                   <td>{{$product->category->category_name}}</td>
                                   <td>
                                       <img src="{{asset($product->image)}}" alt="" style="width: 80px;">
                                   </td>
                                   <td>
                                       @if ($product->status==1)
                                           <span class="badge badge-primary">Active</span>
                                           @else
                                           <span class="badge badge-danger">Inactive</span>
                                       @endif
                                   </td>
                                   <td>
                                       <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                       <form class="d-inline" action="{{route('product.destroy',$product->id)}}" method="POST">
                                           @csrf
                                           @method('delete')
                                           <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Are you shere data deleted!')"></i></button>
                                       </form>
                                       @if ($product->status==1)
                                       <a href="{{route('product.inactive',$product->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i></a>
                                       @else
                                       <a href="{{route('product.active',$product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i></a>
                                       @endif
                                   </td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                       {{$products->links('vendor.pagination.bootstrap-4')}}
                   </div>
               </div>
           </div>
       </div>
      </div>
    </div>
  </div>
@endsection
