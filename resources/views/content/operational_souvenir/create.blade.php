@extends('layouts/contentNavbarLayout')

@section('title', 'Create Operational Souvenir')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Create Operational Souvenir</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('operationalsouvenir.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>

                    <input 
                        type="date"
                        name="tanggal"
                        class="form-control"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Pemohon</label>

                    <select name="employee_id" class="form-control">

                        <option value="">
                            -- Pilih Pemohon --
                        </option>

                        @foreach($employees as $employee)

                            <option value="{{ $employee->id }}">
                                {{ $employee->nama }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keperluan</label>

                    <textarea 
                        name="keperluan"
                        class="form-control"
                        rows="3"
                        placeholder="Masukkan keperluan penggunaan souvenir"
                    ></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Souvenir</label>

                    <select name="souvenir_id" class="form-control">

                        <option value="">
                            -- Pilih Souvenir --
                        </option>

                        @foreach($souvenirs as $souvenir)

                            <option value="{{ $souvenir->id }}">
                                {{ $souvenir->nama_souvenir }}
                                (Sisa: {{ $souvenir->sisa }})
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah</label>

                    <input 
                        type="number"
                        name="jumlah"
                        class="form-control"
                        placeholder="Masukkan jumlah souvenir"
                    >
                </div>

                <button type="submit"
                    class="btn btn-primary">
                    Save
                </button>

                <a href="{{ route('operationalsouvenir.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection