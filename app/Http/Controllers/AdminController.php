<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\Restaurantes;
use App\Models\Products;
use App\Models\orders;
use App\Models\User;

use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function view_Province(){
        $pros =Provinces::all();
        return view('admin.province',compact('pros'));
    }
    public function frm_province(){
        return view('admin.addprovince');
    }

    public function add_Province(request $request){

        if($request->hasfile('prodimage')){
            $newImageName=time() . '-' . $request->file('prodimage')->getClientOriginalName();
            $request->prodimage->move(public_path('img/prodimage/'), $newImageName);
        }
        $pro = new Provinces;
        $pro->proname = $request->englishpro;
        $pro->khmer = $request->khmerpro;
        if($request->hasfile('prodimage')){
            $pro->Image = $newImageName;
        }else{
            $pro->Image ='';
        }
       
        $pro->save();
        toastr()->addSuccess('Task completed successfully.');
        return redirect('/view_province');

    }

    public function delete_province($id){
       $pros = Provinces::find($id);
       $pros->delete();
       return redirect()->back();
    }

    public function edite_province($id){
    
        $pros = Provinces::find($id);

        
        return view('admin.edite_province',compact('pros'));
    }

    public function update_provinc(request $request ,$id){
        $Pro = Provinces::find($id);
        if($request->hasfile('fileprodimage')){
            $newImageName=time() . '-' . $request->file('fileprodimage')->getClientOriginalName();
            $request->fileprodimage->move(public_path('img/prodimage/'), $newImageName);
            $request->prodimage=$newImageName;
        }
       
        $Pro->proname = $request->englishpro;
        $Pro->khmer = $request->khmerpro;
        
        if($request->hasfile('fileprodimage')){
            $Pro->Image = $request->prodimage;
        }        
        $Pro->save();
        return redirect('/view_province');
    }







    public function view_rest_province(){
        $pros =Provinces::all();
        return view('admin.rest_pro',compact('pros'));
    }

    public function view_shop($id){
        $Provinces = Provinces::where('id',$id)->first();
        $Restaurantes = Restaurantes::where('province_id',$Provinces->id)->get();
        return view('admin.view_shop',compact('Restaurantes','Provinces'));
    }

    public function edite_shop($id){
        $Restaurantes = Restaurantes::find($id);
      
         return view('admin.edite_shop',compact('Restaurantes'));
    }


    public function update_shop(request $request ,$id){
       
        $Restaurantes = Restaurantes::find($id);

        if($request->hasfile('fileshopImage')){
            $newImageName=time() . '-' . $request->file('fileshopImage')->getClientOriginalName();
            $request->fileshopImage->move(public_path('img/restImage/'), $newImageName);
            $request->restimage=$newImageName;
        }
       
        $Restaurantes->name = $request->shopname;
        $Restaurantes->fistname = $request->fname;
        $Restaurantes->lastname = $request->lname;
        $Restaurantes->phone = $request->phone;
        $Restaurantes->email = $request->email;
        
        if($request->hasfile('fileshopImage')){
            $Restaurantes->Image = $newImageName;
        }  
        $Restaurantes->save();
        toastr()->addSuccess('Update completed successfully.');
        return redirect()->back();
    }
    public function delete_shop($id){
        $Restaurantes = Restaurantes::find($id);
        $Restaurantes->delete();
        toastr()->addSuccess('Delete completed successfully.');
        return redirect()->back();
     }

     public function view_product($id){
        $Restaurantes = Restaurantes::where('id',$id)->first();
        $Products = Products::where('rest_id',$Restaurantes->id)->get();
        return view('admin.view_products',compact('Restaurantes','Products'));
     }

     public function addpro_shop($id){
        $Restaurntes = Restaurantes::find($id);
        return view('admin.addpro_shop',compact('Restaurntes'));
     }

     public function add_product(Request $request){
        if($request->hasfile('prodimage')){
            $newImageName=time() . '-' . $request->file('prodimage')->getClientOriginalName();
            $request->prodimage->move(public_path('img/prodimages/'), $newImageName);
        }
        $products = new Products();
        $products -> rest_id=$request->Restid;
        $products->name = $request->prodname;
        $products->price = $request->prodprice;
        if($request->hasfile('prodimage')){
            $products->Image = $newImageName;
        }else{
            $products->Image ='';
        }
       
        $products->save();
        toastr()->addSuccess('Task completed successfully.');
        return redirect()->back();
     }

     public function edite_prod($id,Request $request){
        // $Restaurntes= Restaurantes
          $Products = Products::find($id);
      
         return view('admin.edite_pro',compact('Products'));
     }

     public function update_product($id,Request $request){
        $Products = Products::find($id);
        if($request->hasfile('fileprodimage')){
            $newImageName=time() . '-' . $request->file('fileprodimage')->getClientOriginalName();
            $request->fileprodimage->move(public_path('img/prodimages/'), $newImageName);
            $request->prodimage=$newImageName;
        }
       
        $Products->name = $request->prodname;
        $Products->price = $request->prodprice;
        
        if($request->hasfile('fileprodimage')){
            $Products->Image = $request->prodimage;
        }        
        $Products->save();
        toastr()->addSuccess('Update completed successfully.');
        return redirect()->back();
     }

     public function delete_prod($id) {
        $Products = Products::find($id);
        $Products->delete();
        toastr()->addSuccess('Delete completed successfully.');
        return redirect()->back();
     }


     //Order 


     public function view_order() {
        $orders = orders::all();
        $items = DB::table('products')
        ->join('order_item','order_item.productId','products.id')
        ->select('products.Image','products.name','order_item.*')->get();
      return view('admin.view_order',compact('orders','items'));
     }

     public function view_order_product($id,Request $request) {
      
        
     }
  




 
}
