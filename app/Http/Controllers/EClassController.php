<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EClassController extends Controller
{
   public function show($id){
       return view('class.show',['id'=>$id]);
   }
    public function edit($id){
        return view('class.edit',['id'=>$id]);
    }
}
