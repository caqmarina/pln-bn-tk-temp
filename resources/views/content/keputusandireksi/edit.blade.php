@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Keputusan Direksi')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Edit Keputusan Direksi</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('keputusandireksi.update', $data->id) }}" 
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nomor</label>

                    <input 
                        type="text"
                        name="nomor"
                        class="form-control"
                        value="{{ $data->nomor }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul</label>

                    <input 
                        type="text"
                        name="judul"
                        class="form-control"
                        value="{{ $data->judul }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Disahkan</label>

                    <input 
                        type="date"
                        name="tanggal_disahkan"
                        class="form-control"
                        value="{{ $data->tanggal_disahkan }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Berlaku</label>

                    <input 
                        type="date"
                        name="tanggal_berlaku"
                        class="form-control"
                        value="{{ $data->tanggal_berlaku }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select 
                        name="status"
                        class="form-control">

                        <option value="Aktif"
                            {{ $data->status == 'Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="Tidak Aktif"
                            {{ $data->status == 'Tidak Aktif' ? 'selected' : '' }}>
                            Tidak Aktif
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dokumen Softcopy</label>

                    <input 
                        type="file"
                        name="dokumen_softcopy"
                        class="form-control"
                    >
                </div>

                @if($data->dokumen_softcopy)
                <div class="mb-3">

                    <label class="form-label">Dokumen Saat Ini</label>

                    <br>

                    <a href="{{ asset('storage/' . $data->dokumen_softcopy) }}" 
                        target="_blank"
                        class="btn btn-info btn-sm">

                        Lihat Dokumen

                    </a>

                </div>
                @endif

                <button type="submit"
                    class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('keputusandireksi.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection