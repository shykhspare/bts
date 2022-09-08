<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderItemsController extends Controller
{



    public function removefrombasket($id)
    {
        $itemRemove = OrderItem::find($id)->delete();
        if ($itemRemove) {
            Alert::toast('Item Remove from cart', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Fail to remove item from cart', 'fail');
            return redirect()->back();
        }
    }

    public function quantityUpdate(Request $request)
    {
        $orderitem = OrderItem::where('id', $request->id)->first();
        $orderitem->quantity = $request->quantity;
        $orderitem->total = $orderitem->amount * $request->quantity;
        $orderitem->shipment =  $orderitem->shipment * $request->quantity;
        $orderitem->save();
        $response = array("response" => 'success');
        return Response()->json($response);
    }

    public function addtobasket(Request $request)
    {

        $book = Book::where('slug', $request->slug)->firstOrFail();
        $quantity = 1;
        if ($request->has('quantity')) {
            $quantity = $request->quantity;
        }

        if ($book) {
            if (Auth::check()) {
                $user_id = Auth::User()->id;
                $where = ['user_id' => Auth::User()->id];
            } else {
                $user_id = 0;
                $where = ['session_id' => session()->getId()];
            }
            $orderitem = OrderItem::where('status', '0')->where($where)->delete();

            $orderitem = OrderItem::where('model_id', $book->id)->where('status', '0')->where('type', $request->type)->where($where)->first();
            if ($orderitem) {

                if ($request->type == 'read') {
                    Alert::toast('Book already in cart', 'success');
                    return redirect('cart');
                }
                $orderitem->quantity =  $orderitem->quantity + $quantity;
                $orderitem->total = $orderitem->amount * $orderitem->quantity;
                $orderitem->save();
            } else {


                if ($request->type == "read") {
                    $amount = $book->online_amount;
                    $shipment = 0;
                } else {


                    $amount = $book->price;
                    $shipment = $book->ship_amount;
                }


                $orderitemarr = array('quantity' => $quantity, 'shipment' => $shipment, 'type' => $request->type, 'model_type' => 'App\Models\Book', 'collection_name' => 'books', 'model_id' => $book->id, 'session_id' => session()->getId(), 'user_id' => $user_id,  'amount' => $amount, 'total' => $amount);
                $item = OrderItem::Create($orderitemarr);
            }
            Alert::toast('Book added to cart', 'success');
            // return redirect()->back();
            return redirect('cart');
        } else {
            Alert::toast('Book not found!', 'fail');
            return redirect()->back();
        }
    }


    public function updatetobasket(Request $request)
    {




        $orderitem = OrderItem::where('id', $request->id)->first();

        if (Auth::check()) {
            $user_id = Auth::User()->id;
            $where = ['user_id' => Auth::User()->id];
        } else {
            $user_id = 0;
            $where = ['session_id' => session()->getId()];
        }





        $orderitemarr = array('quantity' => $request->quantity, 'Booktype_id' => $Booktype, 'attachement' => $attachement, 'Book_id' => $orderitem->Book->id,  'color' => $request->color, 'session_id' => session()->getId(), 'user_id' => $user_id, 'option' => $request->option);
        $orderitem->update($orderitemarr);


        Alert::toast('Book successfully updated!', 'success');
        return redirect('cart');
    }




    public function ClearShoppingCart()
    {

        if (Auth::check()) {
            $where = ['user_id' => Auth::User()->id];
        } else {

            $where = ['session_id' => session()->getId()];
        }

        $itemRemove = OrderItem::where($where)->delete();
        if ($itemRemove) {
            Alert::toast('Cart Successfully Clear', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Fail to Cart Successfully Clear', 'fail');
            return redirect()->back();
        }
    }


    //edit order item front 

    public function editorderitem($id)
    {

        if (Auth::check()) {
            $where = ['user_id' => Auth::User()->id];
        } else {
            $user_id = 0;
            $where = ['session_id' => session()->getId()];
        }
        // $Book = Book::where('slug', $slug)->firstOrFail();
        $orderitem = OrderItem::where('id', $id)->where('status', 0)->where($where)->firstOrFail();
        $itemfields = Itemfield::where('Book_id', $orderitem->Book->id);


        $itemfieldID = $itemfields->distinct('Booktype_id')->get();
        $Book = $orderitem->Book;

        $typeID = [];
        foreach ($itemfieldID as $itemfield) {
            array_push($typeID, $itemfield->Booktype_id);
        }
        $Booktypes = BookType::whereIn('id', $typeID)->get();
        $options = Option::get();
        $itemfields = $itemfields->get();
        return view('front.items.edit', compact('orderitem', 'Book', 'options', 'Booktypes', 'itemfields'));
    }

    public function removeItemfrombasket($id)
    {
        $itemRemove = OrderItem::find($id)->delete();
        if ($itemRemove) {
            $response = array("response" => 'success');
        } else {
            $response = array("response" => 'fail');
        }

        return Response()->json($response);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
