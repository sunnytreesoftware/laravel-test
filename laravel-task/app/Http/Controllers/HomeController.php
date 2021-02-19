<?php

namespace App\Http\Controllers;

use App\SalesHistory;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $period = CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
        $days=[];
        foreach ($period as $key => $date) {

            $days[$key] = $date->format('M-d');
        }

        $paid_sales = SalesHistory::where('order_status', SalesHistory::PAID)
                ->select(DB::raw('Day(created_at) as day'),DB::raw('count(*) as paid_count'))
                ->groupBy('day')
                ->whereMonth('created_at',Carbon::now()->month)
                ->get();


        $days_paid = [];
        foreach ($period as $key1 => $date) {
            $value1=0;
            foreach ($paid_sales as $key => $value) {
                if($date->format('d') == $value->day){
                    $value1 = $value->paid_count;
                }
            }
            $days_paid[$key1] = $value1;
        }

        $unpaid_sales = SalesHistory::where('order_status', SalesHistory::UNPAID)
                ->select(DB::raw('Day(created_at) as day'),DB::raw('count(*) as unpaid_count'))
                ->groupBy('day')
                ->whereMonth('created_at',Carbon::now()->month)
                ->get();
        $days_unpaid = [];
        foreach ($period as $key1 => $date) {
            $value1=0;
            foreach ($unpaid_sales as $key => $value) {
                if($date->format('d') == $value->day){
                    $value1 = $value->unpaid_count;
                }
            }
            $days_unpaid[$key1] = $value1;
        }
        
        return view('home', ['days_paid' => $days_paid, 'days_unpaid' => $days_unpaid, 'days' => $days]);
    }
}
