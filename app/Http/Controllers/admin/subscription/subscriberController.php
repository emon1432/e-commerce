<?php

namespace App\Http\Controllers\admin\subscription;

use App\Http\Controllers\Controller;
use App\Models\admin\subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class subscriberController extends Controller
{
   

    //All Subscriber
    public function allSubscriber()
    {
        $subscribers = subscriber::all();
        return view('admin.subscriber.subscriberList', compact('subscribers'));
    }

    //Add Subscriber
    public function addSubscriber(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|unique:subscribers|max:50',
            ]
            
        );

        subscriber::insert([
            'email' => $request->email,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Thanks For Subscribing',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function deleteSubscriber($id){
        subscriber::find($id)->delete();
        $notification = array(
            'message' => 'Subscriber Deleted Successfully!',
            'alert-type' =>'warning'
        );
        return Redirect()->back()-with($notification);
    }
}
