@extends('layouts/contentNavbarLayout')

@section('title', 'List Souvenir')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">List Souvenir</h5>

        <a href="{{ route('list_souvenir.create') }}"
            class="btn btn-primary">
            Tambah Souvenir
        </a>

    </div>

    <div class="table-responsive text-nowrap">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Souvenir</th>
                    <th>Tanggal Perolehan</th>
                    <th>Harga Perolehan</th>
                    <th>Vendor</th>
                    <th>Jumlah Beli</th>
                    <th>Sisa Stok</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($data as $key => $row)

                <tr>

                    <td>{{ $key + 1 }}</td>

                    <td>{{ $row->nama_souvenir }}</td>

                    <td>{{ $row->tanggal_perolehan }}</td>

                    <td>
                        Rp {{ number_format($row->harga_perolehan, 0, ',', '.') }}
                    </td>

                    <td>{{ $row->vendor }}</td>

                    <td>
                        <span class="badge bg-label-primary">
                            {{ $row->jumlah_beli }}
                        </span>
                    </td>

                    <td>

                        @if($row->sisa > 10)

                            <span class="badge bg-label-success">
                                {{ $row->sisa }}
                            </span>

                        @elseif($row->sisa > 0)

                            <span class="badge bg-label-warning">
                                {{ $row->sisa }}
                            </span>

                        @else

                            <span class="badge bg-label-danger">
                                Habis
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('list_souvenir.edit', $row->id) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('list_souvenir.destroy', $row->id) }}"
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
                        Data souvenir belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection