@extends('template')

@section('content')
<div class="grid grid-cols-3 gap-5 p-12">
    <!-- @dd($flights) -->
    @foreach($flights as $flight)

    <div class="flex flex-col justify-center items-start p-5 rounded-lg bg-gray-300 shadow-md">
        <div class="flex w-full justify-between">
            <p>{{ $flights['flight_code'] }}</p>
            <p>{{ $flights['origin']. '->' . $flights['destination'] }}</p>
        </div>

        <p>Departure</p>
        <p><i>{{ $flights['departure_time'] }}</i></p>

        <p>Arrived</p>
        <p><i>{{ $flights['arrival_time'] }}</i></p>

        <div class="flex w-full justify-between">
            <a href="{{route('book_ticket', $flight['id']) }}">
                <button class="font-bold bg-gray-400 px-5 py-4 rounded-md">Book Ticket</button>
            </a>
            <a href="{{route('detail_flight', $flight['id']) }}">
                <button class="font-bold bg-gray-400 px-5 py-4 rounded-md">View Details</button>
            </a>
        </div>
    </div>
    @endforeach
</div>

@endsection