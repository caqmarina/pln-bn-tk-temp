@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Content Plan')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Edit Content Plan</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <strong>Data belum dapat diperbarui:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('content_plan.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Tanggal Upload</label>

                    <input
                        type="date"
                        name="tanggal_upload"
                        class="form-control"
                        value="{{ $data->tanggal_upload }}"
                    >
                </div>

                <div class="mb-3">
                    <label>Time Upload</label>

                    <input
                        type="time"
                        name="time_upload"
                        class="form-control"
                        value="{{ $data->time_upload }}"
                    >
                </div>

                <div class="mb-3">
                    <label>Jenis Konten</label>

                    <select name="jenis_konten" class="form-control">

                        <option value="Single"
                            {{ $data->jenis_konten == 'Single' ? 'selected' : '' }}>
                            Single
                        </option>

                        <option value="Carousel"
                            {{ $data->jenis_konten == 'Carousel' ? 'selected' : '' }}>
                            Carousel
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label>Judul Konten</label>

                    <input
                        type="text"
                        name="judul_konten"
                        class="form-control"
                        value="{{ $data->judul_konten }}"
                    >
                </div>

                <div class="mb-3">
                    <label>Brief</label>

                    <input
                        type="text"
                        name="brief"
                        class="form-control"
                        value="{{ old('brief', $data->brief) }}"
                    >
                </div>

                <div class="mb-3">
                    <label>Link Draft</label>

                    <input
                        type="text"
                        name="link_draft"
                        class="form-control"
                        value="{{ $data->link_draft }}"
                    >
                </div>

                <div class="mb-3">
                    <label>Caption</label>

                    <textarea
                        name="caption"
                        class="form-control"
                    >{{ $data->caption }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Feedback</label>

                    <textarea
                        name="feedback"
                        class="form-control"
                    >{{ $data->feedback }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="Draft"
                            {{ $data->status == 'Draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="Review"
                            {{ $data->status == 'Review' ? 'selected' : '' }}>
                            Review
                        </option>

                        <option value="Approved"
                            {{ $data->status == 'Approved' ? 'selected' : '' }}>
                            Approved
                        </option>

                        <option value="Published"
                            {{ $data->status == 'Published' ? 'selected' : '' }}>
                            Published
                        </option>

                    </select>
                </div>

                <button type="submit"
                    class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('content_plan.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
