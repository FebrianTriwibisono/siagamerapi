<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use DB;
use App\Record;

class WelcomeController extends Controller
{
    //
      public function __construct()
    {
        // $this->middleware('auth');
    }

     public function index()
    {
 
        $data = Record::orderBy('tgl', 'desc')
                ->first();
    	
    
    	 return view('welcome',compact('data'));
    }
}
