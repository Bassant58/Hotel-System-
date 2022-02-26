 @extends('_layouts.master')

 @section('content')
 @if(session()->has('message'))
    <script>
       alert("Sorry we can't delete this Room ,there is a Reservation related to this Room!")
    </script>
@endif
 <div class="container">
     <div class="row">
     <table class="table table-bordered yajra-datatable" id="user">
         <thead>
             <tr>
                <th>Room Code</th>
                <th>Capacity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Floor_id</th>
                <th>Floor Name</th>
                <th>Action</th>
             </tr>
         </thead>
         <tbody>
         </tbody>
     </table>
     </div>
 </div>
 <div class="container">
    <div class="row">
        <div class="col-2">
            <a href='/add-room' class='btn btn-success'>Add New Room</a>
        </div>
    </div>
</div>
 @endsection
 @section('custom-scripts')
 <script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#user').DataTable({
        ajax: '{{route('RoomData')}}',
        "order": [
            [0, "desc"]
        ],

        columns: [
            {
                data: 'room_code',
                name: 'room_code'
            },
            {
                data: 'capacity',
                name: 'capacity'
            },
            {
                data: 'price',
                name: 'price' 
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'floor_id',
                name: 'floor_id'
            },
            {
                data: 'floor_name',
                name: 'floor_name->name'
            },
            {
                data:'action',
                name:'action',

                sClass: 'text-center'
            },
        ]
    });
})
 </script>
 @endsection
