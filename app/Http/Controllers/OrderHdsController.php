<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\OrderHd;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderHdsController extends Controller
{

    public function checkout()
    {
        if (Auth::check()) {
            $where = ['user_id' => Auth::User()->id];
        } else {
            $where = ['session_id' => session()->getId()];
        }

        $items = OrderItem::where($where)->where('status', 0)->with('book')->get();
        return view('front.orderhds.checkout', compact('items'));
    }


    public function processOrder(Request $request)
    {


        if (Auth::check()) {
            $user_id = Auth::User()->id;
            $where = ['user_id' => Auth::User()->id];
        } else {
            $user_id = 0;
            $where = ['session_id' => session()->getId()];
        }

        $controller = new functionalController();
        $orderNo = $controller->generateRandomNo(5, 'order_hds', 'orderNo');

        $street_address = '';
        $city = '';
        $state = '';
        $address = explode(',', $request->address);
        if (count($address) > 0) {
            $street_address = $address[0];
            if (count($address) > 1) {
                $city = $address[1];
            }
            if (count($address) > 2) {
                $state = $address[2];
            }
        }


        $orderitem = OrderItem::where('user_id', Auth::User()->id)->where('status', 0)->first();
        // $country = $address[3];

        if ($orderitem->type == 'order') {
            $orderHdarr = array('orderNo' => $orderNo, 'user_id' => $user_id, 'session_id' => session()->getId(), 'name' => $request->name,  'status' => 1, 'email' => $request->billing_email, 'phoneno' => $request->billing_phone, 'address' => $street_address, 'company' => $request->company, 'zip' => $request->zip, 'city' => $city, 'state' => $state, 'note' => $request->order_comments, 'amount' => $request->total, 'payment_method' => $request->payment_method, 'type' => $orderitem->type, 'quantity' => $orderitem->quantity, 'model_id', $orderitem->model_id);
        } else {
            $orderHdarr = array('orderNo' => $orderNo, 'user_id' => $user_id, 'session_id' => session()->getId(), 'name' => Auth::User()->name,  'status' => 1, 'email' => Auth::User()->email, 'phoneno' => Auth::User()->phone, 'address' => '', 'company' => '', 'zip' => '', 'city' => '', 'state' => '', 'note' => $request->order_comments, 'amount' => $request->total, 'payment_method' => $request->payment_method, 'type' => $orderitem->type, 'quantity' => $orderitem->quantity, 'model_id', $orderitem->model_id);
        }

        if ($request->payment_method == 'bacs') {
            $image = $controller->uploadImage($request->transaction_attachment, "transactions");
            $orderHdarr['transaction_no'] = $request->transaction_no;
            $orderHdarr['transaction_attachment'] = $image;
        }

        $orderHD = Orderhd::Create($orderHdarr);
        if ($orderHD) {
            OrderItem::where($where)->where('status', 0)->update(['status' => 1, 'orderhd_id' => $orderHD->id]);
            Alert::toast('Your order has been successfully submitted. The order will be verify  within 24 hours.', 'success')->position('center');
            return redirect('/');
        } else {
            Alert::toast('Cannot proccess Your Quote request Please try Again', 'fail')->position('center');;
            return redirect()->back();
        }
    }
}
