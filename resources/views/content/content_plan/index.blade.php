@extends('layouts/contentNavbarLayout')

@section('title', 'Content Plan')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">Content Plan</h5>

        <a href="{{ route('content_plan.create') }}"
            class="btn btn-primary">
            Tambah Content Plan
        </a>

    </div>

    <div class="table-responsive text-nowrap">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Tanggal Upload</th>
                    <th>Jam Upload</th>
                    <th>Jenis Konten</th>
                    <th>Judul Konten</th>
                    <th>Link Draft</th>
                    <th>Caption</th>
                    <th>Feedback</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($data as $row)

                <tr>

                    <td>{{ $row->tanggal_upload }}</td>

                    <td>{{ $row->time_upload }}</td>

                    <td style="max-width:50px; white-space:normal;">
                        <span class="badge bg-label-info">
                            {{ $row->jenis_konten }}
                        </span>
                    </td>

                    <td style="max-width:250px; white-space:normal;">
                        {{ $row->judul_konten }}</td>
                    <td>
                        <a href="{{ $row->link_draft }}"
                            target="_blank"
                            class="btn btn-sm btn-outline-primary">
                            Open Draft
                        </a>
                    </td>

                    <td style="width:500px; white-space:normal;">
                        {{ $row->caption }}
                    </td>

                    <td style="max-width:25px; white-space:normal;">
                        {{ $row->feedback }}
                    </td>

                    <td>
                        @if($row->status == 'Draft')
                            <span class="badge bg-label-secondary">
                                Draft
                            </span>

                        @elseif($row->status == 'Review')
                            <span class="badge bg-label-warning">
                                Review
                            </span>

                        @elseif($row->status == 'Approved')
                            <span class="badge bg-label-success">
                                Approved
                            </span>

                        @elseif($row->status == 'Published')
                            <span class="badge bg-label-primary">
                                Published
                            </span>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('content_plan.edit', $row->id) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('content_plan.destroy', $row->id) }}"
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
                    <td colspan="10" class="text-center">
                        Data belum tersedia
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>



@endsection
