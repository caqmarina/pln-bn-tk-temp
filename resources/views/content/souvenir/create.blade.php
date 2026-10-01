@extends('layouts/contentNavbarLayout')

@section('title', 'Create List Souvenir')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Create List Souvenir</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('list_souvenir.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Souvenir</label>

                    <input 
                        type="text"
                        name="nama_souvenir"
                        class="form-control"
                        placeholder="Masukkan nama souvenir"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Perolehan</label>

                    <input 
                        type="date"
                        name="tanggal_perolehan"
                        class="form-control"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Perolehan</label>

                    <input 
                        type="number"
                        name="harga_perolehan"
                        class="form-control"
                        placeholder="Masukkan harga perolehan"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Vendor</label>

                    <input 
                        type="text"
                        name="vendor"
                        class="form-control"
                        placeholder="Nama Vendor"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Beli</label>

                    <input 
                        type="number"
                        name="jumlah_beli"
                        class="form-control"
                        placeholder="0"
                    >
                </div>

                <button type="submit"
                    class="btn btn-primary">
                    Save
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