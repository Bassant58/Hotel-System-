 @extends('_layouts.master')

 @section('content')
 <div class="container">
     <div class="row">
     <table class="table table-bordered yajra-datatable" id="user">
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Floor_Code</th>
                 <th>Manager_Id</th>
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
            <a href='/add-floor' class='btn btn-success'>Add New Floor</a>
        </div>
    </div>
</div>
 @endsection
 @section('custom-scripts')
 <script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#user').DataTable({
        ajax: '{{route('FloorData')}}',
        "order": [
            [0, "desc"]
        ],

        columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'floor_code',
                name: 'floor_code'
            },
            {
                data: 'manager_id',
                name: 'manager_id',
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