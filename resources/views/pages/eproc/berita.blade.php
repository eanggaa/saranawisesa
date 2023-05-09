<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saranawisesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('eproc/berita.css') }}">
  </head>
  <body>

    @include('templates.eproc.header')

    <br><br><br>

    <div class="container" id="atas">
      <div class="header">
       <p class="fs-4"><span class="fw-bold">BERITA</span> SEPUTAR PENGADAAN</p>
       <div class="row text-white" id="header__content">
           <div class="col-md-7">
               <h1>Lorem ipsum dolor sit amet consectetur.</h1>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt at eum quas unde reprehenderit illum officia vitae saepe architecto nemo!</p>
           </div>
           <div class="col-md-5">
               <img src="{{ asset('eproc/img/Subtract.png') }}" alt="">
               <img class="bola-icon" src="{{ asset('eproc/img/bola.png') }}" alt="">
           </div>
       </div>
      </div>
   </div>

   <div class="container">
       <div class="header-2">
           <p style=" color: #0458B8;" class="fs-4">LIST <span class="fw-bold">BERITA</span></p>
       </div>
       <div class="row" id="main-content">
           @foreach ($berita as $beritas)
            <div class="col-md-4 parent__content">
              <div class="content">
                  <div class="c__image">
                      <img src="{{ asset('berita/'.$beritas['thumbnail']) }}" alt="">
                  </div>
                  <div class="c__desc">
                      <p>{{ \Carbon\Carbon::parse($beritas->tanggal_publikasi)->format('l, d M Y') }}</p>
                      <p>{!! Str::limit($beritas->isi_berita, 25) !!}</p>
                      <a href="">Selengkapnya</a>
                  </div>
              </div>
            </div>
           @endforeach
       </div>
   </div>

    @include('templates.eproc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>