<script>
$(document).ready( function() {

  $("#save").on( 'click', function( e ) {
    e.preventDefault();
    $(this).addClass( 'disabled' );
    $(this).html( '<i class="fa fa-spin fa-spinner fa-2x"></i> Working...' );
    self = $(this);
    $.ajax({
      url: '/products/add',
      type: 'post',
      dataType: 'json',
      data: $('form#productForm').serialize( ),
      success: function( r ) {

          self.removeClass( 'disabled' );
          self.html( '<i class="fa fa-check"></i> Saved!' );
          $("#message").html( '<div class="alert alert-success">' + r.message +'</div>' );
          $("#message").removeClass( 'hidden' );

      },
      error: function( r )
      {
          self.removeClass( 'disabled' );
          self.html( '<i class="fa fa-ban"></i> Failed!' );
          $("#message").html( '<div class="alert alert-danger">' + r.message +'</div>' );
          $("#message").removeClass( 'hidden' );
      }

    });


  });


});
</script>
<body>
<div class="container-fluid">

      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="/">Home</a></li>
            <li role="presentation">
              <a href="/auth/logout"> Logout <i class="fas fa-sign-out-alt"></i> </a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">Welcome <?=$user->email;?> </h3>
      </div>

      <div class="jumbotron">
        <h1>The Products Application</h1>
        <p class="lead">You can Create / Read / Update and Delete the Product entries on this page!</p>
      </div>

      <div class="row marketing">
        <a href="/" class="btn btn-default">Go Back</a><br><br>

        <div id="message" class="hidden">
          <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Indicates a successful or positive action.
          </div>
        </div>

        <form method="post" action="/products/edit/" id="productForm">

          <div class="col-lg-12">

            <ul class="nav nav-tabs">

              <li class="active"> <a data-toggle="tab" href="#basic">Basic</a> </li>
              <li> <a data-toggle="tab" href="#shipping">Shipping</a> </li>
              <li> <a data-toggle="tab" href="#details">Item Details</a> </li>
              <li> <a data-toggle="tab" href="#images">Images</a> </li>
              <li> <a data-toggle="tab" href="#electric">Electric</a> </li>
              <li> <a data-toggle="tab" href="#pricing">Pricing</a> </li>
              <li> <a data-toggle="tab" href="#safety">Safety</a> </li>
              <li> <a data-toggle="tab" href="#amazon">Amazon Data</a> </li>

            </ul>

            <div class="tab-content">

                <div id="basic" class="tab-pane fade in active">
                  <h3>Basic Configuration</h3>
                  <?=display_tab( $tabs[ 'basic' ] );?>
                </div>
                <div id="shipping" class="tab-pane fade">
                  <h3>Shipping Information</h3>
                  <?=display_tab( $tabs[ 'shipping' ] );?>
                </div>
                <div id="details" class="tab-pane fade">
                  <h3>Item Details</h3>
                  <?=display_tab( $tabs[ 'details' ] );?>
                </div>
                <div id="images" class="tab-pane fade">
                  <h3>Item Images</h3>
                  <?=display_tab( $tabs[ 'images' ] );?>
                </div>
                <div id="electric" class="tab-pane fade">
                  <h3>Item Electrics</h3>
                  <?=display_tab( $tabs[ 'electric' ] );?>
                </div>
                <div id="pricing" class="tab-pane fade">
                  <h3>Item pricing</h3>
                  <?=display_tab( $tabs[ 'pricing' ] );?>
                </div>
                <div id="safety" class="tab-pane fade">
                  <h3>Item safety</h3>
                  <?=display_tab( $tabs[ 'safety' ] );?>
                </div>
                <div id="amazon" class="tab-pane fade">
                  <h3>Amazon Data</h3>
                  <?=display_tab( $tabs[ 'amazon' ] );?>
                </div>

            </div>
          </div>
          <div class="row">&nbsp;</div>
          <div class="row">
            <button type="submit" id="save" class="btn btn-success">Save Changes</button>
          </div>
        </form>

      </div><!-- row marketing -->
    </div><!-- container-fluid -->

