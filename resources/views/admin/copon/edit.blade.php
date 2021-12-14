@extends('admin.admin_master')
@section('title') Brand @endsection
@section('copon')  active show-sub @endsection
@section('addCopon')  active  @endsection

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
                         <h4 class="mb-3">Update Copon
                         </h4>
                         <form action="{{route('copon.update',$copons->id)}}" method="POST">
                             @csrf
                             @method('put')
                             <div class="form-group">
                               <label for="copon_name">Copon_name</label>
                               <input type="text" name="copon_name" id="copon_name" class="form-control" placeholder="Copon_Name" value="{{$copons->copon_name}}">
                               @error('copon_name')
                                   <p class="text-danger mt-2">{{$message}}</p>
                               @enderror
                             </div>
                             <div class="form-group">
                                <label for="discoute">Copon_Discoute </label>
                                <input type="text" name="discoute" id="discoute" class="form-control" placeholder="Copon_Discoute %"  value="{{$copons->discoute}}">
                                @error('discoute')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                @enderror
                              </div>
                             <div class="form-group">
                                 <button class="btn btn-primary">Update Copon</button>
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
