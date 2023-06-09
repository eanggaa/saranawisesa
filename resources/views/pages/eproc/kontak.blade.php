<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saranawisesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('eproc/kontak.css') }}">
  </head>
  <body>

    @include('templates.eproc.header')

    <br><br><br>

    <div class="container mt-5">
      <div class="header">
          <h1 style=" color: #830000;" class="fs-3">HUBUNGI KAMI</h1>
          <img class="mt-3 img-fluid" src="{{ asset('eproc/img/call.png') }}" alt="">
      </div>
    </div>

  <div class="container mt-5" id="middle">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-md-6"><i class="fa-solid fa-location-dot"></i></div>
            <div class="col-md-6">
              <h4>LOCATION</h4>
            </div>
          </div>
        </div>
      </div>
  </div>

    @include('templates.eproc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>