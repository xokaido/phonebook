<html>
<head>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/fontawesome-all.css" rel="stylesheet">

 <script src="/js/jquery-3.3.1.min.js"></script>
 <script src="/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
<style>
table.dataTable tbody>tr.selected,
table.dataTable tbody>tr>.selected {
  background-color: #A2D3F6;
}

</style>  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"> </script>
<script type="text/javascript" language="javascript" src="/js/dataTables.responsive.min.js"> </script>
<script type="text/javascript" language="javascript" src="/js/dataTables.altEditor.free.js"> </script>
<!-- <script type="text/javascript" language="javascript" src="/js/dataTables.editor.min.js"> </script>
<script type="text/javascript" language="javascript" src="/js/editor-demo.js"> </script>
 -->

 <script>
  var columnDefs = [
            { "data": "id" },
            { "data": "name" },
            { "data": "phone" },
            { "data": "created_on" },
            { "data": "notes" },
        ];
  $(document).ready( function() {

        $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": { "url":  "/phonebooks", "type": "POST" },
        "columns": columnDefs,
    dom: 'Bfrtip',        // Needs button container
          select: 'single',
          responsive: true,
          altEditor: true,     // Enable altEditor
          buttons: [{
            text: 'Add',
            name: 'add'        // do not change name
          },
          {
            extend: 'selected', // Bind to Selected row
            text: 'Edit',
            name: 'edit'        // do not change name
          },
          {
            extend: 'selected', // Bind to Selected row
            text: 'Delete',
            name: 'delete'      // do not change name
         }]

    } );

  });
 </script>
</head>
<body>
<div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation">
              <a href="/auth/logout"> Logout <i class="fas fa-sign-out-alt"></i> </a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">Welcome <?=$user->email;?> </h3>
      </div>

      <div class="jumbotron">
        <h1>The Phonebook Application</h1>
        <p class="lead">You can Create / Read / Update and Delete the Phonebook entries on this page!</p>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
          <!-- <table id="example" class="display"> -->
          <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-striped" id="example">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Created_ON</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Created ON</th>
                <th>Notes</th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; 2018 Company, Inc.</p>
      </footer>

    </div>

</body>
</html>