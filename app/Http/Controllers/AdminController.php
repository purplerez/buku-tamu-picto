<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dailyRecaps = Guestbook::selectRaw('DATE(created_at) as date, count(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.dashboard', compact('dailyRecaps'));
    }

    public function detail($date)
    {
        $guests = Guestbook::whereDate('created_at', $date)->latest()->get();
        return view('admin.detail', compact('guests', 'date'));
    }

    public function exportPdf($date)
    {
        $guests = Guestbook::whereDate('created_at', $date)->latest()->get();

        $pdf = Pdf::loadView('admin.pdf', compact('guests', 'date'));
        
        return $pdf->download('rekap_buku_tamu_' . $date . '.pdf');
    }
}
