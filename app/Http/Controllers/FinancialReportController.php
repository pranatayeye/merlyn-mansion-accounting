<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Services\ReportService;
use Carbon\Carbon;

class FinancialReportController extends Controller
{
    public function index()
    {              
        $data = ReportService::data();

        return view('financial_report.index', [
            'result' => $data,
        ]);
    }

    public function getReport($month, $year)
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

        return array($dates, $total_quantity, $revenue, $expense, $saldo, $previous_saldo);
    }

    public function detail($month, $year)
    {              
        $report = $this->getReport($month, $year);

        $dates = $report[0];
        $total_quantity = $report[1];
        $revenue = $report[2];
        $expense = $report[3];
        $saldo = $report[4];
        $previous_saldo = $report[5];
        
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

    public function generatePdf($month, $year)
    {
        $report = $this->getReport($month, $year);

        $dates = $report[0];
        $total_quantity = $report[1];
        $revenue = $report[2];
        $expense = $report[3];
        $saldo = $report[4];
        $previous_saldo = $report[5];

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('financial_report.pdf', [
            'dates' => $dates,
            'month' => $month,
            'year' => $year,
            'total_quantity' => $total_quantity,
            'revenue' => $revenue,
            'expense' => $expense,
            'saldo' => $saldo,
            'previous_saldo' => $previous_saldo,
        ]));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $fileName = 'Laporan-Periode-'. Carbon::parse($month)->format('M') .'-'. Carbon::parse($year)->format('y') .'.pdf';
        return $dompdf->stream($fileName);
    }
}
