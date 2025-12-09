<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tiket;
use Barryvdh\DomPDF\Facade\Pdf; // ← WAJIB

class EventController extends Controller
{
    public function index()
    {
        return view('tiket-buat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_event' => 'required|string',
            'deskripsi_event' => 'nullable|string',
            'kategori_event' => 'nullable|string',
            'tanggal_event' => 'required|date',
            'kuota_event' => 'required|integer',
            'status_event' => 'required|string',
            'harga_event' => 'required|numeric'
        ]);

        // SIMPAN DATA
        $event = tiket::create($validated);

        // GENERATE PDF
        $pdf = Pdf::loadView('struk-pdf', compact('event'));

        // DOWNLOAD
        return $pdf->download('struk-event-'.$event->id_tiket.'.pdf');
    }
}
