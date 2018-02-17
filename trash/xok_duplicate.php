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
//
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   if($chkbox_checked.length === 0)
   {
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all)
         chkbox_select_all.indeterminate = false;
   }
   else if ($chkbox_checked.length === $chkbox_all.length)
   {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all)
         chkbox_select_all.indeterminate = false;
   }
   else
   {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all)
         chkbox_select_all.indeterminate = true;
   }
}

$(document).ready(function ()
{

  $('#exportPDF').on('click', function(){ table.button( '0-0' ).trigger(); });
  $('#exportCSV').on('click', function(){ table.button( '0-1' ).trigger(); });

   var rows_selected = [];
   table = $('#example').DataTable({
      'ajax': 'https://api.myjson.com/bins/1us28',
      'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'width':'1%',
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox">';
         }
      }],
      'order': [1, 'asc'],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      },
              buttons: [
                  {
                     extend: 'collection',
                     text: 'Export',
                     buttons: [ {
                         extend: 'pdf',
                         orientation: "portrait",
                         pageSize : "A3",
                         customize: function (doc) {
                         //doc.defaultStyle.fontSize = 16;
                         //doc.pageMargins = [ 130, 20, 130, 20 ];
                         doc.content.forEach(function(item) {
                                if (item.table) {
                                   // Set width for 3 columns
                                   item.table.widths = [180, 100, 100,260,150] 
                                } 
                             });
                        }  
                     },{
                         extend: 'csv',
                         orientation: "landscape",
                         pageSize : "A3"
                     }]
                  }
               ]
   });

   // Handle click on checkbox
   $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1)
         rows_selected.push(rowId); // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
         else if (!this.checked && index !== -1)
         rows_selected.splice(index, 1);

      if(this.checked)
         $row.addClass('selected');
       else 
         $row.removeClass('selected');

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
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

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });
    
   // Handle form submission event 
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY     
      
      // Output form data to a console     
      $('#example-console').text($(form).serialize());
      console.log("Form submission", $(form).serialize());
       
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
      e.preventDefault();
   });
});
</script>