@extends('admin.dashboardPart.mainBody')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
@section('mainBody')

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Add Product</h5>
        <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
    </div>

    <!-- sl-page-title -->
    <form action="{{ route('add.product')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add a New Product</h6>
            <p class="mg-b-20 mg-sm-b-30">Red (*) mark must be required!</p>
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_name" placeholder="Enter Product name" required>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_code" placeholder="Enter Product Code" required>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_quantity" placeholder="Enter Product Quantity" required>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Category" name="category_id" required>
                                <option label="Choose Category" selected disabled></option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Sub Category: </label>
                            <select class="form-control select2" data-placeholder="Choose Sub Category" name="subcategory_id">
                                <option label="Choose Sub Category" selected disabled></option>

                            </select>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id" required>
                                <option label="Choose Brand" selected disabled></option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Size: </label>
                            <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput">
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_color" id="color" data-role="tagsinput" required>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="selling_price" placeholder="Enter Product Price" required>
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Discount Price: </label>
                            <input class="form-control" type="text" name="discount_price" placeholder="Enter Product Discount Price" >
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="product_details" id="summernote" required></textarea>

                        </div>
                    </div>
                    <!-- col-12 -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Video Link: </label>
                            <input class="form-control" type="text" name="video_link" placeholder="Enter Product Video Link">
                        </div>
                    </div>
                    <!-- col-12 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label ">Image One (Main Thumbnail): <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL1(this);" required>
                                <span class="custom-file-control"></span>
                            </label>
                            <br><br>
                            <img id="one">
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label ">Image Two: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" required>
                                <span class="custom-file-control"></span>
                            </label>
                            <br><br>
                            <img id="two">
                        </div>
                    </div>
                    <!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label ">Image Three: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);" required>
                                <span class="custom-file-control"></span>
                            </label>
                            <br><br>
                            <img id="three">
                        </div>
                    </div>
                    <!-- col-4 -->
                </div>
                <!-- row -->
                <hr>
                <br>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="main_slider" value="1">
                            <span>Main Slider</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_deal" value="1">
                            <span>Hot Deal</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="best_rated" value="1">
                            <span>Best Rated</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="mid_slider" value="1">
                            <span>Mid Slider</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_new" value="1">
                            <span>Hot New</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="trend" value="1">
                            <span>Trend</span>
                        </label>
                    </div><!-- col-4 -->

                </div>
                <hr>
                <br>

                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5">Save Product</button>
                    <a href="{{route('products.all')}}" class="btn btn-secondary">Cancel</a>
                </div>
                <!-- form-layout-footer -->
            </div>
            <!-- form-layout -->
        </div>
    </form>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

//Ajax Code for Sub Category
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {

                $.ajax({
                    url: "{{ url('/get/subcategory/') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {

                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');

                        });
                    },
                });

            } else {
                alert('danger');
            }

        });
    });
</script>
<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#two')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#three')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection