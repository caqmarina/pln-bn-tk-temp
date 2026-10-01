<?php

namespace App\Http\Controllers;

use App\Models\employeeModel;
use App\Models\ListSouvenirModel;
use App\Models\OperationalSouvenirModel;
use Illuminate\Http\Request;

class OperationalSouvenirController extends Controller
{
    public function index()
    {
        $data = OperationalSouvenirModel::with([
            'employee',
            'souvenir',
        ])->get();

        return view(
            'content.operational_souvenir.index',
            compact('data')
        );
    }

    public function create()
    {
        $employees = employeeModel::all();

        $souvenirs = ListSouvenirModel::all();

        return view(
            'content.operational_souvenir.create',
            compact('employees', 'souvenirs')
        );
    }

    public function store(Request $request)
    {
        // cari souvenir
        $souvenir = ListSouvenirModel::findOrFail(
            $request->souvenir_id
        );

        // validasi stok
        if ($request->jumlah > $souvenir->sisa) {

            return back()->with(
                'error',
                'Stok souvenir tidak mencukupi'
            );
        }

        // simpan operasional
        OperationalSouvenirModel::create([

            'tanggal' => $request->tanggal,

            'employee_id' => $request->employee_id,

            'keperluan' => $request->keperluan,

            'souvenir_id' => $request->souvenir_id,

            'jumlah' => $request->jumlah,
        ]);

        // update stok sisa
        $souvenir->sisa =
            $souvenir->sisa - $request->jumlah;

        $souvenir->save();

        return redirect()->route(
            'operationalsouvenir.index'
        );
    }

    public function destroy($id)
    {
        $data = OperationalSouvenirModel::findOrFail($id);

        // kembalikan stok
        $souvenir = ListSouvenirModel::findOrFail(
            $data->souvenir_id
        );

        $souvenir->sisa =
            $souvenir->sisa + $data->jumlah;

        $souvenir->save();

        // hapus data
        $data->delete();

        return redirect()->route(
            'operationalsouvenir.index'
        );
    }

    public function edit($id)
    {
        $data = OperationalSouvenirModel::findOrFail($id);

        $employees = employeeModel::all();

        $souvenirs = ListSouvenirModel::all();

        return view(
            'content.operational_souvenir.edit',
            compact(
                'data',
                'employees',
                'souvenirs'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $data = OperationalSouvenirModel::findOrFail($id);

        // rollback stok lama
        $oldSouvenir = ListSouvenirModel::findOrFail(
            $data->souvenir_id
        );

        $oldSouvenir->sisa =
            $oldSouvenir->sisa + $data->jumlah;

        $oldSouvenir->save();

        // cek stok souvenir baru
        $newSouvenir = ListSouvenirModel::findOrFail(
            $request->souvenir_id
        );

        if ($request->jumlah > $newSouvenir->sisa) {

            return back()->with(
                'error',
                'Stok souvenir tidak mencukupi'
            );
        }

        // update data
        $data->update([

            'tanggal' => $request->tanggal,

            'employee_id' => $request->employee_id,

            'keperluan' => $request->keperluan,

            'souvenir_id' => $request->souvenir_id,

            'jumlah' => $request->jumlah,

        ]);

        // kurangi stok baru
        $newSouvenir->sisa =
            $newSouvenir->sisa - $request->jumlah;

        $newSouvenir->save();

        return redirect()->route(
            'operationalsouvenir.index'
        );
    }

}
