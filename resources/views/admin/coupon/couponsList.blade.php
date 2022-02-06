@extends('admin.dashboardPart.mainBody')
@section('mainBody')


<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Coupon</h5>
        <!-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> -->
    </div>
    <!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Coupon List</h6>
        <!-- <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p> -->

        <div class="table-wrapper">
            <a href="" class="btn btn-sm btn-warning" style="float: right; margin:10px;" data-toggle="modal" data-target="#modaldemo3">Add new</a>
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p" style="text-align: center;">ID</th>
                        <th class="wd-15p" style="text-align: center;">Coupon Code</th>
                        <th class="wd-15p" style="text-align: center;">Discount Percentage</th>
                        <th class="wd-20p" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach($coupons as $key => $coupon)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$coupon->coupon}}</td>
                        <td>{{$coupon->discount}}%</td>
                        <td>
                            <a href="{{url('/coupon/edit/'.$coupon->id)}}" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modaldemo4{{$coupon->id}}"> Edit </a>
                            <a href="{{url('/coupon/delete/'.$coupon->id)}}" class="btn btn-sm btn-danger" id="delete"> Delete </a>
                        </td>
                    </tr>
                    <!-- LARGE MODAL -->
                    <div id="modaldemo4{{$coupon->id}}" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-header pd-x-20">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Coupon</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{url('/coupon/update/'.$coupon->id)}}">
                                    @csrf
                                    <div class="modal-body pd-20">

                                        <div class="mb-3">
                                            <label for="exampleInputCoupon" class="form-label">Coupon Code</label>
                                            <input type="text" class="form-control" value="{{$coupon->coupon}}" id="exampleInputCoupon" aria-describedby="couponHelp" placeholder="" name="coupon" required>
                                        </div>
                                        @error('coupon')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="exampleInputCoupon" class="form-label"> Discount Percentage</label>
                                            <input type="text" class="form-control" value="{{$coupon->discount}}" id="exampleInputCoupon" aria-describedby="couponHelp" placeholder="" name="discount" required>                                            
                                        </div>
                                        @error('discount')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Coupon</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('add.coupon')}}">
                @csrf
                <div class="modal-body pd-20">

                    <div class="mb-3">
                        <label for="exampleInputCoupon" class="form-label">Coupon</label>
                        <input type="text" class="form-control" id="exampleInputCoupon" aria-describedby="couponHelp" placeholder="Coupon Code" name="coupon" required>
                    </div>
                    @error('coupon')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="exampleInputCoupon" class="form-label"> Discount Percentage</label>
                        <input type="text" class="form-control" id="exampleInputCoupon" aria-describedby="couponHelp" placeholder="Discount Percentage" name="discount" required>
                    </div>
                    @error('discount')
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