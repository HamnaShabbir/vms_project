@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2 class="text-success">Visitor Approved!</h2>
    <p>The visitor <strong>{{ $visitor->name }}</strong> has been approved successfully.</p>
    <a href="{{ route('visitors.index') }}" class="btn btn-primary">Back to Visitors</a>
</div>
@endsection
