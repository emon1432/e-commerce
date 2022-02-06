@extends('admin.dashboardPart.mainBody')
@section('mainBody')


<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Products</h5>
        <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
    </div>
    <!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Product List</h6>
        <!-- <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> -->

        <div class="table-wrapper">
            <a href="{{route('product.add')}}" class="btn btn-sm btn-info" style="float: right; margin:10px;">Add New Product</a>
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p" style="text-align: center;">Product Code</th>
                        <th class="wd-15p" style="text-align: center;">Product Name</th>
                        <th class="wd-15p" style="text-align: center;">Price (tk)</th>
                        <th class="wd-15p" style="text-align: center;">Image</th>
                        <th class="wd-15p" style="text-align: center;">Category</th>
                        <th class="wd-15p" style="text-align: center;">Brand</th>
                        <th class="wd-15p" style="text-align: center;">Quantity</th>
                        <th class="wd-15p" style="text-align: center;">Status</th>
                        <th class="wd-20p" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->product_code}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->selling_price}}</td>
                        <td><img src="{{URL::to($product->image_one)}}" height="50px;" width="50px;"></td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>{{$product->product_quantity}}</td>
                        <td>
                            @if($product->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-sm btn-warning" title="Edit" id="edit"><i class="fa fa-edit"></i></a>
                            <a href="{{url('/product/show/'.$product->id)}}" class="btn btn-sm btn-info" title="Show" id="show"><i class="fa fa-eye"></i></a>
                            @if($product->status == 1)
                            <a href="{{url('/product/inactive/'.$product->id)}}" class="btn btn-sm btn-danger" title="Inactive" id="inactive"><i class="fa fa-thumbs-down"></i></a>
                            @else
                            <a href="{{url('/product/active/'.$product->id)}}" class="btn btn-sm btn-success" title="Active" id="active"><i class="fa fa-thumbs-up"></i></a>
                            @endif
                            <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-sm btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- table-wrapper -->
    </div>
    <!-- card -->
</div>


@endsection