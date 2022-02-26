@extends('_layouts.master')

@section('content')
<div class="container">
    <div class="row">
    <table class="table table-bordered yajra-datatable" id="user">
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Gender</th>
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
       ajax: '{{route('ClientData')}}',
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
               data: 'country',
               name: 'country'
           },
           {
               data: 'gender',
               name: 'gender'
           },
       ]
   });
})
</script>
@endsection