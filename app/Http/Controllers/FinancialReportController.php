<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\ActivityLog;

class FinancialReportController extends Controller
{
    public function data()
    {
        // $datas = Transaction::all();

        // $groupedDates = [];

        // foreach ($datas as $date) {
        //     $formattedDate = date_create_from_format("Y-m-d", $date->transaction_date);
        //     $year = date_format($formattedDate, "Y");
        //     $month = date_format($formattedDate, "F");

        //     if (!array_key_exists($year, $groupedDates)) {
        //         $groupedDates[$year] = [];
        //     }

        //     if (!array_key_exists($month, $groupedDates[$year])) {
        //         $groupedDates[$year][$month] = [];
        //     }

        //     $groupedDates[$year][$month][] = $date;
            
        //     $result = [];
        //     foreach ($groupedDates as $year => $months) {
        //         $monthsData = [];
        //         foreach ($months as $month => $dates) {
        //             $monthsData[] = [
        //                 "month" => strtolower($month),
        //                 "dates" => $dates,
        //             ];
        //         }

        //         $result[] = [
        //             "year" => $year,
        //             "months" => $monthsData,
        //         ];
        //     }
        // }

        $datas = Transaction::all();

        $groupedDates = [];

        foreach ($datas as $date) {
            $formattedDate = date_create_from_format("Y-m-d", $date->transaction_date);
            $year = date_format($formattedDate, "Y");
            $month = date_format($formattedDate, "F");

            if (!array_key_exists($year, $groupedDates)) {
                $groupedDates[$year] = [];
            }

            if (!array_key_exists($month, $groupedDates[$year])) {
                $groupedDates[$year][$month] = [
                    "total_quantity" => 0,
                    "revenue" => 0,
                    "expense" => 0,
                ];
            }
            $groupedDates[$year][$month][] = $date;

            // revenue & expense logic
            $revenue = 0;
            $expense = 0;
            if ($date->status == 'Masuk' ) {
                $revenue += $date->quantity;
            } elseif ($date->status == 'Keluar' ) {
                $expense += $date->quantity;
            }

            // revenue
            $groupedDates[$year][$month]["revenue"] += $revenue;
            // expense
            $groupedDates[$year][$month]["expense"] += $expense;
            // total
            $total = $revenue - $expense;
            $groupedDates[$year][$month]["total_quantity"] += $total;
        }

        $result = [];
        $saldo =0;
        foreach ($groupedDates as $year => $months) {
            $monthsData = [];
            foreach ($months as $month => $monthData) {
                $total_quantity = $monthData["total_quantity"];
                $revenue = $monthData["revenue"];
                $expense = $monthData["expense"];
                $saldo += $monthData["total_quantity"];

                unset($monthData["total_quantity"]);
                unset($monthData["revenue"]);
                unset($monthData["expense"]);

                $monthsData[] = [
                    "month" => strtolower($month),
                    "total_quantity" => $total_quantity,
                    "revenue" => $revenue,
                    "expense" => $expense,
                    "saldo" => $saldo,
                    "dates" => $monthData,
                ];
            }

            $result[] = [
                "year" => $year,
                "months" => $monthsData,
            ];
        }


        return $result;
    }

    public function index()
    {              
        $data = $this->data();

        return view('financial_report.index', [
            'result' => $data,
        ]);
    }

    public function detail($month, $year)
    {              
        $result = $this->data();

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
        } else {
            $dates = null;
            $total_quantity = null;
            $revenue = null;
            $expense = null;
        }

        // dd($result);
        return view('financial_report.detail', [
            'dates' => $dates,
            'month' => $month,
            'year' => $year,
            'total_quantity' => $total_quantity,
            'revenue' => $revenue,
            'expense' => $expense,
        ]);
    }
}
