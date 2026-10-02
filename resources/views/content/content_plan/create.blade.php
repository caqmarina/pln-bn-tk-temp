@extends('layouts/contentNavbarLayout')

@section('title', 'Create Content Plan')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Create Content Plan</h4>
        </div>

        <div class="card-body">

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>Data belum dapat disimpan:</strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- FORM --}}
            <form action="{{ route('content_plan.store') }}"
                method="POST">

                @csrf


                {{-- TANGGAL UPLOAD --}}
                <div class="mb-3">

                    <label for="tanggal_upload"
                        class="form-label">

                        Tanggal Upload

                    </label>

                    <input type="date"
                        name="tanggal_upload"
                        id="tanggal_upload"
                        class="form-control"
                        value="{{ old('tanggal_upload') }}">

                </div>


                {{-- TIME UPLOAD --}}
                <div class="mb-3">

                    <label for="time_upload"
                        class="form-label">

                        Time Upload

                    </label>

                    <input type="time"
                        name="time_upload"
                        id="time_upload"
                        class="form-control"
                        value="{{ old('time_upload') }}">

                </div>


                {{-- JENIS KONTEN --}}
                <div class="mb-3">

                    <label for="jenis_konten"
                        class="form-label">

                        Jenis Konten

                    </label>

                    <select name="jenis_konten"
                        id="jenis_konten"
                        class="form-control">

                        <option value="Single"
                            {{ old('jenis_konten') == 'Single' ? 'selected' : '' }}>

                            Single

                        </option>

                        <option value="Carousel"
                            {{ old('jenis_konten') == 'Carousel' ? 'selected' : '' }}>

                            Carousel

                        </option>

                    </select>

                </div>


                {{-- JUDUL KONTEN --}}
                <div class="mb-3">

                    <label for="judul_konten"
                        class="form-label">

                        Judul Konten

                    </label>

                    <input type="text"
                        name="judul_konten"
                        id="judul_konten"
                        class="form-control"
                        value="{{ old('judul_konten') }}">

                </div>


                {{-- BRIEF --}}
                <div class="mb-3">

                    <label for="brief"
                        class="form-label">

                        Brief

                    </label>

                    <input type="text"
                        name="brief"
                        id="brief"
                        class="form-control"
                        value="{{ old('brief') }}">

                </div>


                {{-- LINK DRAFT --}}
                <div class="mb-3">

                    <label for="link_draft"
                        class="form-label">

                        Link Draft

                    </label>

                    <input type="text"
                        name="link_draft"
                        id="link_draft"
                        class="form-control"
                        value="{{ old('link_draft') }}">

                </div>


                {{-- CAPTION --}}
                <div class="mb-3">

                    <label for="caption"
                        class="form-label">

                        Caption

                    </label>

                    <textarea name="caption"
                        id="caption"
                        class="form-control">{{ old('caption') }}</textarea>

                </div>


                {{-- FEEDBACK --}}
                <div class="mb-3">

                    <label for="feedback"
                        class="form-label">

                        Feedback

                    </label>

                    <textarea name="feedback"
                        id="feedback"
                        class="form-control">{{ old('feedback') }}</textarea>

                </div>


                {{-- STATUS --}}
                <div class="mb-3">

                    <label for="status"
                        class="form-label">

                        Status

                    </label>

                    <select name="status"
                        id="status"
                        class="form-control">

                        <option value="Draft"
                            {{ old('status') == 'Draft' ? 'selected' : '' }}>

                            Draft

                        </option>

                        <option value="Review"
                            {{ old('status') == 'Review' ? 'selected' : '' }}>

                            Review

                        </option>

                        <option value="Approved"
                            {{ old('status') == 'Approved' ? 'selected' : '' }}>

                            Approved

                        </option>

                        <option value="Published"
                            {{ old('status') == 'Published' ? 'selected' : '' }}>

                            Published

                        </option>

                    </select>

                </div>


                {{-- TOMBOL SAVE --}}
                <button type="submit"
                    class="btn btn-primary">

                    Save

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
