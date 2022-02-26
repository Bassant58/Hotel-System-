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
      <a class="navbar-brand text-primary text-bold text-dark" href="#">Welcome {{auth()->user()->name}}</a>
      <a class="navbar-brand text-primary" href=" {{route('user.reservation' , [ 'user_id'=>auth()->user()->id])}} "> My Reservations</a>
          <form  method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-light border-0">
                <a class="nav-link">
                    <i class="fad fa-arrow-circle-right"></i>
                    <p class="d-inline">Logout</p>
                </a>
            </button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      </div>
    </div>
</nav>
  <div class="container">
    @if(session('message'))
  <div style="position: absolute;
    bottom: 24px;
    right: 35px;
    background-color: #c7dbd2;
    padding: 10px;
    border-radius: 20px;">Your Reservation Comoleted
    </div>
    @endif
    <div class="row">
      <div class="col-12">
      <table class="table table-success table-striped text-center">
        <thead>
          <tr>
            <th scope="col">Capacity</th>
            <th scope="col">Price</th>
            <th scope="col">Reserve</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($room as  $rooms)
          <tr>
            <th > capacity:   {{$rooms->capacity}}</th>
            <td >price:   {{$rooms->price}} $</td>
            <td>
              <a href="  {{route('room.oneRoom' , [ 'roomId'=>$rooms->id])}}"
              class="btn btn-dark ">Make Reservation
              </a>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>

<script>
 var alert=document.getElementById('alert')
     setTimeout(function(){
      alert.style.display = "none"
      },3000)
</script>
</body>
</html>
