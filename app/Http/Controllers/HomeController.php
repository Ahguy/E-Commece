<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Models\Provinces; 
use App\Models\Restaurantes;
use App\Models\User;

use App\Models\Products;
use App\Models\orders;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        // 
        $pros =Provinces::all();
        $user = User::all()->count();
        $rest = Restaurantes::all()->count();
        $prod = Products::all();
        $order = orders::all()->count();
        return view('admin.index',compact('pros','user','rest','order','prod'));
    }

    public function login_home(){
        $pros =Provinces::all();
        $user = Auth::user();
        $userid=$user->id;
        $count = Cards::where('user_id',$userid)->count('qty');

        return view('home.Home',compact('pros','count'));
    }

    public function home(){
        $pros =Provinces::all();
        return view('home.index',compact('pros'));
    }

    public function add_restaurant(){
        $pros =Provinces::all();
  
        return view('home.add_restaurante',compact('pros',));
    }



    public function upload_rest(Request $request){
        
        if($request->hasfile('restimage')){
            $newImageName=time() . '-' . $request->file('restimage')->getClientOriginalName();
            $request->restimage->move(public_path('img/restImage/'), $newImageName);
        }
        $rest = new Restaurantes();
        $rest->name  = $request->restname;
        $rest->fistname  = $request->fname;
        $rest->lastname = $request->lname;
        $rest->phone = $request->phone;
        $rest->email = $request->email;
        $rest->province_id  = $request->province;
        if($request->hasfile('restimage')){
            $rest->Image = $newImageName;
        }else{
            $rest->Image ='';
        }
        toastr()->addSuccess('Task completed successfully.');
        $rest->save();
        return redirect()->back();
    //  echo"1";
       
       
    }


    public function Shoprovince($id,Request $rq){

   
        $Provinces = Provinces::where('id',$id)->first();
        $Restaurantes = Restaurantes::where('province_id',operator: $Provinces->id)->get();
        $user = Auth::user();
        $userid=$user->id;
        $count = Cards::where('user_id',$userid)->count();
        return view('home.View_Shop',compact('Restaurantes','Provinces','count'));
        //  echo "1";
    }





}
