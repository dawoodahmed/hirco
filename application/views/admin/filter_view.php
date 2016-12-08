<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css?v=jdd">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js?v=dfnj3e3"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css?v=df45"> -->
</head>
<body>
   <section id="container">
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href="javascript:void(0);" class="logo"><b></b></a>
        <div class="nav notify-row" id="top_menu">
          <ul class="nav top-menu">
          </ul>
        </div>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><a class="logout" href="<?=base_url()?>auth/logout">Logout</a>
            </li>
          </ul>
        </div>
        </header>
        <aside>
          <?php include_once( 'includes/sidebar.php'); ?>
        </aside>
        <section id="main-content">
          <section class="wrapper site-min-height">
            <h1 class="page-header">Filter View </h1>
            <hr>
            <?php $filterData = json_encode($filterData); ?>
            <div class="row mt">
              <div class="col-lg-12" id="push_data">
                <div class="col-lg-8">
                  <style>
                    td,th {
                        padding:10px !important;
                    }

                    .report_id{
                        cursor: pointer;
                    }
                </style>
                  <!-- <a href="<?=base_url()?>admin/filter_item"><button class="btn">Back</button></a> -->
                </div>
              </div>
            </div>
            <input type="button" class="btn" style="display:none;" id="certificate" value="Certificate">
            <input type="button" class="btn" style="display:none;" id="label" value="Label">
            <input type="button" class="btn" style="display:none;" id="bill" value="Bill">

            <br><br>
            <select style="display:none;" id="multiselect1" multiple="multiple">
            </select>
            <input type="button" class="btn" style="display:none;" id="checkbox_sub" value="Submit">
          </section>
        </section>
    </section>
    <?php include_once( 'includes/site_bottom_scripts.php'); ?>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/datatables/resources/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/datatables/dataTables.tableTools.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-multiselect.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css" type="text/css">

    <style type="text/css" class="init">
      div.dataTables_wrapper {
          margin-bottom: 3em;
      }
    </style>
    <style type="text/css">
    table.dataTable.select tbody tr,
    table.dataTable thead th:first-child {
     cursor: pointer;
    }
    #multiselect1 .multiselect-container li.odd {
        background: #eeeeee;
    }
    </style>

    <script type="text/javascript">
    var filterData = <?=@$filterData?>;
    $(document).ready(function() {
      load_ajax_data();

        function load_ajax_data() {
            $.ajax({
                    url: 'http://hircolab.com/index.php/admin/filter_details/',
                    type: 'POST',
                    data: {
                        id: <?=$filterData?>
                    }
                })
                .done(function(data) {
                    var prse = JSON.parse(data);
                   var column = [];
                    var img_header = 0;
                    var html = '';
                    html += '<table class="table table-bordered">' +
                        '<thead>' +
                        '<tr>' +
                        '<th><input name="select_all" value="1" type="checkbox"></th>'+
                        '<th>Item Id</th>';
                    $.each(prse.master_filter, function(index, val) {
                        html += '<th>' + val.filter_name + '</th>';
                          column.push(val.filter_name);
                    });
                    html += '</tr>' +
                        '</thead>';
                        // '<tfoot>' +
                    //     '<tr>' +
                    //     '<th> Total </th>' +
                    //     '<th></th>' +
                    //     '</tr>' +
                    //     '</tfoot>';
                    html += '<tbody>';
                   // var sum_biggest_size = 0;
                   // var sum_smallest_size = 0;
                   // var sum_carat = 0;
                   // var sum_gram = 0;
                   // var sum_chaw = 0;
                   // var sum_pieces= 0;
                   // var sum_costvalue_us  = 0;
                   // var sum_rate_per_carat = 0;
                   // var sum_rate_per_chaw = 0;
                   // var sum_us_equal_to_rs = 0;
                   // var sum_costvalue_rs = 0;
                   // var sum_soldvalue_us = 0;
                   // var sum_soldvalue_us_to_rs = 0;
                   // var sum_soldvalue_rs = 0;
                   // var sum_profit_us = 0;
                   // var sum_profit_rs = 0;
                    // sum_ = 0;


                    $.each(prse.products, function(index, val) {
                        var count = 0;
                        // http: //pearlsarkar.net/hirco/
                        var ids = val.product_id;
                        html += '<tr>' +'<td></td>' +
                            '<td>' + val.product_id + '</td>';
                        for (var i = 0; i < prse.master_filter.length; i++) {
                            if (prse.filter_data[val.product_id][i].value_type == 'Image' && prse.filter_data[val.product_id][i].filter_value != '') {
                                if (prse.filter_data[val.product_id][i].filter_value) {
                                    html += '<td><img src="http://hircolab.com/assets/uploads/' + prse.filter_data[val.product_id][i].filter_value + '" alt="" width="100px" /></td>';
                                } else {
                                    html += '<td></td>'
                                }
                            // } else if (prse.filter_data[val.product_id][i].value_type == 'MultiselectImage') {
                            //     if (prse.images[val.product_id].length > 0) {
                            //         html += '<td width="200px">';
                            //         $.each(prse.images[val.product_id], function(index, v) {
                            //             if (v.url) {
                            //                 html += '<img src="http://pearlsarkar.net/hirco/assets/uploads/' + v.url + '" alt="" style="width: 45px; display: inline-block; float: left"/>';
                            //             }
                            //         })
                            //         html += '</td>';
                            //     } else {
                            //         html += '<td></td>'
                            //     }
                            } else {

                                html += '<td>' + prse.filter_data[val.product_id][i].filter_value + '</td>';
                            }
                        //       //console.log(i);
                        //       if (i == 4) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_biggest_size += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 5) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_smallest_size += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 6) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_carat += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 7) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_gram += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }if (i == 8) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_chaw += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 19) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_costvalue_us += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 20) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_rate_per_carat += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 21) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_rate_per_chaw += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 22) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_us_equal_to_rs += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 23) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_costvalue_rs += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 32) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_soldvalue_us += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 33) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_soldvalue_us_to_rs += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 34) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_soldvalue_rs += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 35) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_profit_us += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        //       if (i == 36) {
                        //         if (isNaN( prse.filter_data[val.product_id][i].filter_value ) ) {
                        //           // console.log('data: ' + prse.filter_data[val.product_id][i].filter_value);
                        //         } else if (prse.filter_data[val.product_id][i].filter_value==null || prse.filter_data[val.product_id][i].filter_value=='') {
                        //           // console.log('null');
                        //         } else {
                        //           // console.log('int data: ' + prse.filter_data[val.product_id][i].filter_value );
                        //           sum_profit_rs += parseFloat(prse.filter_data[val.product_id][i].filter_value);
                        //         }
                        //       }
                        }
                        html += '</tr>';
                    });
                    // console.log(sum_rate_per_chaw);

                    // html += '<tfoot>' +
                    //      '<th></th>'+
                    //     '<th>Total</th>';

                    // $.each(prse.master_filter, function(index, val) {
                    //     if (index==7) {
                    //       html += '<th>' +sum_gram + '</th>';
                    //     } else if(index==4){
                    //       html += '<th>' +sum_biggest_size + '</th>';
                    //     }else if(index==5){
                    //       html += '<th>' +sum_smallest_size + '</th>';
                    //     }else if(index==6){
                    //       html += '<th>' +sum_carat + '</th>';
                    //     }else if(index==8){
                    //       html += '<th>' +sum_chaw + '</th>';
                    //     }else if(index==19){
                    //       html += '<th>' +sum_costvalue_us + '</th>';
                    //     }else if(index==20){
                    //       html += '<th>' +sum_rate_per_carat + '</th>';
                    //     }else if(index==21){
                    //       html += '<th>' +sum_rate_per_chaw + '</th>';
                    //     }else if(index==22){
                    //       html += '<th>' +sum_us_equal_to_rs + '</th>';
                    //     }else if(index==23){
                    //       html += '<th>' +sum_costvalue_rs + '</th>';
                    //     }
                    //     else if(index==32){
                    //       html += '<th>' +sum_soldvalue_us + '</th>';
                    //     }
                    //     else if(index==33){
                    //       html += '<th>' +sum_soldvalue_us_to_rs + '</th>';
                    //     }
                    //     else if(index==34){
                    //       html += '<th>' +sum_soldvalue_rs + '</th>';
                    //     }
                    //     else if(index==35){
                    //       html += '<th>' +sum_profit_us + '</th>';
                    //     }
                    //     else if(index==36){
                    //       html += '<th>' +sum_profit_rs + '</th>';
                    //     }
                    //     else {
                    //       html += '<th> </th>';
                    //     }

                    // });
                    // html += '</tfoot>';

                    html += '</tbody>' +
                        '</table>';
                    $('#push_data').html(html);
                    var rows_selected = [];
                    var table = $('table').DataTable({
                        "dom": 'T<"clear">lfrtip',
                        "tableTools": {
                            "sSwfPath": "http://hircolab.com/assets/js/datatables/copy_csv_xls_pdf.swf"
                        },
                         'columnDefs': [{
                         'targets': 0,
                         'searchable':false,
                         'orderable':false,
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
                           // if($.inArray(rowId, rows_selected) !== -1){
                           //    $(row).find('input[type="checkbox"]').prop('checked', true);
                           //    $(row).addClass('selected');
                           // }
                        }
                    });
                    $('#DataTables_Table_0 tbody').on('click', 'input[type="checkbox"]', function(e){
                      var $row = $(this).closest('tr');

                      // Get row data
                      var data = table.row($row).data();

                      // Get row ID
                      // var rowId = data[0];

                      // Determine whether row ID is in the list of selected row IDs
                      // var index = $.inArray(rowId, rows_selected);

                      // If checkbox is checked and row ID is not in list of selected row IDs
                      // if(this.checked && index === -1){
                      //    rows_selected.push(rowId);

                      // // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
                      // } else if (!this.checked && index !== -1){
                      //    rows_selected.splice(index, 1);
                      // }

                      if(this.checked){
                        // console.log(rowId);
                        $('#certificate').show();
                        $('#label').show();
                        $('#bill').show();
                        rows_selected.push(data[1]);

                        console.log(data[1]);
                         $row.addClass('selected');
                      } else {
                        $('#certificate').hide();
                        $('#label').hide();
                        $('#bill').hide();
                        console.log('data[1]: '+JSON.stringify(data[1]));
                        $row.removeClass('selected');
                        // rows_selected.pop(data[1]);
                        rows_selected.remove_by_value(data[1]);
                      }

                      e.stopPropagation();
                    });
                     $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
                          if(this.checked){
                             $('#DataTables_Table_0 tbody input[type="checkbox"]:not(:checked)').trigger('click');
                          } else {
                             $('#DataTables_Table_0 tbody input[type="checkbox"]:checked').trigger('click');
                          }

                          // Prevent click event from propagating to parent
                          e.stopPropagation();
                      });

                     $('#certificate').on('click', function(e){
                     	 window.location.href = "http://hircolab.com/admin/certificate/"+rows_selected;
                        // // console.log(rows_selected);
                        // $.ajax({
                        //             url: 'http://pearlsarkar.net/hirco/admin/certificate/',
                        //             type: 'POST',
                        //             data: {selected_item:rows_selected}
                        //           })
                        //            .done(function(data) {
                        //              var prse = JSON.parse(data);
                        //              // console.log(prse);
                        //               // window.location.href = "http://pearlsarkar.net/hirco/admin/session_data_consignment/";

                        // });
                    });

                    $('#label').on('click', function(e){
                        window.location.href = "http://hircolab.com/index.php/admin/label/"+rows_selected;
                    });

                    $('#bill').on('click', function(e){
                        window.location.href = "http://hircolab.com/index.php/admin/print_bill/"+rows_selected;
                    });

                    // $('#checkbox_sub').on('click', function(e) {
                    //               var brands = $('#multiselect1 option:selected');
                    //               var selected = [];
                    //               $(brands).each(function(index, brand){
                    //                   selected.push([$(this).val()]);
                    //               });
                    //               // console.log(selected);
                    //               $.ajax({
                    //                 url: 'http://pearlsarkar.net/hirco/admin/filter_data_submit/',
                    //                 type: 'POST',
                    //                 data: {selected_column:selected,selected_item:rows_selected}
                    //               })
                    //                .done(function(data) {
                    //                  var prse = JSON.parse(data);
                    //                  console.log(prse);
                    //                  window.location.href = "http://pearlsarkar.net/hirco/admin/session_data/";
                    //                 });
                    // });
          });
       }
});

// http://stackoverflow.com/questions/5767325/remove-a-particular-element-from-an-array-in-javascript
// Extending Array prototype with new function,
// if that function is already defined in "Array.prototype",
// then "Object.defineProperty" will throw an exception
Object.defineProperty(Array.prototype, "remove_by_value", {
    // Specify "enumerable" as "false" to prevent function enumeration
    enumerable: false,

    /**
    * Removes all occurence of specified item from array
    * @this Array
    * @param itemToRemove Item to remove from array
    * @returns {Number} Count of removed items
    */
    value: function (itemToRemove) {
        // Count of removed items
        var removeCounter = 0;

        // Iterate every array item
        for (var index = 0; index < this.length; index++) {
            // If current array item equals itemToRemove then
            if (this[index] === itemToRemove) {
                // Remove array item at current index
                this.splice(index, 1);

                // Increment count of removed items
                removeCounter++;

                // Decrement index to iterate current position
                // one more time, because we just removed item
                // that occupies it, and next item took it place
                index--;
            }
        }

        // Return count of removed items
        return removeCounter;
    }
});
    </script>

    <!-- // <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> -->
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/resources/demo.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/dataTables.tableTools.js"></script>

</body>
</html>
