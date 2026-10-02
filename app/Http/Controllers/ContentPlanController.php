<?php

namespace App\Http\Controllers;

use App\Models\ContentPlanModel;
use Illuminate\Http\Request;

class ContentPlanController extends Controller
{
    public function index(Request $request)
    {
        // Validasi filter tanggal
        $request->validate([
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Membuat query dasar untuk mengambil data Content Plan
        $query = ContentPlanModel::query();

        // Filter berdasarkan status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan jenis konten
        if ($request->jenis_konten) {
            $query->where('jenis_konten', $request->jenis_konten);
        }

        // Filter berdasarkan judul konten
        if ($request->judul_konten) {
            $query->where('judul_konten', 'like', '%'.$request->judul_konten.'%');
        }

        // Filter berdasarkan tanggal mulai
        if ($request->tanggal_mulai) {
            $query->whereDate('tanggal_upload', '>=', $request->tanggal_mulai);
        }

        // Filter berdasarkan tanggal selesai
        if ($request->tanggal_selesai) {
            $query->whereDate('tanggal_upload', '<=', $request->tanggal_selesai);
        }

        // Menjalankan query dan mengambil hasilnya
        $data = $query->get();

        // Mengirim data ke halaman Content Plan
        return view('content.content_plan.index', compact('data'));
    }

    public function create()
    {
        return view('content.content_plan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->contentPlanRules());

        ContentPlanModel::create($validated);

        return redirect()
            ->route('content_plan.index')
            ->with('success', 'Content Plan berhasil ditambahkan.');
    }

    private function contentPlanRules(): array
    {
        return [
            'tanggal_upload' => 'required|date',
            'time_upload' => 'required',
            'jenis_konten' => 'required|in:Single,Carousel',
            'judul_konten' => 'required|string|max:255',
            'brief' => 'required|string',
            'link_draft' => 'required|url',
            'caption' => 'nullable|string',
            'feedback' => 'required|string',
            'status' => 'required|in:Draft,Review,Approved,Published',
        ];
    }

    public function edit($id)
    {
        $data = ContentPlanModel::findOrFail($id);

        return view('content.content_plan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate($this->contentPlanRules());

        $data = ContentPlanModel::findOrFail($id);
        $data->update($validated);

        return redirect()->route('content_plan.index');
    }

    public function destroy($id)
    {
        ContentPlanModel::destroy($id);

        return redirect()->route('content_plan.index');
    }
}
