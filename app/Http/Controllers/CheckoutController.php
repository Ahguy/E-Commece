<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\Restaurantes;
use App\Models\User;
use App\Models\orders;
use App\Models\orders_item;
use App\Models\Products;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function Confirm_order(){
        echo 1;
    }
    //
    // public function Checkout(Request $request){
    //     if(session()->has('id')){
    //      $order = new orders();
    //      $order->status="Pending";
    //      $order->user_id=session()->get('id');
    //      $order->bill=$request->bill;
    //      $order->fullname=$request->fullname;
    //      $order->phone=$request->phone;
    //      if($order->save()){
    //         $cart = Cards::where('user_id',session()->get('id'))->get();
    //         foreach($cart as $item){
    //             $product= Products::find($item->productId);
    //             $orderitem = new orders_item();
    //             $orderitem->productId=$item->productId;
    //             $orderitem->quntity=$item->quntity;
    //             $orderitem->price=$item->price;
    //             $orderitem->orderId=$item->id;
    //             $orderitem->save();
    //             $item->delete();
    //         }
    //      }
    //      toastr()->addSuccess('Task completed successfully.');
    //      return redirect()->back();
    //     }
    //     toastr()->addSuccess('Task completed successfully.');
    //     echo 1;
   
    //    }

}
