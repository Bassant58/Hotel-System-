@extends('_layouts.master')

@section('content')
<div class="container">
    <div class="row">
    <table class="table table-bordered yajra-datatable" id="user">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>status</th>
                <th>Created At</th>
                <th>Manager Id</th>
                <th>Manager Name</th>
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
            <a href='/add-receptionest' class='btn btn-success'>Add New Receptionest</a>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
<script type="text/javascript">
$(document).ready(function() {
   var dataTable = $('#user').DataTable({
       ajax: '{{route('ReceptionestData')}}',
       "order": [
           [0, "desc"]
       ],

       columns: [{
               data: 'name',
               name: 'name'
           },
           {
               data: 'email',
               name: 'email'
           },
           {
               data: 'Ban_unBan',
               name: 'Ban_unBan'
           },
           {
               data: 'created_at',
               name: 'created_at'
           },
           {
               data: 'manager_id',
               name: 'manager_id'
           },
           {
               data: 'manager_name',
               name: 'manager_name->name'
           },
           {
               data: 'action',
               name: 'action',

               Class: 'text-center'
           },
       ]
   });
})
</script>
@endsection
