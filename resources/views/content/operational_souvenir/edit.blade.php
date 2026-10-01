@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Operational Souvenir')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Edit Operational Souvenir</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('operationalsouvenir.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>

                    <input 
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ $data->tanggal }}"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Pemohon</label>

                    <select name="employee_id" class="form-control">

                        @foreach($employees as $employee)

                            <option 
                                value="{{ $employee->id }}"
                                {{ $data->employee_id == $employee->id ? 'selected' : '' }}
                            >
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
                    >{{ $data->keperluan }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Souvenir</label>

                    <select name="souvenir_id" class="form-control">

                        @foreach($souvenirs as $souvenir)

                            <option 
                                value="{{ $souvenir->id }}"
                                {{ $data->souvenir_id == $souvenir->id ? 'selected' : '' }}
                            >
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
                        value="{{ $data->jumlah }}"
                    >
                </div>

                <button type="submit"
                    class="btn btn-primary">
                    Update
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