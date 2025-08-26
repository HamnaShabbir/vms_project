@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2 class="text-danger">Oopss Visit Cancelled!</h2>
    <p>The visitor <strong>{{ $visitor->name }}</strong> has been cancelled.</p>
    <a href="{{ route('visitors.index') }}" class="btn btn-primary">Back to Visitors</a>
</div>
@endsection
