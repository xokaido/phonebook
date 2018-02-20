<script>
var pages         = [];
var rows_selected = [];
function make_link(data, type, row, meta)
{
    return '<a href="/home/edit/' + row.id + '">' + data + '</a>';
}
function add_checkbox(data, type, row, meta )
{ 
  return '<input type="checkbox" />'; 
}
pages['multi'] = [
                    {"data": "glass", "orderable": false, "searchable": false, "render": add_checkbox },
                    {"data": "id", "searchable": false, "visible": false },
                    {"data": "brand", "render": make_link },
                    {"data": "sku_model" , "render": make_link },
                    {"data": "itemname" , "render": make_link },
                    // {"data": "itemupc" },
                    // {"data": "itemmainimagelink" },
                    {"data": "singleitemcostusd" },
                    // {"data": "itemcasepack" },
                    {"data": "singleitemretailusd" },
                    // {"data": "singleitemmapusd" },
                    {"data": "amazonasin" },
                    {"data": "amazonlivelink" },
                  ];

$(document).ready( function() {


  var table = $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": { "url":  "/products/" , "type": "POST" },
            "columns": pages.multi,
            "order": [[ 1, 'asc' ]],
            select: 'single',
            fixedColumns: true
    } );
   // Handle click on checkbox
   $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');
      var data = table.row($row).data();
      var rowId = data.id;
      var index = $.inArray(rowId, rows_selected);

      if(this.checked && index === -1)
         rows_selected.push(rowId);
      else if (!this.checked && index !== -1)
         rows_selected.splice(index, 1);

      if(this.checked)
         $row.addClass('selected');
       else 
         $row.removeClass('selected');

      e.stopPropagation();
   });

  $('#exportCSV').on('click', function(){
    if( rows_selected.length < 1 )
    {
      alert( "Please select rows to export first!" );
      return false;
    }
    var poster = '';
    for( let id in rows_selected )
      poster += rows_selected[ id ] + ',';
    $("#product_ids").val( poster.replace( /,$/, '' ) );
    $("form#export").submit();
    console.log( 'clicked' );
  });
   // Handle click on table cells with checkboxes
   $('#example').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });
  $('#delete').on('click', function(){
    if( rows_selected.length < 1 )
    {
      alert( "Please select rows to delete!" );
      return false;
    }

    var poster = '';
    for( let id in rows_selected )
      poster += rows_selected[ id ] + ',';

    $.post( '/products/delete', { ids: poster.replace( /,$/, '' ) }, function( r ) {

      table.ajax.reload();
      console.log( r );

    });

  });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e)
   {
      if(this.checked)
         $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
      else 
         $('#example tbody input[type="checkbox"]:checked').trigger('click');

      e.stopPropagation();
    });


  $("#uploadCSV").on( 'click', function( e ) {
    // e.preventDefault();
    // submitFile();

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
      <form method="post" action="/products/export" id="export">
        <input type="hidden" value="" name="ids" id="product_ids" />
      </form>

      <div class="btn-group">
            <a href="/home/create/" class="btn btn-primary">Add New Product</a>
            <button id="delete" class="btn btn-primary" style="margin-left: 10px;">
              Delete Products&nbsp;&nbsp;<i class="fa fa-times"></i>
            </button>
            <button id="exportCSV" class="btn btn-primary" style="margin-left: 10px;">
              CSV &nbsp;&nbsp;<i class="fa fa-download"></i>
            </button>
            <form method="POST" class="myForm" enctype="multipart/form-data" action="/products/import" style="display: inline;padding: 7px;">
                <!-- <input type="file" id="foto1" name="userfile" /> -->
                <label class="btn btn-default"> <input type="file" name="csvfile" hidden> </label>
                <button type="submit" id="uploadCSV" class="btn btn-primary" style="margin-left: 10px;">
                  Upload CSV &nbsp;&nbsp;<i class="fa fa-upload"></i>
                </button>
            </form>
      </div>
      <div class="row">&nbsp;</div>

      <div class="row marketing">
        <div class="col-lg-12">
          <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-striped table-responsive" id="example">
            <thead>
              <tr>
               <th><input name="select_all" value="1" type="checkbox"></th>
                <?php foreach( $pages[ $page ] as $v ) : ?>
                  <th><?=$v['display'];?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <?php foreach( $pages[ $page ] as $v ) : ?>
                  <th><?=$v['display'];?></th>
                <?php endforeach; ?>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>

<script>

pages['basic'] = [  { "data": "brand" },
                    { "data": "sku_model" },
                    { "data": "itemname" },
                    { "data": "itemdescription" },
                    { "data": "itemupc" }
                  ];
pages['shipping'] = [  
                    { 'data': 'singleitemlength' },
                    { 'data': 'singleitemweight' },
                    { 'data': 'singleitemwidth' },
                    { 'data': 'singleitemheight' },
                    { 'data': 'singleitemdepth' },
                    { 'data': 'singlepackagelength' },
                    { 'data': 'singlepackagewidth' },
                    { 'data': 'singlepackageheight' },
                    { 'data': 'singlepackageweight' },
                    { 'data': 'itemdimunit' },
                    { 'data': 'itemweightunit' },
                    { 'data': 'packagedimunit' },
                    { 'data': 'liquid' },
                    { 'data': 'glass' },
                    { 'data': 'sealedcap' },
                    { 'data': 'packagingtype' }
                  ];
pages['details'] = [ 
                    { 'data': 'itemfluidounces' },
                    { 'data': 'itemvolumemil' },
                    { 'data': 'itemingredients' },
                    { 'data': 'itembenefits' },
                    { 'data': 'itemsuggesteduse' },
                    { 'data': 'itemdirections' },
                    { 'data': 'itemcountryoforigin' },
                    { 'data': 'shelflife' }
                  ];
pages['images'] = [ 
                    { "data": 'itemmainimagelink' },
                    { "data": 'itemimagelink2' },
                    { "data": 'itemimagelink3' },
                    { "data": 'itemimagelink4' },
                    { "data": 'itemimagelink5' }
                  ];
pages['electric'] = [ 
                    { 'data': 'electroniccomponent' },
                    { 'data': 'voltage' },
                    { 'data': 'electriccertification' },
                    { 'data': 'batteriesrequired' },
                    { 'data': 'batteriesincluded' },
                    { 'data': 'howmanybatteries' },
                    { 'data': 'batterytype' }
                  ];
pages['pricing'] = [ 
                    { 'data': 'singleitemcostusd' },
                    { 'data': 'singleitemretailusd' },
                    { 'data': 'singleitemmapusd' }
                  ];
pages['safety'] = [ 
                    { 'data': 'msdslink' },
                    { 'data': 'datesubmittedtodb' },
                    { 'data': 'warnings' }
                  ];

pages['amazon'] = [ 
                    { 'data': 'amazontitle' },
                    { 'data': 'amazonbulletpoint1' },
                    { 'data': 'amazonbulletpoint2' },
                    { 'data': 'amazonbulletpoint3' },
                    { 'data': 'amazonbulletpoint4' },
                    { 'data': 'amazonbulletpoint5' },
                    { 'data': 'amazondescription' },
                    { 'data': 'amazonkeywords' }
                  ];
</script>