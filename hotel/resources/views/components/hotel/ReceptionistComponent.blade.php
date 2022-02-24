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
        @foreach($receptionests as $receptionest)

        <tr>
            <th scope="row">{{$receptionest->id}}</th>
            <td colspan="2">{{$receptionest->name}}</td>
            <td colspan="2">{{$receptionest->email}}</td>
            <td>
                <a href="{{ url('/edit-receptionest', ['id'=>$receptionest->id]) }}" class='btn btn-success'>Edit</a>
                <a href="{{ url('/show-receptionest', ['id'=>$receptionest->id]) }}" class='btn btn-secondary'>Show</a>
                <a href="{{ url('/del-receptionest', ['id'=>$receptionest->id]) }}" class='btn btn-danger'>delete</a>
            </td>
        </tr>
        @endforeach

    </tbody>

</table>
<div class="container">
    <div class="row">
        <div class="col-2">
            <a href='/add-receptionest' class='btn btn-success'>Add New Receptionest</a>
        </div>
    </div>
</div>