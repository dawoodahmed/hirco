$(document).ready(function(){

    var base_url_user = 'http://localhost:8888/monthly-portfolio-report/';
        load_ajax_data();

        function load_ajax_data(){
            $.ajax({
                url: base_url_user+'admin/get_reports_data',
                type: 'GET',
                data: {
                    // param1: 'value1'
                },
            })
            .done(function(data) {
                var prse = JSON.parse(data);
                console.log(prse);

                
                //construct the html 
                var html = '';

                html += '<table class="table table-bordered table-striped table-condensed">'+
                        '<thead>'+
                        '<tr>'+
                        '<th>id</th><th>investor_id</th><th>report_id</th><th>created_date</th>'+
                        '</tr>'+
                        '</thead>';
                html += '<tbody>';

                    for(var i = 0;i<prse.length;i++){
                         html+= "<tr><td>"+prse[i].id+"</td><td><a href="+base_url_user+"admin/have_to_edit/"+prse[i].investor_id+"/"+prse[i].report_id+" class='common_class' data-reportid='"+prse[i].report_id+"' data-investorid='"+prse[i].investor_id+"' data-date='"+prse[i].created_date+"' target='_blank'>"+prse[i].investor_id+"</a></td><td>"+prse[i].report_id+"</td><td>"+prse[i].created_date+"</td></tr>";
                    }

                html += '</tbody>'; 

                $('#push_data').html(html);
                
                var table = $('table').dataTable({
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": base_url_user+"/assets/js/datatables/copy_csv_xls_pdf.swf"
                }
                
            });
                
                common_functions();
            })
            .fail(function() {
                //console.log("error");
            })
            .always(function() {
                //console.log("complete");
            });
            
        }
            


        function common_functions(){
            //Edit Overlay Filling

            $('.common_class').on('click',function(){
                var report_id = $(this).attr('data-reportid');
                var investor_id = $(this).attr('data-investorid');
                var date = $(this).attr('data-date');
                console.log(report_id);
                console.log(investor_id);
                console.log(date);
                
            });
     
        }


        




});