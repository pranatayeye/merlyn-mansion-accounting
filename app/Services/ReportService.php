<?php

namespace App\Services;
use App\Models\Transaction;

class ReportService {
    public static function data() 
    {
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
                    "previous_saldo" => 0,
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
        $saldo = 0;
        foreach ($groupedDates as $year => $months) {
            $monthsData = [];
            foreach ($months as $month => $monthData) {
                $total_quantity = $monthData["total_quantity"];
                $revenue = $monthData["revenue"];
                $expense = $monthData["expense"];
                
                // for next saldo
                if ($saldo == $total_quantity) {
                    $saldo = 0;
                } else {
                    $revenue += $saldo;
                }
                $saldo += $total_quantity;
                
                // get previous saldo
                $previous_saldo = $monthData["previous_saldo"] = $saldo - $total_quantity;

                // remove useless keys
                unset($monthData["total_quantity"]);
                unset($monthData["revenue"]);
                unset($monthData["expense"]);
                unset($monthData["previous_saldo"]);

                $monthsData[] = [
                    "month" => strtolower($month),
                    "total_quantity" => $total_quantity,
                    "revenue" => $revenue,
                    "expense" => $expense,
                    "saldo" => $saldo,
                    "previous_saldo" => $previous_saldo,
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
}
