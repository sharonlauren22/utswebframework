@extends('template')

@section('content')
    <div class="p-12">
        <div class="flex justify-between">
            <h1 class="font-bold text-3xl">{{ 'Ticket Details for '. $flight->code}} </h1>
            <h1 class="font-bold text-3xl">5 passengers • 3 boardings</h1>
        
        </div>
        
        <hr>
        
        <div class="flex justify-between">
            <p>{{$flight->origin . '->' . $flight->destination}}</p>
            <div class="flex gap-3">
                <p>Departure</p>
                <p>Tuesday, 15 October 2024, 13:00</p>
            </div>
            
            <div class="flex gap-3">
                <p>Arrived</p>
                <p>Tuesday, 15 October 2024, 16:00</p>
            </div>
        </div>

        <p class="font-bold text-3xl mt-12">Passengers List</p>

        <table class="w-full">
            <tr>
                <th>No</th>
                <th>Passenger Name</th>
                <th>Passenger Phone</th>
                <th>Seat Number</th>
                <th>Boarding</th>
                <th>Delete</th>
            </tr>

            @foreach($flight->tickets as $t)
            <tr>
                <td class="text-center">{{$loop->index}}</td>
                <td class="text-center">{{$t->passenger_name}}</td>
                <td class="text-center">{{$t->passenger_phone}}</td>
                <td class="text-center">{{$t->seat_number}}</td>

                @if ($t->is_boarding)
                    <td class="text-center">{{%t->boarding_time}}</td>
                @else
                <form action="{{route('board', $t->id)}}">

                    <td class="text-center"><button class="rounded-2xl bg-gray-500 font-bold px-5 py-1" type="submit">Confirm</button></td>
                </form>
                @endif

                @if ($t->is_boarding)
                    <td class="text-center"><button class="rounded-2xl bg-gray-500 font-bold px-5 py-1"> disabled>Delete</button></td>
                @else
                    <form action="{{route('delete', $t->id)}}">

                        <td class="text-center"><button class="rounded-2xl bg-gray-500 font-bold px-5 py-1">Delete</button></td>
                    </form>
                @endif
            </tr>
            @endforeach
        </table>

        <div class="flex justify-center">
            <a href="{{route('flights')}}"></a>
            <button class="rounded-2xl bg-gray-500 font-bold px-5 py-1 mt-10">Back</button>
        </div>
    </div>
@endsection