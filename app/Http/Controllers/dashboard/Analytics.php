<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ListSouvenirModel;
use App\Models\ContentPlanModel;
use App\Models\employeeModel;
use Carbon\Carbon;

class Analytics extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $totalJenisSouvenir = ListSouvenirModel::count();

        $totalStokSouvenir = (int) ListSouvenirModel::sum('sisa');

        $totalSouvenirHabis = ListSouvenirModel::where('sisa', '<=', 0)->count();

        $totalContentPlan = ContentPlanModel::count();

        $totalDraft = ContentPlanModel::where('status', 'Draft')->count();

        $totalReview = ContentPlanModel::where('status', 'Review')->count();

        $totalApproved = ContentPlanModel::where('status', 'Approved')->count();

        $totalPublished = ContentPlanModel::where('status', 'Published')->count();
        
        $contentPlanTerbaru = ContentPlanModel::orderByDesc('tanggal_upload')
            ->orderByDesc('time_upload')
            ->take(5)
            ->get();

        $upcomingBirthdays = employeeModel::whereNotNull('tanggal_lahir')

            ->get()
            ->filter(function ($employee) use ($today) {
                $birthday = Carbon::parse($employee->tanggal_lahir);

                return $birthday->month === $today->month
                    && $birthday->day >= $today->day;
            })
            ->sortBy(function ($employee) {
                $birthday = Carbon::parse($employee->tanggal_lahir);

                return $birthday->day;
            })
            ->values();

        return view(
    'content.dashboard.dashboards-analytics',
    compact(
        'upcomingBirthdays',
        'totalJenisSouvenir',
        'totalStokSouvenir',
        'totalSouvenirHabis',
        'totalContentPlan',
        'totalDraft',
        'totalReview',
        'totalApproved',
        'totalPublished',
        'contentPlanTerbaru',                 
    )
);

    }
}