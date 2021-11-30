@extends('admin.admin_master')
@section('title') category @endsection
@section('categories')  active show-sub @endsection
@section('manageCategory')  active  @endsection

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
                       <h4 class="mb-4">all Category
                           <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-right">add Category</a>
                       </h4>
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Sr No</th>
                                   <th>Category_name</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($categories as $category)
                               <tr>
                                   <td>{{$category->id}}</td>
                                   <td>{{$category->category_name}}</td>
                                   <td>
                                       @if ($category->status==1)
                                           <span class="badge badge-primary">Active</span>
                                           @else
                                           <span class="badge badge-danger">Inactive</span>
                                       @endif
                                   </td>
                                   <td>
                                       <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                       <form class="d-inline" action="{{route('category.destroy',$category->id)}}" method="POST">
                                           @csrf
                                           @method('delete')
                                           <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Are you shere data deleted!')"></i></button>
                                       </form>
                                       @if ($category->status==1)
                                       <a href="{{route('category.inactive',$category->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i></a>
                                       @else
                                       <a href="{{route('category.active',$category->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i></a>
                                       @endif
                                   </td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                       {{$categories->links('vendor.pagination.bootstrap-4')}}
                   </div>
               </div>
           </div>
       </div>
      </div>
    </div>
  </div>
@endsection
