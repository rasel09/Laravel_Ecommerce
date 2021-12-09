@extends('admin.admin_master')
@section('title') Product @endsection
@section('products')  active show-sub @endsection
@section('addProduct')  active  @endsection

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
                         <form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
                             @csrf
                             @method('put')
                             <div class="card pd-20 pd-sm-40">
                                <h6 class="card-body-title">Update Product</h6>
                                <div class="form-layout">
                                  <div class="row mg-b-25">
                                    <div class="col-lg-4">
                                      <div class="form-group">
                                        <label class="form-control-label">Product_name: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_name"   value="{{$products->product_name}}" placeholder="Product_name">

                                        @error('product_name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror

                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group">
                                        <label class="form-control-label">Product_code: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_code"  placeholder="Product_code" value="{{$products->product_code}}">

                                        @error('product_code')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror

                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group">
                                        <label class="form-control-label">Product_price: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="price"  placeholder="Product_price" value="{{$products->price}}">

                                        @error('price')
                                        <p class="text-danger">{{$message}}</p>
                                       @enderror

                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product_quantity: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="quantity"  placeholder="Product_quantity" value="{{$products->quantity}}">
                                      </div>
                                      @error('quantity')
                                      <p class="text-danger">{{$message}}</p>
                                  @enderror
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="brind_id">
                                          <option label="Choose Brand"></option>
                                          @foreach ($brands  as $brand)
                                          <option value="{{$brand->id}}"  {{$brand->id==$products->brind_id? 'selected': ''}}>{{$brand->brand_name}}</option>
                                          @endforeach
                                        </select>

                                        @error('brind_id')
                                        <p class="text-danger">{{$message}}</p>
                                       @enderror

                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                          <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                          <select class="form-control select2" name="category_id">
                                            <option label="Choose Category"></option>
                                            @foreach ($categories as $category)
                                                
                                            <option value="{{$category->id}}" {{$category->id==$products->category_id? 'selected' : ''}}>{{$category->category_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                       @enderror
                                      </div>

                                      <div class="col-lg-12">
                                        <div class="form-group mg-b-10-force">
                                          <label class="form-control-label">Short_description: <span class="tx-danger">*</span></label>
                                        <textarea name="short_description" id="summernote"  rows="6" class="form-control">{{$products->short_description}}</textarea>
                                        </div>
                                        @error('short_description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group mg-b-10-force">
                                          <label class="form-control-label">Long_description: <span class="tx-danger">*</span></label>
                                        <textarea name="long_description" id="summernote2"  rows="6" class="form-control">{{$products->long_description}}</textarea>
                                        </div>
                                        @error('long_description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                      </div>
                                      
                                      <div class="col-lg-4">
                                        <div class="form-group mg-b-10-force">
                                          <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                                         <input type="file" name="image" class="from-control" value="{{$products->image}}">
                                        </div>
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                      </div>
                                    
                                  </div><!-- row -->
                                  <div class="mb-2">
                                    <img src="{{asset($products->image)}}" alt="" style="width: 120px;">
                              </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                                </div>
                              </div>
                         </form>
                     
                 
             </div>
         </div>
        </div>
      </div>
  </div>
@endsection
