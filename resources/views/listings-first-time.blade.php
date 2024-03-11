<h3>this i sthe heading <?=$heading ?></h3>
{{-- <?php foreach($listings as $listing): ?>
<h1><?=$heading . $listing['id'] ?></h1>
<p><?=$heading . $listing['title'] ?></p>
<blockquote><?=$heading . $listing['description'] ?></blockquote>

{{-- <?php endforeach; ?> --}} {{--this is the normal syntax which is not good you can use blade syntax which i am using it below --}}


@if(count($listings) == 0)
    <i>no listings found</i>
@endif

@foreach($listings as $listing)
<h3>{{$heading}}</h3>
<h1>{{ $listing['id']}}</h1>
<p>{{$listing['title'] }}</p>
<blockquote>{{ $listing['description'] }}</blockquote>

@endforeach

@php
    $sarsam = "sarzmbiz";
@endphp

<blockquote>{{$sarsam}}</blockquote>