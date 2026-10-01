@extends('layouts/contentNavbarLayout')

@section('title', 'Content Plan')

@section('content')

<div class="card">

    {{-- HEADER --}}
    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">Content Plan</h5>

        <a href="{{ route('content_plan.create') }}"
            class="btn btn-primary">
            Tambah Content Plan
        </a>

    </div>


    {{-- FILTER --}}
    <div class="card-body border-top">

        @if ($errors->any())
            <div class="alert alert-danger">

             <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

        </ul>

    </div>
@endif

<form action="{{ route('content_plan.index') }}"
    method="GET"
    class="row g-3 align-items-end">

            {{-- FILTER STATUS --}}
            <div class="col-md-4">

                <label for="status" class="form-label">
                    Status
                </label>

                <select name="status"
                    id="status"
                    class="form-select">

                    <option value="">
                        Semua Status
                    </option>

                    <option value="Draft"
                        {{ request('status') == 'Draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                    <option value="Review"
                        {{ request('status') == 'Review' ? 'selected' : '' }}>
                        Review
                    </option>

                    <option value="Approved"
                        {{ request('status') == 'Approved' ? 'selected' : '' }}>
                        Approved
                    </option>

                    <option value="Published"
                        {{ request('status') == 'Published' ? 'selected' : '' }}>
                        Published
                    </option>

                </select>

            </div>

        <div class="col-md-4">

            <label for="tanggal_mulai" class="form-label">
                Tanggal Mulai
            </label>

            <input type="date"
              name="tanggal_mulai"
              id="tanggal_mulai"
              class="form-control"
              value="{{ request('tanggal_mulai') }}">

</div>

<div class="col-md-4">

    <label for="tanggal_selesai" class="form-label">
        Tanggal Selesai
    </label>

    <input type="date"
        name="tanggal_selesai"
        id="tanggal_selesai"
        class="form-control"
        value="{{ request('tanggal_selesai') }}">

</div>


            {{-- FILTER JENIS KONTEN --}}
            <div class="col-md-4">

                <label for="jenis_konten" class="form-label">
                    Jenis Konten
                </label>

                <select name="jenis_konten"
                    id="jenis_konten"
                    class="form-select">

                    <option value="">
                        Semua Jenis Konten
                    </option>

                    <option value="Single"
                        {{ request('jenis_konten') == 'Single' ? 'selected' : '' }}>
                        Single
                    </option>

                    <option value="Carousel"
                        {{ request('jenis_konten') == 'Carousel' ? 'selected' : '' }}>
                        Carousel
                    </option>

                </select>

            </div>

            {{-- FILTER JUDUL KONTEN --}}
            <div class="col-md-4">

                <label for="judul_konten" class="form-label">
                    Cari Judul Konten
                </label>

                 <input type="text"
                    name="judul_konten"
                    id="judul_konten"
                    class="form-control"
                    placeholder="Masukkan judul konten"
                    value="{{ request('judul_konten') }}">

            </div>


            {{-- BUTTON --}}
            <div class="col-md-auto">

                <button type="submit"
                    class="btn btn-primary">
                    Filter
                </button>

                <a href="{{ route('content_plan.index') }}"
                    class="btn btn-secondary">
                    Reset
                </a>

            </div>

        </form>

    </div>


    {{-- TABLE --}}
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

                    <th width="180">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($data as $row)

                <tr>

                    {{-- TANGGAL --}}
                    <td>
                        {{ $row->tanggal_upload }}
                    </td>


                    {{-- JAM --}}
                    <td>
                        {{ $row->time_upload }}
                    </td>


                    {{-- JENIS KONTEN --}}
                    <td style="max-width:50px; white-space:normal;">

                        <span class="badge bg-label-info">
                            {{ $row->jenis_konten }}
                        </span>

                    </td>


                    {{-- JUDUL --}}
                    <td style="max-width:250px; white-space:normal;">

                        {{ $row->judul_konten }}

                    </td>


                    {{-- LINK DRAFT --}}
                    <td>

                        <a href="{{ $row->link_draft }}"
                            target="_blank"
                            class="btn btn-sm btn-outline-primary">

                            Open Draft

                        </a>

                    </td>


                    {{-- CAPTION --}}
                    <td style="width:500px; white-space:normal;">

                        {{ $row->caption }}

                    </td>


                    {{-- FEEDBACK --}}
                    <td style="max-width:25px; white-space:normal;">

                        {{ $row->feedback }}

                    </td>


                    {{-- STATUS --}}
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


                    {{-- AKSI --}}
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

                    <td colspan="10"
                        class="text-center">

                        Data belum tersedia

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
