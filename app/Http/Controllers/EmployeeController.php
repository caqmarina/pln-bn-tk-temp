<?php

namespace App\Http\Controllers;

use App\Models\employeeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', 'unique:employees,nip'],
            'direktorat' => ['required', 'string', 'max:255'],
            'bidang' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:employees,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        employeeModel::create([
<<<<<<< HEAD
            'nama' => $request->nama,
            'nip' => $request->nip,
            'direktorat' => $request->direktorat,
            'bidang' => $request->bidang,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
=======
            'nama' => $validated['nama'],
            'nip' => $validated['nip'],
            'direktorat' => $validated['direktorat'],
            'bidang' => $validated['bidang'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
>>>>>>> 6144aa0 (fix: removed public registration and mvoed employee credentials from user model to employee model)
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

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', 'unique:employees,nip,'.$data->id],
            'direktorat' => ['required', 'string', 'max:255'],
            'bidang' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:employees,email,'.$data->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $updates = collect($validated)->except('password')->all();

        if (! empty($validated['password'])) {
            $updates['password'] = Hash::make($validated['password']);
        }

        $data->update($updates);

        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        employeeModel::destroy($id);

        return redirect()->route('employee.index');
    }
}
