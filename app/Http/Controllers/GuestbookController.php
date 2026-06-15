<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guestbook;

class GuestbookController extends Controller
{
    public function index()
    {
        $guestbooks = Guestbook::latest()->get();
        return view('guestbook.index', compact('guestbooks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Guestbook::create($validated);

        return redirect()->back()->with('success', 'Data buku tamu berhasil disimpan!');
    }
}
