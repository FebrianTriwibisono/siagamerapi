<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use Auth;


class RecordController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(Request $request)
    {
        // $records = Record::sw
            $records = Record::where('seismik', 'LIKE', '%'.$request->input('q').'%')
            ->orderBy('created_at', 'asc')
            ->paginate(50);
           

        return view('record.index', compact('records', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('record.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'seismik'               => 'required',
            'deformasi'             => 'required',
            'intensitas_gas'        => 'required',
            'suhu'                  => 'required',
            'tgl'        	        => 'required',
        ]);

        $seismik = $request->seismik;
        $deformasi = $request->deformasi;
        $intensitas_gas = $request->intensitas_gas;
        $suhu = $request->suhu;

        if (($seismik >= 0 && $seismik <=12)) {
            $mbns = 0.9;
            $mdns =0.1;
            $mbws =0.7;
            $mdws =0.1;
            $mbss =0.3;
            $mdss =0.13;
            $mbas = 0.1;
            $mdas =0.01;

        }elseif (($seismik >= 13 && $seismik <=26) ) {
            $mbns = 0.4;
            $mdns =0.3;
            $mbws =0.9;
            $mdws =0.1;
            $mbss =0.45;
            $mdss =0.15;
            $mbas = 0.3;
            $mdas =0.03;
        }elseif (($seismik >= 27 && $seismik <=36) ) {
            $mbns = 0.3;
            $mdns =0.25;
            $mbws =0.6;
            $mdws =0.2; 
            $mbss =0.95;
            $mdss =0.01;
            $mbas = 0.7;
            $mdas =0.19;
        }elseif (($seismik >= 37) ) {
            $mbns = 0.2;
            $mdns =0.175;
            $mbws =0.4;
            $mdws =0.3;
            $mbss =0.73;
            $mdss =0.17;
            $mbas = 0.9;
            $mdas =0.01;


        }

        if (($deformasi >= 0 && $deformasi <=100) ) {
            $mbnd = 0.95;
            $mdnd =0.05;
            $mbwd =0.5;
            $mdwd =0.2;
            $mbsd =0.33;
            $mdsd =0.15;
            $mbad = 0.2;
            $mdad =0.01;
        }elseif (($deformasi >=101 && $deformasi <=200)) {
            $mbnd =0.57;
            $mdnd =0.13;
            $mbwd =0.95;
            $mdwd =0.1;
            $mbsd =0.57;
            $mdsd =0.13;
            $mbad = 0.4;
            $mdad =0.2;
        }elseif (($deformasi >= 201 && $deformasi <=300) ) {
            $mbnd = 0.96;
            $mdnd =0.01;
            $mbwd =0.5;
            $mdwd =0.2;
            $mbsd =0.96;
            $mdsd =0.01;
            $mbad = 0.6;
            $mdad =0.2;
        }elseif ($deformasi >= 301 ) {
            $mbnd = 0.65;
            $mdnd =0.23;
            $mbwd =0.3;
            $mdwd =0.25;
            $mbsd =0.65;
            $mdsd =0.23;
            $mbad = 0.95;
            $mdad =0.02;
        }


        if (($intensitas_gas >= 0 && $intensitas_gas <=1250) ) {
            $mbne =0.96;
            $mdne =0.02;
            $mbwe =0.6;
            $mdwe =0.25;
            $mbse = 0.41;
            $mdse =0.25;
            $mbae = 0.2;
            $mdae =0.05;
        }elseif (($intensitas_gas >=1251 && $intensitas_gas <=2250)) {
            $mbne =0.7;
            $mdne =0.1;
            $mbwe =0.95;
            $mdwe =0.01;
            $mbse = 0.47;
            $mdse =0.20;
            $mbae = 0.43;
            $mdae =0.24;
        }elseif (($intensitas_gas >= 2251 && $intensitas_gas <=3250) ) {
            $mbne =0.3;
            $mdne =0.1;
            $mbwe =0.7;
            $mdwe =0.35;
            $mbse = 0.98;
            $mdse =0.01;
            $mbae = 0.6;
            $mdae =0.05;
        }elseif (($intensitas_gas >= 3251) ) {
            $mbne =0.2;
            $mdne =0.2;
            $mbwe =0.2;
            $mdwe =0.15;
            $mbse = 0.5;
            $mdse =0.15;
            $mbae = 0.99;
            $mdae =0.01;
        }

        if (($suhu >= 0 && $suhu <=75) ) {
            $mbnsu = 0.99;
            $mdnsu =0.01;
            $mbwsu =0.75;
            $mdwsu =0.23;
            $mbssu = 0.45;
            $mdssu =0.27;
            $mbasu = 0.1;
            $mdasu =0.05;
        }elseif (($suhu >=76 && $suhu <=150)) {
            $mbnsu = 0.5;
            $mdnsu =0.1;
            $mbwsu =1;
            $mdwsu =0.01;
            $mbssu = 0.6;
            $mdssu =0.15;
            $mbasu = 0.5;
            $mdasu =0.29;
        }elseif (($suhu >= 151 && $suhu <=250) ) {
            $mbnsu = 0.2;
            $mdnsu =0.1;
            $mbwsu =0.65;
            $mdwsu =0.33;
            $mbssu = 0.99;
            $mdssu =0.01;
            $mbasu = 0.65;
            $mdasu =0.1;
        }elseif (($suhu >= 251) ) {
            $mbnsu = 0.1;
            $mdnsu =0.1;
            $mbwsu =0.1;
            $mdwsu =0.05;
            $mbssu = 0.6;
            $mdssu =0.21;
            $mbasu = 1;
            $mdasu =0.01;
        }

        function hitung($mbs,$mds,$mbd,$mdd,$mbe,$mde,$mbsu,$mdsu){
            $mb1 = $mbs + $mbd *( 1 - $mbs);
            $md1 = $mds + $mdd *(1- $mds);
            $mb2 = $mb1 + $mbe *(1- $mb1);
            $md2 = $md1 + $mde *(1- $md1);
            $mb3 = $mb2 + $mbsu *(1- $mb2);
            $md3 = $md2 + $mdsu *(1- $md2);
            $cf = $mb3 - $md3;
            return $cf; 
        }
        

        $siaga = hitung($mbss,$mdss,$mbsd,$mdsd,$mbse,$mdse,$mbssu,$mdssu);
        $normal = hitung($mbns,$mdns,$mbnd,$mdnd,$mbne,$mdne,$mbnsu,$mdnsu);
        $waspada = hitung($mbws,$mdws,$mbwd,$mdwd,$mbwe,$mdwe,$mbwsu,$mdwsu);
        $awas = hitung($mbas,$mdas,$mbad,$mdad,$mbae,$mdae,$mbasu,$mdasu);

        switch (max($siaga,$normal,$waspada,$awas)) {
            case $normal:
                $status = "Normal";
                $kemungkinan = $normal;
                break;
            case $waspada:
                $status = "Waspada";
                $kemungkinan = $waspada;
                break;
            case $siaga:
                $status = "Siaga";
                $kemungkinan = $siaga;
                break;
            case $awas:
                $status = "Awas";
                $kemungkinan = $awas;
                break;
        }
        $record = new Record();
        $record->seismik    		    = $request->seismik;
        $record->deformasi        		= $request->deformasi;
        $record->intensitas_gas  		= $request->intensitas_gas;
        $record->suhu                   = $request->suhu;
        $record->status                 = $status;
        $record->kemungkinan            = $kemungkinan;
        $record->tgl        			= $request->tgl;
        $record->pid     				= Auth::user()->id;
        $record->save();

        $request->session()->flash('success_message', 'Berhasil menambah data!');

        return redirect()->route('record.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Record  $Record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $Record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $Record
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::findOrFail($id);
        return view('record.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $Record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'seismik'               => 'required',
            'deformasi'             => 'required',
            'intensitas_gas'        => 'required',
            'suhu'                  => 'required',
            'tgl'                   => 'required',

        ]);

        $record = Record::findOrFail($id);
        $record->seismik                = $request->seismik;
        $record->deformasi              = $request->deformasi;
        $record->intensitas_gas         = $request->intensitas_gas;
        $record->suhu                   = $request->suhu;
        $record->tgl                    = $request->tgl;
        $record->pid     			    = Auth::user()->id;
        $record->save();
        $request->session()->flash('success_message', 'Berhasil merubah data!');

        return redirect()->route('record.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Record  $Record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Record::destroy($id);

        $request->session()->flash('success_message', 'Berhasil merubah data!');

        return redirect()->route('record.index');
    }
}
