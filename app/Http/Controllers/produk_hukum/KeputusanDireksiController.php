<?php

namespace App\Http\Controllers\produk_hukum;

use App\Models\KeputusanDireksiModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeputusanDireksiController extends Controller
{
    public function index()
    {
        $data = KeputusanDireksiModel::all();

        return view('content.keputusandireksi.index', compact('data'));
    }

    public function create()
    {
        return view('content.keputusandireksi.create');
    }

    public function store(Request $request)
    {
        // upload file
        $file = null;

        if ($request->hasFile('dokumen_softcopy')) {

            $file = $request->file('dokumen_softcopy')
                ->store('dokumen_keputusan_direksi', 'public');
        }

        KeputusanDireksiModel::create([

            'nomor' => $request->nomor,

            'judul' => $request->judul,

            'tanggal_disahkan' => $request->tanggal_disahkan,

            'tanggal_berlaku' => $request->tanggal_berlaku,

            'status' => $request->status,

            'dokumen_softcopy' => $file,

        ]);

        return redirect()->route('keputusandireksi.index');
    }

    public function edit($id)
    {
        $data = KeputusanDireksiModel::findOrFail($id);

        return view('content.keputusandireksi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KeputusanDireksiModel::findOrFail($id);

        $file = $data->dokumen_softcopy;

        // jika upload file baru
        if ($request->hasFile('dokumen_softcopy')) {

            $file = $request->file('dokumen_softcopy')
                ->store('dokumen_keputusan_direksi', 'public');
        }

        $data->update([

            'nomor' => $request->nomor,

            'judul' => $request->judul,

            'tanggal_disahkan' => $request->tanggal_disahkan,

            'tanggal_berlaku' => $request->tanggal_berlaku,

            'status' => $request->status,

            'dokumen_softcopy' => $file,

        ]);

        return redirect()->route('keputusandireksi.index');
    }

    public function destroy($id)
    {
        KeputusanDireksiModel::destroy($id);

        return redirect()->route('keputusandireksi.index');
    }
}