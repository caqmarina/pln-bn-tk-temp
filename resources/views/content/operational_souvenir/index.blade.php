@extends('layouts/contentNavbarLayout')

@section('title', 'Operational Souvenir')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">Operational Souvenir</h5>

        <a href="{{ route('operationalsouvenir.create') }}"
            class="btn btn-primary">
            Tambah Operasional
        </a>

    </div>

    <div class="table-responsive text-nowrap">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pemohon</th>
                    <th>Keperluan</th>
                    <th>Nama Souvenir</th>
                    <th>Jumlah</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($data as $key => $row)

                <tr>

                    <td>{{ $key + 1 }}</td>

                    <td>{{ $row->tanggal }}</td>

                    <td>
                        {{ $row->employee->nama ?? '-' }}
                    </td>

                    <td style="max-width:250px; white-space:normal;">
                        {{ $row->keperluan }}
                    </td>

                    <td>
                        <span class="badge bg-label-info">
                            {{ $row->souvenir->nama_souvenir ?? '-' }}
                        </span>
                    </td>

                    <td>
                        <span class="badge bg-label-primary">
                            {{ $row->jumlah }}
                        </span>
                    </td>

                    <td>

                        <a href="{{ route('operationalsouvenir.edit', $row->id) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('operationalsouvenir.destroy', $row->id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data ini?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">
                        Data operasional souvenir belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection