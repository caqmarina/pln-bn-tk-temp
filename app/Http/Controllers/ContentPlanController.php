<?php

namespace App\Http\Controllers;
use App\Models\ContentPlanModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentPlanController extends Controller
{
    public function index()
    {
        $data = ContentPlanModel::all();
        //$data = ContentPlanModel::paginate(10);

        return view('content.content_plan.index', compact('data'));
    }

    public function create()
    {
        return view('content.content_plan.create');
    }

    public function store(Request $request)
    {
        ContentPlanModel::create($request->all());

        return redirect()->route('content_plan.index');
    }

    public function edit($id)
    {
        $data = ContentPlanModel::findOrFail($id);

        return view('content.content_plan.edit', compact('data'));
    }

    public function update(Request $request, $id)
{
    $data = ContentPlanModel::findOrFail($id);

    $data->update([
        'tanggal_upload' => $request->tanggal_upload,
        'time_upload' => $request->time_upload,
        'jenis_konten' => $request->jenis_konten,
        'judul_konten' => $request->judul_konten,
        'link_draft' => $request->link_draft,
        'caption' => $request->caption,
        'feedback' => $request->feedback,
        'status' => $request->status,
    ]);

    return redirect()->route('content_plan.index');
}

    public function destroy($id)
    {
        ContentPlanModel::destroy($id);

        return redirect()->route('content_plan.index');
    }
}