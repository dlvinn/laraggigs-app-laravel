@extends('layout')
@section('content')

@include('partials._hero')
@include('partials._search')
<div
                class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
            >



@if(count($listings) == 0)
    <i>no listings found</i>
@endif

@foreach($listings as $listing)
<x-card>
    <x-listing-card :listing="$listing" />
</x-card>
@endforeach
</div>
<div class="mt-6 p-4 center mx-auto dark:bg-secondary">
    {{$listings->links()}}
</div>
@php
    $sarsam = "sarzmbiz";
@endphp

<blockquote>{{$sarsam}}</blockquote>
@endsection
