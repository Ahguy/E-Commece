<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\Restaurantes;
use App\Models\Products;
use App\Models\User;
use App\Models\Cards;
use App\Models\orders;
use App\Models\orders_item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver;

class OrderController extends Controller
{
    //
    public function Order_prod($id,Request $request) {
        $Restaurantes = Restaurantes::where('id',$id)->first();
        $Products = Products::where('rest_id',$Restaurantes->id)->get();
        $user = Auth::user();
        $userid=$user->id;
        $count = Cards::where('user_id',$userid)->count();
        $card = Cards::where('user_id',$userid)->get();
        return view('home.order_prod',compact('Restaurantes','Products','count','card'));
     }

     public function  add_card($id=null)  {
        if($id!=null){
            $d=DB::select("SELECT * FROM `cards` WHERE product_id=$id and user_id=".Auth::user()->id);
           if($d){
            $data['qty'] = ( $d[0]->qty)+1;
            DB::table("cards")->where('id',$d[0]->id)->update($data);
           }else{
            $data['user_id']=Auth::user()->id;
            $data['product_id']=$id;
            $data['qty']=1;
            DB::table("cards")->insert($data);
           }

           
           toastr()->addSuccess('Task completed successfully.');
           return redirect()->back();
        }
     }

     public function Mini_card(){
        $user = Auth::user();
        $userid=$user->id;
        $count = Cards::where('user_id',$userid)->count();
        $card = Cards::where('user_id',$userid)->get();
        return view('home.mini_card',compact('count','card'));

     }

     public function  sum_prod($id=null)  {
        if($id!=null){
            $d=DB::select("SELECT * FROM `cards` WHERE product_id=$id and user_id=".Auth::user()->id);
           if($d){
            $data['qty'] = ( $d[0]->qty)+1;
            DB::table("cards")->where('id',$d[0]->id)->update($data);
           }else{
            $data['user_id']=Auth::user()->id;
            $data['product_id']=$id;
            $data['qty']=1;
            DB::table("cards")->insert($data);
           }

           
           toastr()->addSuccess('Task completed successfully.');
           return redirect()->back();
        }

      //   echo 1;
     }

     public function Sub_prod($id=null){
      if($id!=null){
         $d=DB::select("SELECT * FROM `cards` WHERE product_id=$id and user_id=".Auth::user()->id);
        if($d){
         $data['qty'] = ( $d[0]->qty)-1;
         DB::table("cards")->where('id',$d[0]->id)->update($data);
         if($data['qty'] = ( $d[0]->qty)<2){
          $cart = Cards::where('product_id',$id)->first();
          $cart->delete();
         }
        }
       
        toastr()->addSuccess('Task completed successfully.');
        return redirect()->back();
     }
     }     

  
     public function Check_out(Request $request)  {
   if($request->pay){
           
      $total = $request->total;
if($total!=0){
   $order = new orders();
   $order -> user_id = Auth::user()->id;
   $order -> status = "Pending";
   $order -> name = $request->Rname;
   $order -> address = $request->Raddress;
   $order -> phone =  $request->Rphone;
   $order -> total = $request->total;

   if($order->save())
   {
      $cart = Cards::where('user_id',$order->user_id)->get();
      foreach($cart as $carts )
      {
         $product =  Products::find($carts->product_id);
         $orderitem=new orders_item();
               $orderitem->productId=$carts->product_id;
               $orderitem->quantity=$carts->qty;
               $orderitem->price=$product->price;
               $orderitem->orderId=$order->id;
               $orderitem->save();
               $carts->delete();

           }
           $orders = orders::where('id',$order->id)->get();
           $items = DB::table('products')
           ->join('order_item','order_item.productId','products.id')
           ->select('products.Image','products.name','order_item.*')->get();
           toastr()->addSuccess('Order completed successfully.');
           return view('home.invoid',compact('orders','items'));
}
}else{
   
   toastr()->error('Please Order Product');
   return redirect()->back();
}
   }else{

      $total = $request->total;
      if($total!=0){
         $order = new orders();
         $order -> user_id = Auth::user()->id;
         $order -> status = "Pending";
         $order -> name = $request->Rname;
         $order -> address = $request->Raddress;
         $order -> phone =  $request->Rphone;
         $order -> total = $request->total;
      
         if($order->save())
         {
            $cart = Cards::where('user_id',$order->user_id)->get();
            foreach($cart as $carts )
            {
               $product =  Products::find($carts->product_id);
               $orderitem=new orders_item();
                     $orderitem->productId=$carts->product_id;
                     $orderitem->quantity=$carts->qty;
                     $orderitem->price=$product->price;
                     $orderitem->orderId=$order->id;
                     $orderitem->save();
                     $carts->delete();
      
                 }
               }
            }
      toastr()->addSuccess('Order completed successfully.');
      return redirect()->back();
   }
}



public function remove_order($id)  {
   $order = orders::find($id);
  if( $order->delete()){
   $orderitem=orders_item::where('orderid',$order->id)->get();
   foreach($orderitem as $item){
      $item->delete();
   }
   return redirect()->back();
  }
  
}

public function qty_input($id , Request $request) {
   $d=DB::select("SELECT * FROM `cards` WHERE product_id=$id and user_id=".Auth::user()->id);
           if($d){
            $data['qty'] = ($request->qty_input);
            DB::table("cards")->where('id',$d[0]->id)->update($data);
           }
   return redirect()->back();
}

         //    $cart = Cards::where('user_id',$order->user_id)->get();
         //    foreach($cart as $item )
         //    {
         //             $product =  Products::find($item->product_id);
         //             $orderitem=new orders_item();
         //             $orderitem->productId=$item->product_id;
         //             $orderitem->quantity=$item->qty;
         //             $orderitem->price=$product->price;
         //             $orderitem->orderId =$order->id;
         //             $orderitem->save();
         //             $item->delete();
         //         }
                 
         //         toastr()->addSuccess('Order completed successfully.');
         //         return redirect()->back();
         // }


   //    $name = $request->Rname;
   //    $address = $request->Raddress;
   //    $phone = $request->Rphone;
   //    $status = "Pending";
      
   //    $user_id = Auth::user()->id;
   //    $cart = Cards::where('user_id',$user_id)->get();

   //    foreach($cart as $carts ){VariadicValueResolver
   //       $order=new orders();
   //       $order->name=$name;
   //       $order->address=$address;
   //       $order->phone=$phone;
   //       $order->user_id=$user_id;
   //       $order->total=$carts->total;
   //       $order->save();
   //   }
   // $cart_remove = Cards::where('user_id',$user_id)->get();
   //   foreach($cart_remove as $remove ){
   //    $data = Cards::find($remove->id);
   //    $data->delete();
   //   }
    



     public function History_order(){
      $user = Auth::user();
        $userid=$user->id;
        $count = Cards::where('user_id',$userid)->count();
        $orders = orders::where('user_id',$userid)->get();
        $items = DB::table('products')
        ->join('order_item','order_item.productId','products.id')
        ->select('products.Image','products.name','order_item.*')->get();
      return view('home.History_order',compact('count','orders','items'));
     }

   //   $user = Auth::user();
   //   $userid=$user->id;
   //   $count = Cards::where('user_id',$userid)->count();
   //   $orders = orders::where('user_id',$userid)->get();
   //   $items = DB::table('products')
   //   ->where('created_at')
   //   ->join('order_item','order_item.productId','products.id')
   //   ->select('products.Image','products.name','order_item.*')->get();
   // return view('home.History_order',compact('count','orders','items'));
     
   //   public function checkout(Request $request){
   //    $name = $request->Receivername;
   //    $address = $request->Receiveraddress;
   //    $phone = $request->Receiverphone;
   //    $user_id = Auth::user()->id;
   //    $cart = Cards::where('user_id',$user_id)->get();

   //    foreach($cart as $carts ){
   //       $order = new orders;
   //       $order->name=$name;
   //       $order->address=$address;
   //       $order->phone=$phone;
   //       $order->user_id=$user_id;
   //       $order->product_id=$carts->product_id;
   //       $order->save();
   //       toastr()->addSuccess('Task completed successfully.');
   //      return redirect()->back();
         
   //    }
   // }



     
}
