<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Services\ReportService;

class FinancialReportController extends Controller
{
    public function index()
    {              
        $data = ReportService::data();

        return view('financial_report.index', [
            'result' => $data,
        ]);
    }

    public function detail($month, $year)
    {              
        $result = ReportService::data();

        $monthToFind = strtolower($month);
        $yearToFind = $year;

        $monthData = null;
        $yearData = null;

        // find year
        foreach ($result as $yData) {
            if ($yData['year'] == $yearToFind) {
                $yearData = $yData;
                break;
            }
        }

        // find month
        if ($yearData) {
            foreach ($yearData['months'] as $mData) {
                if ($mData['month'] == $monthToFind) {
                    $monthData = $mData;
                    break;
                }
            }
        }

        if ($monthData) {
            $dates = $monthData['dates'];
            $total_quantity = $monthData['total_quantity'];
            $revenue = $monthData['revenue'];
            $expense = $monthData['expense'];
            $saldo = $monthData['saldo'];
            $previous_saldo = $monthData['previous_saldo'];
        } else {
            $dates = null;
            $total_quantity = null;
            $revenue = null;
            $expense = null;
            $saldo = null;
            $previous_saldo = null;
        }

        // dd($result);
        return view('financial_report.detail', [
            'dates' => $dates,
            'month' => $month,
            'year' => $year,
            'total_quantity' => $total_quantity,
            'revenue' => $revenue,
            'expense' => $expense,
            'saldo' => $saldo,
            'previous_saldo' => $previous_saldo,
        ]);
    }
}
