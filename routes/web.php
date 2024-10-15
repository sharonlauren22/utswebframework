<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

Route::get('/flights', [FlightController::class, 'index'])->name('flights');
Route::get('/flights/ticket/{flight_id}', [FlightController::class, 'show'])->name('detail_flight');

Route::get('/flights/book/{flight_id}', [TicketController::class, 'create'])->name('book_ticket');

Route::post('/ticket/submit', [TicketController::class, 'store'])->name('pesan');

Route::put('/ticlet/board/{ticket_id}', [TicketController::class, 'update'])->name('board');

Route::delete('/ticket/cancel/{ticket_id}', [TicketController::class, 'destroy'])->name('delete');
