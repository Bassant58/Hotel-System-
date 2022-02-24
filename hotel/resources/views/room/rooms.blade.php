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
  
  <div class="container px-5 py-5" >
      <div class = "d-flex flex-wrap  justify-content-evenly">
            @foreach ($room as  $rooms)
        <div class="card w-25 mx-3 my-3">
            <div class="card-body ">
                <h5 class="card-header pb-3 bg-transparent border-dark "> {{$rooms->status}} </h5>
                <p>
                 capacity:   {{$rooms->capacity}}
                </p>
                <p>
                 price:   {{$rooms->price}} $
                </p>
                <div class="card-footer bg-transparent border-dark "><a href="  {{route('room.oneRoom' , [ 'roomId'=>$rooms->id])}}" class="btn btn-dark btn-block mb-3 ms-2 mt-4 ">Make Reservation</a></div>
            </div>
        </div>
        @endforeach
        </div>
    </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>
      </body>
      </html>