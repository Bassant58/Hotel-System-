<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Basic Card</h2>
  <div class="card">
    <div class="card-body">Basic card</div>
    
  </div>
</div>
<div class="container">
  <table>
    <tr>
 
    </tr>
  </table>
  <table class="table table-bordered yajra-datatable" id="user">
    <thead>
        <tr>
            <th>Email</th>
            <th>Username</th>
            <th>national_id</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    // init datatable.
    var dataTable = $('#user').DataTable({
      // processing: true,
      // serverSide: true,
      // autoWidth: false,
      // pageLength: 5,
      // scrollX: true,
      ajax: '{{route('room')}}',
      "order": [
        [0, "desc"]
      ],
      
      columns: [
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'email',
          name: 'email'
        },
        {
          data: 'national_id',
          name: 'national_id'
        },
        {
          data: 'action',
          name: 'action',
          // orderable: false,
          // serachable: false,
          sClass: 'text-center'
        },
      ]
    });})
</script>
</body>
</html>