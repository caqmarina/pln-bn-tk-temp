<?php

namespace App\Http\Controllers;

use App\Models\ListSouvenirModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListSouvenirController extends Controller
{
    public function index()
    {
        $data = ListSouvenirModel::all();

        return view('content.souvenir.index', compact('data'));
    }

    public function create()
    {
        return view('content.souvenir.create');
    }

    public function store(Request $request)
    {
        ListSouvenirModel::create([

            'nama_souvenir' => $request->nama_souvenir,

            'tanggal_perolehan' => $request->tanggal_perolehan,

            'harga_perolehan' => $request->harga_perolehan,

            'vendor' => $request->vendor,

            'jumlah_beli' => $request->jumlah_beli,

            // otomatis sisa awal = jumlah beli
            'sisa' => $request->jumlah_beli,

        ]);

        return redirect()->route('list_souvenir.index');
    }

    public function edit($id)
    {
        $data = ListSouvenirModel::findOrFail($id);

        return view('content.souvenir.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ListSouvenirModel::findOrFail($id);

        $data->update([

            'nama_souvenir' => $request->nama_souvenir,

            'tanggal_perolehan' => $request->tanggal_perolehan,

            'harga_perolehan' => $request->harga_perolehan,

            'vendor' => $request->vendor,

            'jumlah_beli' => $request->jumlah_beli,

            'sisa' => $request->sisa,

        ]);

        return redirect()->route('list_souvenir.index');
    }

    public function destroy($id)
    {
        ListSouvenirModel::destroy($id);

        return redirect()->route('list_souvenir.index');
    }
}
