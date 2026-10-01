<?php

namespace App\Http\Controllers;
use App\Models\employeeModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = employeeModel::all();
        return view('content.employee.index', compact('data'));
    }

    public function create()
    {
        return view('content.employee.create');
    }

    public function store(Request $request)
    {
        employeeModel::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'direktorat' => $request->direktorat,
            'bidang' => $request->bidang,
            'email' => $request->email,
           // 'password' => Hash::make($request->password),
        ]);

       return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $data = employeeModel::findOrFail($id);
        return view('content.employee.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = employeeModel::findOrFail($id);

        $data->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'direktorat' => $request->direktorat,
            'bidang' => $request->bidang,
            'email' => $request->email,
            //'password' => $request->password 
            //    ? Hash::make($request->password) 
            //    : $data->password,
        ]);

        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        employeeModel::destroy($id);
        return redirect()->route('employee.index');
    }
}