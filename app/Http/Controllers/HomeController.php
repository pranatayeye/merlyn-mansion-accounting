<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReportService;
use App\Models\User;
use App\Models\Transaction;

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
        $data = ReportService::data();
        // dd($data == null);
        
        if ($data != null) {
            // total revenue & expense
            $totalRevenue = 0;
            $totalExpense = 0;
            foreach ($data as $year) {
                foreach ($year['months'] as $month) {
                    $totalExpense += $month['expense'];
                    $totalRevenue += $month['total_quantity'] + $month['expense'];
                }
            }

            // last saldo
            $lastYearIndex = count($data) - 1;
            $lastMonthIndex = count($data[$lastYearIndex]['months']) - 1;
            $lastSaldo = $data[$lastYearIndex]['months'][$lastMonthIndex]['saldo'];
        
        } else {
            $totalRevenue = null;
            $totalExpense = null;
            $lastSaldo = null;
        }
        // dd($data);
        return view('home', [
            'totalRevenue' => $totalRevenue,
            'totalExpense' => $totalExpense,
            'lastSaldo' => $lastSaldo,
            'totalUser' => count(User::all()),
            'totalTransaction' => count(Transaction::all()),
        ]);
    }
}
