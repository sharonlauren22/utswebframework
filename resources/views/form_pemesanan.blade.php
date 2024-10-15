@extends('template')

@section('content')
    <div class="p-12">
        <div class="flex justify-between">
            <h1 class="font-bold text-3xl">Ticket Booking for</h1>
            <h1 class="font-bold text-3xl">{{$flight->flight_code}}</h1>

        </div>

        <hr>

        <div class="flex justify-between">
            <p>{{$flight->origin . '->' . $flight->destination}}</p>
            <div class="flex gap-3">
                <p>Departure</p>
                <p>{{$flight->departure_time}}</p>
            </div>

            <div class="flex gap-3">
                <p>Arrived</p>
                <p>{{$flight->arrival_time}}</p>
            </div>
        </div>

        <form action="{{route('pesan')}}" method="POST">
            @csrf
            <input type="hidden" name="flight_id" value="{{$flight['id']}}">
            <div class="flex gap-3 mt-6 text-right">
                <label for="name" class="mr-4">Passenger Name</label>
                <input type="text" name="passenger_name" id="passenger_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/12 p-2.5">
            </div>
            <div class="flex gap-3 mt-3 text-right">
                <label for="phone">Passenger Phone</label>
                <input type="text" name="passenger_phone" id="passenger_phone"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/12 p-2.5">
            </div>
            <div class="flex gap-3 mt-3 text-right">
                <label for="text">Seat Number</label>
                <input type="text" name="seat_number" id="seat_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/12 p-2.5">
            </div>

            <div class="flex justify-end gap-5">
                <button type="button"
                    class="bg-gray-300 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md mt-5">Cancel</button>
                <button type="submit"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md mt-5">
                        Book Ticket</button>
            </div>
        </form>
    </div>
@endsection
