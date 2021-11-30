@extends('admin.admin_master')
@section('title') Brand @endsection
@section('brand')  active show-sub @endsection
@section('addBrand')  active  @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{route('admin.index')}}">Admin</a>
      <a class="breadcrumb-item" href="">Home</a>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
         <div class="row">
             <div class="col-lg-8">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="mb-3">Update Brand
                         </h4>
                         <form action="{{route('brand.update',$brands->id)}}" method="POST">
                             @csrf
                             @method('put')
                             <div class="form-group">
                               <label for="brand_name">Brand_name</label>
                               <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="Brand_Name" value="{{ $brands->brand_name}}">
                               @error('brand_name')
                                   <p class="text-danger mt-2">{{$message}}</p>
                               @enderror
                             </div>
                             <div class="form-group">
                                 <button class="btn btn-primary">Update Brand</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
        </div>
      </div>
  </div>
@endsection
