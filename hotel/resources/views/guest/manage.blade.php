@extends('_layouts.master')

@section('content')
<div class="container">
    <div class="row">
    <table class="table table-bordered yajra-datatable" id="user">
        <thead>
            <tr>
                <th>Username</th>
                <th>status</th>
                <th>Receptionist Id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
</div>
@endsection
@section('custom-scripts')
<script type="text/javascript">
$(document).ready(function() {
   var dataTable = $('#user').DataTable({
       ajax: '{{route('UserData')}}',
       "order": [
           [0, "desc"]
       ],

       columns: [{
               data: 'name',
               name: 'name'
           },
           {
               data: 'status',
               name: 'status'
           },
           {
               data: 'receptionist_id',
               name: 'receptionist_id',

           },
           {
               data: 'action',
               name: 'action',

               sClass: 'text-center'
           },
       ]
   });
})
</script>
@endsection
