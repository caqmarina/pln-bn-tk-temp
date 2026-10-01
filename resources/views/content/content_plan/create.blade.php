@extends('layouts/contentNavbarLayout')

@section('title', 'Create Content Plan')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4>Create Content Plan</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('content_plan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Tanggal Upload</label>
                    <input type="date"
                        name="tanggal_upload"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Time Upload</label>
                    <input type="time"
                        name="time_upload"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Jenis Konten</label>

                    <select name="jenis_konten" class="form-control">
                        <option value="Single">Single</option>
                        <option value="Carausel">Carausel</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Judul Konten</label>
                    <input type="text"
                        name="judul_konten"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Link Draft</label>
                    <input type="text"
                        name="link_draft"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Caption</label>
                    <textarea name="caption"
                        class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Feedback</label>
                    <textarea name="feedback"
                        class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status" class="form-control">
                        <option value="Draft">Draft</option>
                        <option value="Review">Review</option>
                        <option value="Approved">Approved</option>
                        <option value="Published">Published</option>
                    </select>
                </div>

                <button type="submit"
                    class="btn btn-primary">
                    Save
                </button>

            </form>

        </div>

    </div>

</div>

@endsection