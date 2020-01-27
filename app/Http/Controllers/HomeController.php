<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Record;

class HomeController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
    	$label=[];
    	$data =[];
    	$title = "Grafik Aktivitas Merapi";
    	$option =["suhu","seismik","intensitas_gas","deformasi"];
    	$data2 = Record::all();

foreach ($data2 as $data1) {
     $suhu[] =$data1->suhu;
     $data[] =$data1->seismik;
     $seismik[] =$data1->seismik;
     $intensitas_gas[] =$data1->intensitas_gas;
     $deformasi[] =$data1->deformasi;
     $label []= $data1->created_at->format('d/m/y');
}
    	
    
    	 return view('home',['label'=>json_encode($label),
    	 	'data'=>json_encode($data),
    	 	'opsi'=>[
    	 		'suhu'=>$suhu,
    	 		'seismik'=>$seismik,
    	 		'intensitas_gas'=>$intensitas_gas,
    	 		'deformasi'=>$deformasi
    	 	],
    	 	'title'=>$title,
    	 	'option'=>$option


    	 	]);
    }
}
