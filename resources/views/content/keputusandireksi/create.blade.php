@extends('layouts/contentNavbarLayout')

@section('title', 'Create Keputusan Direksi')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Create Keputusan Direksi</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('keputusandireksi.store') }}" 
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nomor</label>

                    <input 
                        type="text"
                        name="nomor"
                        class="form-control"
                        placeholder="Masukkan nomor keputusan"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul</label>

                    <input 
                        type="text"
                        name="judul"
                        class="form-control"
                        placeholder="Masukkan judul keputusan"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Disahkan</label>

                    <input 
                        type="date"
                        name="tanggal_disahkan"
                        class="form-control"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Berlaku</label>

                    <input 
                        type="date"
                        name="tanggal_berlaku"
                        class="form-control"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select 
                        name="status"
                        class="form-control">

                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>

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

                <button type="submit"
                    class="btn btn-primary">
                    Save
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