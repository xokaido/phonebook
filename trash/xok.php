<style>
table.dataTable.select tbody tr,
table.dataTable thead th:first-child {
  cursor: pointer;
}
</style>
    
<form id="frm-example" action="/path/to/your/script" method="POST">
    
<table id="example" class="display select" cellspacing="0" width="100%">
   <thead>
      <tr>
         <th><input name="select_all" value="1" type="checkbox"></th>
         <th>Name</th>
         <th>Position</th>
         <th>Office</th>
         <th>Extn.</th>
         <th>Start date</th>
         <th>Salary</th>
      </tr>
   </thead>
   <tfoot>
      <tr>
         <th></th>
         <th>Name</th>
         <th>Position</th>
         <th>Office</th>
         <th>Extn.</th>
         <th>Start date</th>
         <th>Salary</th>
      </tr>
   </tfoot>
</table>
<hr>


</form>


        <div class="col-md-4" id="addding" style="float:right;">  
        
        <div class="btn-group" style="float: right;">
              <button id="exportPDF" class="btn btn-primary">
                <span style="color: white;">PDF &nbsp;&nbsp;<i class="fa fa-download"></i>
                </span>
              </button>
              <button id="exportCSV" class="btn btn-primary" style="margin-left: 10px;">
                <span style="color: white;">CSV &nbsp;&nbsp;<i class="fa fa-download"></i>
                </span>
              </button>
        </div>
        
        </div><br>


<script>
  //
// Updates "Select all" control in a data table

$(document).ready(function ()
{

  // $('#exportPDF').on('click', function(){ table.button( '0-0' ).trigger(); });
  // $('#exportCSV').on('click', function(){ table.button( '0-1' ).trigger(); });

   var rows_selected = [];
   table = $('#example').DataTable({
      'ajax': 'https://api.myjson.com/bins/1us28',
      'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'width':'1%',
         'className': 'dt-body-center',
         'render': function( data, type, full, meta ){ return '<input type="checkbox">'; }
      }],
      'order': [ 1, 'asc' ],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
   });

   // Handle click on checkbox
   $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');
      var data = table.row($row).data();
      var rowId = data[0];
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

   // Handle click on table cells with checkboxes
   $('#example').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#example tbody input[type="checkbox"]:checked').trigger('click');
      }

      e.stopPropagation();
   });
});
</script>