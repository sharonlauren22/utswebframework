<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($flight_id)
    {
        $flight = Flight::find($flight_id);

        return view('form_pemesanan', ['flight' => $flight]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestFillable = $request->only(['flight_id', 'passenger_name', 'passenger_phone', 'seat_number']);
        $rules = [
            'flight_id' => 'required',
            'passenger_name' => 'required',
            'passenger_phone' => 'required',
            'seat_number' => 'required|max:3',
        ];
        $messages = [
            'passenger_name.required' => 'Name is required',
            'passenger_phone.required' => 'Phone is required',
            'seat_number.required' => 'Seat number is required',
            'seat_number.max' => 'Seat number must not exceed 3 characters',
        ];
        $valid = Validator::make($requestFillable, $rules, $messages);
        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first())->withInput();
        }
        $flight = Flight::find($requestFillable['flight_id']);

        if (!$flight) {
            return redirect()->back()->with('error', 'Flight not found');
        }
        $flight = Ticket::create([
            'flight_id' => $flight->id,
            'passenger_name' => $requestFillable['passenger_name'],
            'passenger_phone' => $requestFillable['passenger_phone'],
            'seat_number' => $requestFillable['seat_number'],
            'is_boarding' => false,
        ]);

        return redirect()->back()->with('success', "Ticket successfully booked");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ticket_id)
    {
        $requestFillable = $request->only(['ticket_id']);

        $rules = [
            'ticket_id' => 'required',
        ];
        $messages = [
            'ticket_id.required' => 'Name is required',
        ];
        $valid = Validator::make($requestFillable, $rules, $messages);
        if ($valid->fails()) {
            return redirect()->back()->with('error', $valid->errors()->first())->withInput();
        }

        $ticket = Ticket::find($ticket_id);

        $ticket->update([
            'is_boarding' => true,
            'boarding_time' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'success boarding');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ticket_id)
    {
        $ticket = Ticket::find($ticket_id)->delete();

        return redirect()->back()->with('success', 'ticket deleted');
    }
}
