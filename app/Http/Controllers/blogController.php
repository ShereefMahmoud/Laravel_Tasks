<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class blogController extends Controller
{
    //
    function create(){
        return view('create');
    }

    function store(Request $request){

        $title   = $request->title;
        $content = $request->content;
        $image   = $request->image;

        $this->validate($request,[
            'title'   =>"required|string|regex:/^[A-Za-z]*$/i",
            'content' =>"required|min:50",
            'image'   =>"required|file|image"
        ]);

        $extenion = $image->getClientOriginalExtension();
        $fileName = uniqid().".".$extenion;

        $destinationPath = public_path('/images');
        $image->move($destinationPath,$fileName) ;

        setcookie('title',$title,time()+7*27*60*60,"/");
        setcookie('content',$content,time()+7*27*60*60,"/");
        setcookie('image',$fileName,time()+7*27*60*60,"/");

        echo "Done Save Data <br>";
        echo"Title is". $_COOKIE['title']."<br>";
        echo"Content is". $_COOKIE['content']."<br>";
        echo"image is <br>";
        echo " <img src=".url('images/'.$_COOKIE['image']) ." width='150px' height='150px'>";
    }
}
