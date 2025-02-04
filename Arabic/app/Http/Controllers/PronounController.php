<?php

namespace App\Http\Controllers;

use App\Models\Pronoun;



class PronounController extends Controller
{
    
   public function show()
   {

       $pronouns = Pronoun::all();
       return view('pronouns.index',compact('pronouns')); // You will create this view
   }

   
}
