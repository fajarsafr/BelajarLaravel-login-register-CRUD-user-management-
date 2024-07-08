<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;
use resources\views\auth\create;

class HomeController extends Controller
{
    
    public function dashboard(){

            return view('dashboard');

    }
    public function index(){
        $data = User::get();
        return view('index',compact('data'));

    }

    public function create(){
        return view('create');
    }
    
    public function store(Request $request){
       
        $data['name'] = $request->name;
        $data['email']= $request->email;
        $data['password']= Hash::make($request->password);

        User::create($data);

        return redirect()->route('admin.index');
        //  $data= new User();

        //$data->name = $request->name;
        //$data->email = $request->email;
        //$data->password = $request->password;

        //$data->save();

       // return redirect()->back();

    }

    public function edit(Request $request,$id){
        $data = User::find($id);
        return view('edit',compact('data'));
    }
    public function update(Request $request,$id){
        $data['name'] = $request->name;
        $data['email']= $request->email;
        $data['password']= Hash::make($request->password);

        User::whereId($id)->update($data);

        return redirect()->route('admin.index');
    }

    public function delete(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }
        return redirect()->route('admin.index');
    }
}
