<?php

namespace App\Http\Controllers;

use App\Models\PemainOlahraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PemainOlahragaController extends Controller
{
    /**
     * Public page listing for guests.
     */
    public function publicIndex(Request $request)
    {
        $search = $request->input('search');
        
        $query = PemainOlahraga::query();
        if ($search) {
            $query->where('nama_event', 'like', "%{$search}%")
                  ->orWhere('tempat', 'like', "%{$search}%")
                  ->orWhere('penanggung_jawab', 'like', "%{$search}%");
        }
        
        $pemains = $query->orderBy('tanggal', 'desc')->paginate(6);
        
        return view('projects', compact('pemains', 'search'));
    }

    /**
     * Admin backend listing.
     */
    public function index()
    {
        $pemains = PemainOlahraga::orderBy('id_event', 'desc')->get();

        // Generate PDF sekali saat halaman dimuat dan embed sebagai base64
        // agar modal preview PDF langsung tampil tanpa HTTP request tambahan
        $pdfBase64 = base64_encode(
            Pdf::loadView('admin.pdf', ['pemains' => PemainOlahraga::all()])->output()
        );

        return view('admin.index', compact('pemains', 'pdfBase64'));
    }

    /**
     * Show form for creating a new player.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created player in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'tempat' => ['required', 'string', 'max:255'],
            'penanggung_jawab' => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ], [
            'nama_event.required' => 'Nama event wajib diisi.',
            'tanggal.required' => 'Tanggal event wajib diisi.',
            'tempat.required' => 'Tempat event wajib diisi.',
            'penanggung_jawab.required' => 'Penanggung jawab wajib diisi.',
            'gambar.required' => 'Foto event wajib diunggah.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, svg, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        $input = $request->only(['nama_event', 'tanggal', 'tempat', 'penanggung_jawab']);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('events', 'public');
            $input['gambar'] = $path;
        }

        PemainOlahraga::create($input);

        return redirect()->route('admin.index')->with('success', 'Data event berhasil ditambahkan!');
    }

    /**
     * Show form for editing the specified player.
     */
    public function edit($id_event)
    {
        $pemain = PemainOlahraga::findOrFail($id_event);
        return view('admin.edit', compact('pemain'));
    }

    /**
     * Update the specified player in storage.
     */
    public function update(Request $request, $id_event)
    {
        $pemain = PemainOlahraga::findOrFail($id_event);

        $request->validate([
            'nama_event' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'tempat' => ['required', 'string', 'max:255'],
            'penanggung_jawab' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ], [
            'nama_event.required' => 'Nama event wajib diisi.',
            'tanggal.required' => 'Tanggal event wajib diisi.',
            'tempat.required' => 'Tempat event wajib diisi.',
            'penanggung_jawab.required' => 'Penanggung jawab wajib diisi.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, svg, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        $input = $request->only(['nama_event', 'tanggal', 'tempat', 'penanggung_jawab']);

        if ($request->hasFile('gambar')) {
            // Delete old file if it exists using Storage disk public
            if ($pemain->gambar && Storage::disk('public')->exists($pemain->gambar)) {
                Storage::disk('public')->delete($pemain->gambar);
            }

            $path = $request->file('gambar')->store('events', 'public');
            $input['gambar'] = $path;
        }

        $pemain->update($input);

        return redirect()->route('admin.index')->with('success', 'Data event berhasil diperbarui!');
    }

    /**
     * Remove the specified player from storage.
     */
    public function destroy($id_event)
    {
        $pemain = PemainOlahraga::findOrFail($id_event);

        // Delete associated image
        if ($pemain->gambar && Storage::disk('public')->exists($pemain->gambar)) {
            Storage::disk('public')->delete($pemain->gambar);
        }

        $pemain->delete();

        return redirect()->route('admin.index')->with('success', 'Data event berhasil dihapus!');
    }

    /**
     * Export all players to a PDF.
     */
    public function exportPdf(Request $request)
    {
        $pemains = PemainOlahraga::all();
        $pdf = Pdf::loadView('admin.pdf', compact('pemains'));
        return $pdf->download('Laporan_Data_Pemain_Olahraga.pdf');
    }
}
