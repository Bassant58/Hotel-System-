<table class="table">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mangers as $manger)

        <tr>
            <th scope="row">{{$manger->id}}</th>
            <td colspan="2">{{$manger->name}}</td>
            <td colspan="2">{{$manger->email}}</td>
            <td>
                <a href="{{ url('/edit-manager', ['id'=>$manger->id]) }}" class='btn btn-success'>Edit</a>
                <a href="{{ url('/show-manager', ['id'=>$manger->id]) }}" class='btn btn-secondary'>Show</a>
                <a href="{{ url('/del-manager', ['id'=>$manger->id]) }}" class='btn btn-danger'>delete</a>
            </td>
        </tr>
        @endforeach

    </tbody>

</table>
<div class="container">
    <div class="row">
        <div class="col-2">
            <a href='/add-manager' class='btn btn-success'>Add New Manger</a>
        </div>
    </div>
</div>