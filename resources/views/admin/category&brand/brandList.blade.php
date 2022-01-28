@extends('admin.dashboardPart.mainBody')
@section('mainBody')


<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Brand</h5>
        <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
    </div>
    <!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand List</h6>
        <!-- <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> -->

        <div class="table-wrapper">
            <a href="" class="btn btn-sm btn-warning" style="float: right; margin:10px;" data-toggle="modal" data-target="#modaldemo3">Add new</a>
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p" style="text-align: center;">ID</th>
                        <th class="wd-15p" style="text-align: center;">Brand name</th>
                        <th class="wd-15p" style="text-align: center;">Brand logo</th>
                        <th class="wd-20p" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach($brands as $key => $brand)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td><img src="{{ asset($brand->brand_logo) }}" style="height: 40px; width:70px;"></td>
                        <td>
                            <a href="{{url('/brand/edit/'.$brand->id)}}" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modaldemo4{{$brand->id}}"> Edit </a>
                            <a href="{{url('/brand/delete/'.$brand->id)}}" class="btn btn-sm btn-danger" id="delete"> Delete </a>
                        </td>
                    </tr>
                    <!-- LARGE MODAL -->
                    <div id="modaldemo4{{$brand->id}}" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-header pd-x-20">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Brand</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{url('/brand/update/'.$brand->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body pd-20">

                                        <div class="mb-3">
                                            <label for="exampleInputBrand" class="form-label">Brand Name </label>
                                            <input type="text" class="form-control" value="{{$brand->brand_name}}" id="exampleInputBrand" aria-describedby="brandHelp" placeholder="" name="brand_name" required>
                                        </div>
                                        @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="exampleInputBrandLogo" class="form-label">Brand Logo</label>
                                            <input type="file" name="brand_logo" class="form-control" id="brandLogoId">
                                            @error('brand_logo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <img src="{{ asset($brand->brand_logo) }}" style="height: 400px; width:600px;">
                                            <input type="hidden" value="{{ $brand->brand_logo}}" name="old_logo">
                                        </div>
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                                    </div>
                                </form>

                            </div>
                        </div><!-- modal-dialog -->
                    </div><!-- modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- table-wrapper -->
    </div>
    <!-- card -->
</div>

<!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add brand</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('add.brand')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pd-20">

                    <div class="mb-3">
                        <label for="exampleInputBrand" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" id="exampleInputBrand" aria-describedby="brandHelp" placeholder="Brand" name="brand_name" required>
                    </div>
                    @error('brand_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="exampleInputBrandLogo" class="form-label">Brand Logo</label>
                        <input type="file" name="brand_logo" class="form-control" id="brandLogoId">
                    </div>
                    @error('brand_logo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Save</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->








@endsection