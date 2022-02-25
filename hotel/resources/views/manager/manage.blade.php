 @extends('_layouts.master')

 @section('content')
 <div class="container">
     <div class="row">
     <table class="table table-bordered yajra-datatable" id="user">
         <thead>
             <tr>
                 <th>Email</th>
                 <th>Username</th>
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
        ajax: '{{route('ManagerData')}}',
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
                data: 'action',
                name: 'action',

                sClass: 'text-center'
            },
        ]
    });
})
 </script>
 @endsection