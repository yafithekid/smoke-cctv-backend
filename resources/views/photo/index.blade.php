@extends('app')
@section('content')
<div class='container'>
    @foreach($photos as $photo)

    <div class='col-md-12' style='padding:30px;'>
    <div class='col-md-6'>
        <img src='{{asset($photo->url)}}' width='300px' height='300px'>
    </div>
    <div class='col-md-6'>
        <div
          class="fb-like"
          data-share="true"
          data-width="450"
          data-show-faces="true">
        </div>
        <h3>Diambil: <?= date('d F Y H:i:s',strtotime($photo->created_at)) ?></h3>
        <div class="fb-share-button" data-href="{{route('photo.read',['id'=>$photo->id])}}" data-layout="button_count"></div>
        <div style='padding-top:20px;'>
            <a class='btn btn-success' href='{{route('photo.read',['id'=>$photo->id])}}'>Lihat</a>
            <a class='btn btn-danger' href='{{route('photo.delete',['id'=>$photo->id])}}' onclick='return confirm("Anda yakin?")'>Hapus</a>
        </div>
    </div>
    </div>
    @endforeach

    <?= $photos->render(); ?>
</div>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '447528335406668',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

@endsection