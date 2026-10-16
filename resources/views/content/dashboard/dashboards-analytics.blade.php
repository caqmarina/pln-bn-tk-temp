@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row align-items-stretch">

        {{-- KARTU ULTah EMPLOYEE --}}
        <div class="col-12 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ultah Employee</h5>

                    <span class="badge bg-label-primary">
                        Bulan {{ \Carbon\Carbon::now()->translatedFormat('F') }}
                    </span>
                </div>

                <div class="card-body">
                    @forelse ($upcomingBirthdays as $employee)
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar me-3">
                                <span class="avatar-initial rounded-circle bg-label-primary">
                                    {{ strtoupper(substr($employee->nama, 0, 1)) }}
                                </span>
                            </div>

                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $employee->nama }}</h6>

                                <small class="text-body-secondary">
                                    {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d/m') }}
                                </small>
                            </div>
                        </div>
                    @empty
                        <p class="mb-0 text-body-secondary">
                            Tidak ada ulang tahun yang tersisa pada bulan ini.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- KARTU RINGKASAN SOUVENIR --}}
        <div class="col-12 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">Ringkasan Souvenir</h5>
                </div>

                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-body-secondary">Jenis Souvenir</span>
                        <h4 class="mb-0">{{ $totalJenisSouvenir }}</h4>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-body-secondary">Total Stok Tersisa</span>
                        <h4 class="mb-0 text-primary">{{ $totalStokSouvenir }}</h4>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-body-secondary">Jenis Stok Habis</span>
                        <h4 class="mb-0 text-danger">{{ $totalSouvenirHabis }}</h4>
                    </div>

                    <div class="mt-auto">
                        <hr>

                        <a href="{{ route('list_souvenir.index') }}"
                           class="btn btn-outline-primary w-100">
                            Lihat Daftar Souvenir
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- KARTU RINGKASAN CONTENT PLAN --}}
        <div class="col-12 col-lg-4 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ringkasan Content Plan</h5>

                    <span class="badge bg-label-primary">
                        {{ $totalContentPlan }} Konten
                    </span>
                </div>

                <div class="card-body d-flex flex-column">
                    {{-- RINGKASAN STATUS --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-body-secondary">Draft</span>
                        <h4 class="mb-0">{{ $totalDraft }}</h4>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-body-secondary">Review</span>
                        <h4 class="mb-0 text-warning">{{ $totalReview }}</h4>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-body-secondary">Approved</span>
                        <h4 class="mb-0 text-info">{{ $totalApproved }}</h4>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-body-secondary">Published</span>
                        <h4 class="mb-0 text-success">{{ $totalPublished }}</h4>
                    </div>

                    <hr>

                    {{-- DAFTAR KONTEN TERBARU --}}
                    <h6 class="mb-3">Konten Terbaru</h6>

                    @forelse ($contentPlanTerbaru as $konten)
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start gap-2">
                                <div class="flex-grow-1">
                                    <p class="mb-1 fw-medium">
                                        {{ $konten->judul_konten }}
                                    </p>

                                    <small class="text-body-secondary">
                                        {{ \Carbon\Carbon::parse($konten->tanggal_upload)->format('d/m/Y') }}
                                    </small>
                                </div>

                                <span class="badge
                                    @if ($konten->status === 'Draft') bg-label-secondary
                                    @elseif ($konten->status === 'Review') bg-label-warning
                                    @elseif ($konten->status === 'Approved') bg-label-success
                                    @elseif ($konten->status === 'Published') bg-label-primary
                                    @else bg-label-secondary
                                    @endif">
                                    {{ $konten->status }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-body-secondary mb-3">
                            Belum ada Content Plan.
                        </p>
                    @endforelse

                    {{-- TOMBOL MENU CONTENT PLAN --}}
                    <div class="mt-auto">
                        <hr>

                        <a href="{{ route('content_plan.index') }}"
                           class="btn btn-outline-primary w-100">
                            Lihat Content Plan
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection