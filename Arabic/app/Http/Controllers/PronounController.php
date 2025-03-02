<?php

namespace App\Http\Controllers;

use App\Models\Pronoun;
use Illuminate\Http\Request;

class PronounController extends Controller
{
    
   public function show(Request $request)
   {

   //  dd($request->all());
       $pronouns = Pronoun::all();
       return view('pronouns.index',compact('pronouns')); // You will create this view
   }

   
}
