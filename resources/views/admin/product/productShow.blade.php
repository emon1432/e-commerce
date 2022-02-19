@extends('admin.dashboardPart.mainBody')
@section('mainBody')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Product Details</h5>
        <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
    </div>
    <!-- sl-page-title -->
    <form>
        <div class="card pd-20 pd-sm-40">
            <!-- <h6 class="card-body-title">Add a New Product</h6> -->
            

            <div class="form-layout">
            <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-sm btn-info" style="float: right; margin:10px;">Edit This Product</a>

                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->product_name}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->product_code}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->product_quantity}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->category_name}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Sub Category: </label><br>
                            <strong>{{$product->subcategory_name}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Brand: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->brand_name}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Size: </label><br>
                            <strong>{{$product->product_size}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->product_color}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label><br>
                            <strong>{{$product->selling_price}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Discount Price: </label><br>
                            <strong>{{$product->discount_price}}</strong>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label><br>
                            <strong>{!! $product->product_details !!}</strong>
                        </div>
                    </div>
                    <!-- col-12 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Video Link: </label><br>
                            <strong><a href="{{$product->video_link}}">{{$product->video_link}}</a></strong>
                        </div>
                    </div>
                    <!-- col-12 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label ">Image One (Main Thumbnail): <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <img src="{{URL::to($product->image_one)}}" height="300px" width="250px">
                            </label>
                            <br><br><br>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label ">Image Two: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <img src="{{URL::to($product->image_two)}}" height="300px" width="250px">
                            </label>
                            <br><br><br>

                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label ">Image Three: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <img src="{{URL::to($product->image_three)}}" height="300px" width="250px">
                            </label>
                            <br><br><br><br><br><br><br>
                        </div>
                    </div>
                    <!-- col-4 -->
                </div>
                <!-- row -->
                <hr>
                <br>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="">
                            @if($product->main_slider == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Main Slider</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="">
                            @if($product->hot_deal == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Hot Deal</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="">
                            @if($product->best_rated == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Best Rated</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="">
                            @if($product->mid_slider == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Mid Slider</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="">
                            @if($product->hot_new == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Hot New</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="">
                            @if($product->trend == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Trend</span>
                        </label>
                    </div><!-- col-4 -->

                </div>
                <hr>
                <br>
                <!-- form-layout-footer -->
            </div>
            <!-- form-layout -->
        </div>
    </form>


</div>


@endsection