@extends('admin.admin_master')
@section('title') Brand @endsection
@section('categories')  active show-sub @endsection
@section('addCategory')  active  @endsection

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
                         <h4 class="mb-3">Update Category
                         </h4>
                         <form action="{{route('category.update',$categories->id)}}" method="POST">
                             @csrf
                             @method('put')
                             <div class="form-group">
                               <label for="category_name">Category_name</label>
                               <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category_Name" value="{{$categories->category_name}}">
                               @error('category_name')
                                   <p class="text-danger mt-2">{{$message}}</p>
                               @enderror
                             </div>
                             <div class="form-group">
                                 <button class="btn btn-primary">Update Category</button>
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
