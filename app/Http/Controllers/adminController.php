<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class adminController extends Controller
{
    //
    function index(){

        if (auth('admin')->check()) {
            # code...
            $data =  Admin::get();  // select * from users

            return view('admin.index', ['data' => $data]);
        }else{
            return redirect(url('login'));
        }



    }

    function create(){
        return view('Admin.create');
    }

    function store(Request $request){

        $data = $this->validate($request,[
            'name'=>'required|string',
            'email' => 'required|email',
            'password'=>'required|min:6|max:10'
        ]);
        $data['password']=bcrypt($data['password']);
        // echo strlen($data['password']);
        // exit;


        $op_create = Admin::create($data);
        if($op_create){
            $message = "Row Inserted";
        }else{
            $message = "Error Try Again";
        }

        session()->flash('Message',$message);

        return redirect(url('/admin'));

    }

    function login(){
        return view('login');
    }


    function dologin(Request $request){

        $data = $this->validate($request,[
            'email' => 'required|email',
            'password'=>'required|min:6|max:10'
        ]);

        //$data['password']=bcrypt($data['password']);
        //echo strlen($data['password']);


        if(auth('admin')->attempt($data)){

            return redirect(url('/admin/'));

         }else{

          session()->flash('Message',"Error In Your Data Try Again");

          return back();

         }

    }

    function destroy($id){
        $op_del=Admin::where('id',$id)->delete();

        if($op_del){
            $message = "Raw Deleted";
        }else{
            $message = "Error in Delete";
        }

        session()->flash('Message',$message);

        return redirect(url('/admin'));
    }

    function edit($id){

        $data = Admin::find($id);
        return view('Admin.edit',['data'=>$data]);
    }

    function update(Request $request,$id){
        $data = $this->validate($request,[
            'name'=>'required|string',
            'email' => 'required|email',
        ]);
        $op_update= Admin::where('id',$id)->update($data);
        if($op_update){
            $message = "Raw Update";
        }else{
            $message = "Error in Update";
        }

        session()->flash('Message',$message);

        return redirect(url('/admin'));
    }

    function logout(){
        auth('admin')->logout();
        return redirect(url('/login'));
    }



}
