$(document).ready(function() {
    var base_url_user = 'http://hircolab.com/index.php/';
    load_ajax_data();



    function sprintf(akkhi) {
        var regex = /%%|%(\d+\$)?([-+\'#0 ]*)(\*\d+\$|\*|\d+)?(\.(\*\d+\$|\*|\d+))?([scboxXuideEfFgG])/g;
        var a = arguments;
        var i = 0;
        var format = a[i++];

        // pad()
        var pad = function(str, len, chr, leftJustify) {
            if (!chr) {
                chr = ' ';
            }
            var padding = (str.length >= len) ? '' : new Array(1 + len - str.length >>> 0)
                .join(chr);
            return leftJustify ? str + padding : padding + str;
        };

        // justify()
        var justify = function(value, prefix, leftJustify, minWidth, zeroPad, customPadChar) {
            var diff = minWidth - value.length;
            if (diff > 0) {
                if (leftJustify || !zeroPad) {
                    value = pad(value, minWidth, customPadChar, leftJustify);
                } else {
                    value = value.slice(0, prefix.length) + pad('', diff, '0', true) + value.slice(prefix.length);
                }
            }
            return value;
        };

        // formatBaseX()
        var formatBaseX = function(value, base, prefix, leftJustify, minWidth, precision, zeroPad) {
            // Note: casts negative numbers to positive ones
            var number = value >>> 0;
            prefix = prefix && number && {
                '2': '0b',
                '8': '0',
                '16': '0x'
            }[base] || '';
            value = prefix + pad(number.toString(base), precision || 0, '0', false);
            return justify(value, prefix, leftJustify, minWidth, zeroPad);
        };

        // formatString()
        var formatString = function(value, leftJustify, minWidth, precision, zeroPad, customPadChar) {
            if (precision != null) {
                value = value.slice(0, precision);
            }
            return justify(value, '', leftJustify, minWidth, zeroPad, customPadChar);
        };

        // doFormat()
        var doFormat = function(substring, valueIndex, flags, minWidth, _, precision, type) {
            var number, prefix, method, textTransform, value;

            if (substring === '%%') {
                return '%';
            }

            // parse flags
            var leftJustify = false;
            var positivePrefix = '';
            var zeroPad = false;
            var prefixBaseX = false;
            var customPadChar = ' ';
            var flagsl = flags.length;
            for (var j = 0; flags && j < flagsl; j++) {
                switch (flags.charAt(j)) {
                    case ' ':
                        positivePrefix = ' ';
                        break;
                    case '+':
                        positivePrefix = '+';
                        break;
                    case '-':
                        leftJustify = true;
                        break;
                    case "'":
                        customPadChar = flags.charAt(j + 1);
                        break;
                    case '0':
                        zeroPad = true;
                        customPadChar = '0';
                        break;
                    case '#':
                        prefixBaseX = true;
                        break;
                }
            }

            // parameters may be null, undefined, empty-string or real valued
            // we want to ignore null, undefined and empty-string values
            if (!minWidth) {
                minWidth = 0;
            } else if (minWidth === '*') {
                minWidth = +a[i++];
            } else if (minWidth.charAt(0) == '*') {
                minWidth = +a[minWidth.slice(1, -1)];
            } else {
                minWidth = +minWidth;
            }

            // Note: undocumented perl feature:
            if (minWidth < 0) {
                minWidth = -minWidth;
                leftJustify = true;
            }

            if (!isFinite(minWidth)) {
                throw new Error('sprintf: (minimum-)width must be finite');
            }

            if (!precision) {
                precision = 'fFeE'.indexOf(type) > -1 ? 6 : (type === 'd') ? 0 : undefined;
            } else if (precision === '*') {
                precision = +a[i++];
            } else if (precision.charAt(0) == '*') {
                precision = +a[precision.slice(1, -1)];
            } else {
                precision = +precision;
            }

            // grab value using valueIndex if required?
            value = valueIndex ? a[valueIndex.slice(0, -1)] : a[i++];

            switch (type) {
                case 's':
                    return formatString(String(value), leftJustify, minWidth, precision, zeroPad, customPadChar);
                case 'c':
                    return formatString(String.fromCharCode(+value), leftJustify, minWidth, precision, zeroPad);
                case 'b':
                    return formatBaseX(value, 2, prefixBaseX, leftJustify, minWidth, precision, zeroPad);
                case 'o':
                    return formatBaseX(value, 8, prefixBaseX, leftJustify, minWidth, precision, zeroPad);
                case 'x':
                    return formatBaseX(value, 16, prefixBaseX, leftJustify, minWidth, precision, zeroPad);
                case 'X':
                    return formatBaseX(value, 16, prefixBaseX, leftJustify, minWidth, precision, zeroPad)
                        .toUpperCase();
                case 'u':
                    return formatBaseX(value, 10, prefixBaseX, leftJustify, minWidth, precision, zeroPad);
                case 'i':
                case 'd':
                    number = +value || 0;
                    number = Math.round(number - number % 1); // Plain Math.round doesn't just truncate
                    prefix = number < 0 ? '-' : positivePrefix;
                    value = prefix + pad(String(Math.abs(number)), precision, '0', false);
                    return justify(value, prefix, leftJustify, minWidth, zeroPad);
                case 'e':
                case 'E':
                case 'f': // Should handle locales (as per setlocale)
                case 'F':
                case 'g':
                case 'G':
                    number = +value;
                    prefix = number < 0 ? '-' : positivePrefix;
                    method = ['toExponential', 'toFixed', 'toPrecision']['efg'.indexOf(type.toLowerCase())];
                    textTransform = ['toString', 'toUpperCase']['eEfFgG'.indexOf(type) % 2];
                    value = prefix + Math.abs(number)[method](precision);
                    return justify(value, prefix, leftJustify, minWidth, zeroPad)[textTransform]();
                default:
                    return substring;
            }
        };

        return format.replace(regex, doFormat);
    }



  function load_ajax_data() {
    $.ajax({
      url: base_url_user + 'admin/get_product_details/',
      type: 'POST',
    })
    .done(function(data) {
      // console.log(data);
      var prse = JSON.parse(data);

      var html = '';
      html += '<table class="table table-bordered">'+
                '<thead>'+
                    '<tr>'+
                        '<th>Edit</th>'+
                        '<th>Edit Images</th>'+
                        '<th>View</th>'+
                        '<th>Item Id</th>';
        $.each(prse.master_filter, function(index, val) {
            html += '<th>'+val.filter_name+'</th>';
        });
      html += '</tr>'+
              '</thead>';
              // '<tfoot>'+
              // '<th>Edit</th>'+
              // '<th>Edit Images</th>'+
              // '<th>View</th>'+
              // '<th>Item Id</th>';
        // $.each(prse.master_filter, function(index, val) {
            // html += '<th>'+val.filter_name+'</th>';
        // });

      html += '<tbody>';
        // console.log(prse.master_filter.length);
        $.each(prse.products, function(index, val) {
            var count = 0;
            var ids = val.product_id;
            html += '<tr>'+
                    '<td class="edit_table">'+
                    '<a href="'+base_url_user+'admin/user_data/'+val.product_id+'">Edit</a>'+
                    '</td>'+
                    '<td class="edit_table">'+
                    '<a href="'+base_url_user+'admin/edit_image/'+val.product_id+'" class="btn">Edit Images</a>'+
                    '</td>'+
                    '<td><a href="'+base_url_user+'admin/view_item/'+val.product_id+'" >View</a></td>'+
                    '<td>'+val.product_id+'</td>';
            for (var i = 0; i < prse.master_filter.length; i++){
                if (prse.filter_data[val.product_id][i].value_type == 'Image' && prse.filter_data[val.product_id][i].filter_value != '')
                {
                    if (prse.filter_data[val.product_id][i].filter_value) {
                        html += '<td><img src="http://hircolab.com/assets/uploads/'+prse.filter_data[val.product_id][i].filter_value+'" alt="" width="100px" /></td>';
                    } else {
                        html += '<td></td>'
                    }
                // } else if (prse.filter_data[val.product_id][i].value_type == 'MultiselectImage') {
                //     if (prse.images[val.product_id].length > 0) {
                //         html += '<td width="200px">';
                //         $.each(prse.images[val.product_id], function(index, v){
                //             if (v.url) {
                //                 html += '<img src="http://pearlsarkar.net/hirco/assets/uploads/'+v.url+'" alt="" style="width: 45px; display: inline-block; float: left"/>';
                //             }
                //         })
                //         html += '</td>';
                //     } else {
                //         html += '<td></td>'
                //     }
                } else {
                    html += '<td>'+prse.filter_data[val.product_id][i].filter_value+'</td>';
                }
            }
            html += '</tr>';
        });
    
      html += '</tbody>'+
              '</table>';
        $('#push_data').html(html);
        var table = $('table').dataTable({
          "dom": 'T<"clear">lfrtip',
          "tableTools": {
              "sSwfPath": "http://hircolab.com/assets/js/datatables/copy_csv_xls_pdf.swf"
          }
        });

        // Setup - add a text input to each footer cell
        // $('#DataTables_Table_0 tfoot th').each( function () {
        //     var title = $(this).text();
        //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        // } );
     
        // // DataTable
        // var table = $('#DataTables_Table_0').DataTable();
     
        // // Apply the search
        // table.columns().every( function () {
        //     var that = this;
     
        //     $( 'input', this.footer() ).on( 'keyup change', function () {
        //         if ( that.search() !== this.value ) {
        //             that
        //                 .search( this.value )
        //                 .draw();
        //         }
        //     } );
        // } );
        // $('#DataTables_Table_0').DataTable( {
        // initComplete: function () {
        //     this.api().columns().every( function () {
        //         var column = this;
        //         var select = $('<select><option value=""></option></select>')
        //             .appendTo( $(column.footer()).empty() )
        //             .on( 'change', function () {
        //                 var val = $.fn.dataTable.util.escapeRegex(
        //                     $(this).val()
        //                 );
 
        //                 column
        //                     .search( val ? '^'+val+'$' : '', true, false )
        //                     .draw();
        //             } );
 
        //         column.data().unique().sort().each( function ( d, j ) {
        //             select.append( '<option value="'+d+'">'+d+'</option>' )
        //         } );
        //     } );
        //   }
        // } );
    //      $(".edit_table").click(function(){
    //         var item_id = $(this).data("item");
    //                 $.ajax({
    //                     url:"http://pearlsarkar.net/hirco/admin/user_data",
    //                     type: "POST",
    //                     data:{
    //                         item_id:item_id
    //                     },
    //             success:function(akhi){
    //                 console.log(akhi);

    //             }
    //         });
        
    // });
});

    // .fail(function() {
    //     //console.log("error");
    // })
    // .always(function() {
    //     //console.log("complete");
    // });
  }
});

/*
* Code for every column searchable
*/
$(document).ready(function() {
    // // Setup - add a text input to each footer cell
    // $('#DataTables_Table_0 tfoot th').each( function () {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    // } );
 
    // // DataTable
    // var table = $('#DataTables_Table_0').DataTable();
 
    // // Apply the search
    // table.columns().every( function () {
    //     var that = this;
 
    //     $( 'input', this.footer() ).on( 'keyup change', function () {
    //         if ( that.search() !== this.value ) {
    //             that
    //                 .search( this.value )
    //                 .draw();
    //         }
    //     } );
    // } );
} );



