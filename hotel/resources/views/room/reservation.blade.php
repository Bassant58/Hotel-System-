<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container">
      <a class="navbar-brand text-primary" href="#">Categories</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      </div>
    </div>
  </nav>


  <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-8 border">
            <form action=" {{route('room.check' , [ 'roomId'=>$room->id])}} " method="post">
                @csrf
                <div class="row mt-5">
                    <div class="col-6 mb-3">
                        <input type="text" class="form-control" placeholder=" Enter your accompany number" name='capacity'>
                        @error('capacity')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @if (session('matched'))
                    <div class="alert alert-success col-5">
                        {{ session('matched') }}
                     </div>
                    @elseif(session('matched'))
                    <div class="alert alert-danger col-5">
                        {{ session('not match') }}
                     </div>
                    @endif

                    {{-- @isset(session('matched'))
   .                    <div class="alert alert-success col-5">
                        {{ session('status') }}
                            </div>
                  @endisset --}}

                    <div class="col-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-block mb-3 ms-2 mt-4" name="check" value="">Check Room</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
  


  


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"></script>
</body>
</html>