<html>
<head>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/fontawesome-all.css" rel="stylesheet">

 <script src="/js/jquery-3.3.1.min.js"></script>
 <script src="/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
 <script>
  $(document).ready( function() {

        $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": { "url":  "/phonebooks", "type": "POST" },
        "columns": [
            { "data": "name" },
            { "data": "phone" },
            { "data": "created_on" },
            { "data": "notes" },
        ]
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
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Welcome <?=$user->email;?>
          <a href="/auth/logout">
            Logout <i class="fas fa-sign-out-alt"></i>
          </a>
        </h3>
      </div>

      <div class="jumbotron">
        <h1>Jumbotron heading</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
          <table id="example">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Created ON</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
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