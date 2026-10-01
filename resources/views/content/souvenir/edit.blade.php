@extends('layouts/contentNavbarLayout')

@section('title', 'Edit List Souvenir')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Edit List Souvenir</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('list_souvenir.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Souvenir</label>

                    <input 
                        type="text"
                        name="nama_souvenir"
                        class="form-control"
                        value="{{ $data->nama_souvenir }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Perolehan</label>

                    <input 
                        type="date"
                        name="tanggal_perolehan"
                        class="form-control"
                        value="{{ $data->tanggal_perolehan }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Perolehan</label>

                    <input 
                        type="number"
                        name="harga_perolehan"
                        class="form-control"
                        value="{{ $data->harga_perolehan }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Vendor</label>

                    <input 
                        type="text"
                        name="vendor"
                        class="form-control"
                        value="{{ $data->vendor }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Beli</label>

                    <input 
                        type="number"
                        name="jumlah_beli"
                        class="form-control"
                        value="{{ $data->jumlah_beli }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Sisa Stok</label>

                    <input 
                        type="number"
                        name="sisa"
                        class="form-control"
                        value="{{ $data->sisa }}"
                    >
                </div>

                <button type="submit"
                    class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('list_souvenir.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection