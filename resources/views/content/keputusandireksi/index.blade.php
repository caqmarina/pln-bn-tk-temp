@extends('layouts/contentNavbarLayout')

@section('title', 'Keputusan Direksi')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">Keputusan Direksi</h5>

        <a href="{{ route('keputusandireksi.create') }}"
            class="btn btn-primary">
            Tambah Keputusan Direksi
        </a>

    </div>

    <div class="table-responsive text-nowrap">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor</th>
                    <th>Judul</th>
                    <th>Tanggal Disahkan</th>
                    <th>Tanggal Berlaku</th>
                    <th>Status</th>
                    <th>Dokumen</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($data as $key => $row)

                <tr>

                    <td>{{ $key + 1 }}</td>

                    <td>{{ $row->nomor }}</td>

                    <td>{{ $row->judul }}</td>

                    <td>{{ $row->tanggal_disahkan }}</td>

                    <td>{{ $row->tanggal_berlaku }}</td>

                    <td>

                        @if($row->status == 'Aktif')

                            <span class="badge bg-label-success">
                                Aktif
                            </span>

                        @else

                            <span class="badge bg-label-danger">
                                Tidak Aktif
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($row->dokumen_softcopy)

                            <a href="{{ asset('storage/' . $row->dokumen_softcopy) }}"
                                target="_blank"
                                class="btn btn-info btn-sm">

                                Lihat Dokumen

                            </a>

                        @else

                            <span class="badge bg-label-warning">
                                Tidak Ada File
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('keputusandireksi.edit', $row->id) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('keputusandireksi.destroy', $row->id) }}"
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

                    <td colspan="8" class="text-center">
                        Data keputusan direksi belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection