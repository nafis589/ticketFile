<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usager\ServiceController as UsagerServiceController;
use App\Http\Controllers\Usager\TicketController as UsagerTicketController;
use App\Http\Controllers\Agent\CounterController as AgentCounterController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\CounterController as AdminCounterController;
use App\Http\Controllers\Admin\StatsController as AdminStatsController;


Route::get('/', function () {
    $services = \App\Models\Service::where('is_active', true)->get();
    return view('welcome', compact('services'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'check_status', 'verified'])->name('dashboard');

Route::middleware(['auth', 'check_status'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Usager
Route::middleware([])->prefix('usager')->name('usager.')->group(function () {
    Route::get('/services', [UsagerServiceController::class, 'index'])->name('services.index');
    Route::post('/tickets', [UsagerTicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}', [UsagerTicketController::class, 'show'])->name('tickets.show');
});

// Agent
Route::middleware(['auth', 'check_status', 'role:agent'])->prefix('agent')->name('agent.')->group(function () {
    Route::get('/queue', [AgentCounterController::class, 'queue'])->name('queue');
    Route::patch('/counters/{counter}/call', [AgentCounterController::class, 'call'])->name('counters.call');
    Route::patch('/counters/{counter}/tickets/{ticket}/treat', [AgentCounterController::class, 'treat'])->name('counters.treat');
    Route::patch('/counters/{counter}/tickets/{ticket}/absent', [AgentCounterController::class, 'absent'])->name('counters.absent');
});

// Admin
Route::middleware(['auth', 'check_status', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users/pending', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.pending');
    Route::patch('/users/{user}/approve', [\App\Http\Controllers\Admin\UserController::class, 'approve'])->name('users.approve');
    
    Route::resource('services', AdminServiceController::class);
    Route::resource('counters', AdminCounterController::class);
    Route::patch('counters/{counter}/assign', [AdminCounterController::class, 'assignAgent'])->name('counters.assignAgent');
    Route::get('/dashboard', [AdminStatsController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
