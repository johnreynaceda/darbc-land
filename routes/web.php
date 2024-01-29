<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\BasicInformation;
use App\Models\Attachment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/masterlist', function () {
    return view('admin.masterlist');
})
    ->middleware(['auth', 'verified'])
    ->name('masterlist');

Route::get('/masterlist-information/{record}', function ($record) {
    $masterlistData = BasicInformation::findOrFail($record);
    return view('masterlist-data', ['record' => $masterlistData]);
})
    ->middleware(['auth', 'verified'])
    ->name('masterlist-data');

Route::get('/view-attachments/{record}', function ($record) {
    $attachment = BasicInformation::findOrFail($record);
    $record = request()->query('record');
    $type = request()->query('type');

    return view('forms.view-attachments', [
        'record' => $attachment,
        'type' => $type,
    ]);
})
    ->middleware(['auth', 'verified'])
    ->name('view-attachments');

Route::get('/view-other-attachments/{record}', function ($record) {
    $attachment = BasicInformation::findOrFail($record);
    $record = request()->query('record');

    return view('forms.view-other-attachments', [
        'record' => $attachment,
    ]);
})
    ->middleware(['auth', 'verified'])
    ->name('view-other-attachments');

Route::get('/inquiry', function () {
    return view('admin.inquiry');
})
    ->middleware(['auth', 'verified'])
    ->name('inquiry');

Route::get('/inquiry/print-preview', function () {
    return view('admin.print-preview');
})
    ->middleware(['auth', 'verified'])
    ->name('print-preview');

Route::get('/upload', function () {
    return view('admin.upload');
})
    ->middleware(['auth', 'verified'])
    ->name('upload');

Route::get('/calendar', function () {
    return view('admin.calendar');
})
    ->middleware(['auth', 'verified'])
    ->name('calendar');

Route::get('/reports', function () {
    return view('admin.report');
})
    ->middleware(['auth', 'verified'])
    ->name('report');

Route::get('/settings', function () {
    return view('settings');
})
    ->middleware(['auth', 'verified'])
    ->name('settings');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

require __DIR__ . '/auth.php';
