<?php

use App\Exports\ProposalsExport;
use App\Http\Controllers\ProposalController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/usulan/{paginate?}', [ProposalController::class, 'index'])->name('proposals');
    Route::get('/download/proposals', function () {
        return Excel::download(new ProposalsExport, 'proposals.xlsx');
    })->name('download.proposals');

    Route::resource('/usulan', ProposalController::class)->except(['index'])->parameters([
        'usulan' => 'proposal'
    ]);
});

require __DIR__ . '/auth.php';
