@extends('layouts.master')

@section('main_content')
<br><br>
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-lg rounded-2xl p-8 text-center">
        <br>
        <h2 class="text-2xl font-bold text-green-600 mb-6">Visitor Checked In!</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
            <div>
                <p class="text-gray-600"><strong>Name:</strong> {{ $visitor->name }}</p>
                <p class="text-gray-600"><strong>Company:</strong> {{ $visitor->company_name }}</p>
                <p class="text-gray-600"><strong>Host:</strong> {{ optional($visitor->host)->name }}</p>
            </div>

            <div>
                <!-- <p class="text-gray-600"><strong>Arrival Time:</strong> {{ $visitor->time_of_arrival }}</p> -->
                <p class="text-gray-600"><strong>Clock-In Time:</strong> {{ $visitor->time_of_arrival }}</p>
                <br>
            </div>
        </div>

        <!--  -->
    </div>
</div>
@endsection