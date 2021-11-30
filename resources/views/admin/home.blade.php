@extends('admin.admin_master')
@section('title') Home @endsection
    
@section('dashbord')  active @endsection
    

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{route('admin.index')}}">Admin</a>
      <a class="breadcrumb-item" href="">Home</a>
    </nav>
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Home Page</h5>
      </div>
    </div>
  </div>
@endsection
