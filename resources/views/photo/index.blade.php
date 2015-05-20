@extends('app')
@section('content')

@foreach($photos as $photo)
<div>
    <img src='{{asset($photo->url)}}'>
    <div>
        Diambil: {{$photo->created_at}}
    </div>
</div>
@endforeach

@endsection