<?php

namespace App\Http\Controllers;

use App\Models\employeeModel;
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
    $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal_lahir' => 'nullable|date|before_or_equal:today',
        'nip' => 'required|string|max:255|unique:employees,nip',
        'direktorat' => 'required|string|max:255',
        'bidang' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:employees,email',
    ]);

    employeeModel::create([
        'nama' => $request->nama,
        'tanggal_lahir' => $request->tanggal_lahir,
        'nip' => $request->nip,
        'direktorat' => $request->direktorat,
        'bidang' => $request->bidang,
        'email' => $request->email,
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

    $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal_lahir' => 'nullable|date|before_or_equal:today',
        'nip' => 'required|string|max:255|unique:employees,nip,' . $data->id,
        'direktorat' => 'required|string|max:255',
        'bidang' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:employees,email,' . $data->id,
    ]);

    $data->update([
        'nama' => $request->nama,
        'tanggal_lahir' => $request->tanggal_lahir,
        'nip' => $request->nip,
        'direktorat' => $request->direktorat,
        'bidang' => $request->bidang,
        'email' => $request->email,
    ]);

    return redirect()->route('employee.index');
}


    public function destroy($id)
    {
        employeeModel::destroy($id);

        return redirect()->route('employee.index');
    }
}
