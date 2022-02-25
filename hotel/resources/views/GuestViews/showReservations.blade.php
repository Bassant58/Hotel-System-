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
      <a class="navbar-brand text-primary" href="">Hello {{auth()->user()->name}}</a>
      <h4 class=" text-success pt-1 ps-3"> Your Reservatios </h4>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      </div>
    </div>
</nav>
  <div class="container">
    <div class="row">
      <div class="col-12">
      <table class="table table-success table-striped text-center">
        <thead>
          <tr>
            <th scope="col">Accomany Number</th>
            <th scope="col">Paid Price</th>
            <th scope="col">Room number</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $users)
            <tr>
                <td> {{$users->people}}</td>
                <td>{{$users->room->price}} $</td>
                <td>{{$users->room->room_code}}</td>
            </tr>
            @endforeach

        </tbody>
      </table>
      <div class=" text-center"><a href="{{route('room.all')}} " class="btn btn-danger btn-block mb-3 ms-2 mt-4 ">Go Back</a></div>
      </div>
    </div>
  </div>
  

</body>
</html>