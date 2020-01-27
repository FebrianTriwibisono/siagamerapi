<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use Charts;
use DB;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
//use Charts;


class chartController extends Controller
{
    public function index()
    {

        $records = Record::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart = Charts::database($records, 'bar', 'highcharts')
                    ->title("Monthly new Register Users")
                    ->elementLabel("Total Users")
                    ->dimensions(1000, 500)
                    ->responsive(false)
                    ->groupByMonth(date('Y'), true);
        return view('charts',compact('chart'));

       /* $records = Record::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart = Charts::database($records, 'bar','highcharts')
                    ->title("Grafik Suhu")
                    ->elementLabel("Jajal")
                    ->dimensions(1000,500)
                    ->responsive(false)
                    ->groupByMonth(date('Y'),true);
        return view('charts', ['chart' => $chart]); */
    }
}
