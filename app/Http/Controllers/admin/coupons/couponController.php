<?php

namespace App\Http\Controllers\admin\coupons;

use App\Http\Controllers\Controller;
use App\Models\admin\coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class couponController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //All Coupon
    public function allCoupon(){
        $coupons = coupon::all();
        return view('admin.coupon.couponsList',compact('coupons'));
    }

    //Add Coupon
    public function addCoupon(Request $request){
        $validated = $request->validate(
            [
                'coupon' => 'required|unique:coupons|max:50',
                'discount' => 'required',
            ]
        );

        coupon::insert([
            'coupon' => $request->coupon,
            'discount' => $request->discount,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Update coupon
    public function updateCoupon(Request $request, $id){
        $validated = $request->validate(
            [
                'coupon' => 'required|max:50',
                'discount' => 'required',
            ]            
        );

        $update = coupon::find($id)->update([
            'coupon' => $request->coupon,
            'discount' => $request->discount
        ]);
        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }

    //delete coupon
    public function deleteCoupon($id)
    {

        coupon::find($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }


}
