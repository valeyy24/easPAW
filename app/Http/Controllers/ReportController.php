<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function daily()
    {
        $sales = Sale::whereDate('created_at', today())->get();
        $purchases = Purchase::whereDate('created_at', today())->get();
        return view('reports.daily', compact('sales', 'purchases'));
    }

    public function monthly()
    {
        $sales = Sale::whereMonth('created_at', now()->month)->get();
        $purchases = Purchase::whereMonth('created_at', now()->month)->get();
        return view('reports.monthly', compact('sales', 'purchases'));
    }

    public function yearly()
    {
        $sales = Sale::whereYear('created_at', now()->year)->get();
        $purchases = Purchase::whereYear('created_at', now()->year)->get();
        return view('reports.yearly', compact('sales', 'purchases'));
    }
}

