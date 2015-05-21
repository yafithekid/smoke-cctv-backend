@extends('app')
@section('content')
<div class='container'>

    <div class='col-md-12' style='padding:30px;'>
    <div class='col-md-6'>
        <img src='{{asset($photo->url)}}' width='300px' height='300px'>
    </div>
    <div class='col-md-6'>
        <h3>Diambil: <?= date('d F Y H:i:s',strtotime($photo->created_at)) ?></h3>
        <div style='padding-top:20px;'>
            <a class='btn btn-danger' href='{{route('photo.delete',['id'=>$photo->id])}}' onclick='return confirm("Are you sure?")'>Delete</a>
        </div>
    </div>
    </div>
</div>
@endsection