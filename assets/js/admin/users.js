$(document).ready(function(){

    var base_url_user = 'http://localhost:8888/monthly-portfolio-report/';
        load_ajax_data();
    var chk_us = $('#check_logged_in_user').val();
        function load_ajax_data(){
            $.ajax({
                url: base_url_user+'admin/users_data',
                type: 'GET',
                data: {
                    // param1: 'value1'
                },
            })
            .done(function(data) {
                var prse = JSON.parse(data);
                console.log(prse);
                var condition = '';
                if(prse.priority == 2){
                    condition = ''
                }
                
                //construct the html 
                var html = '';

                html += '<table class="table table-bordered table-striped table-condensed">'+
                        '<thead>'+
                        '<tr>'+
                        '<th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Last Login</th><th>Active</th><th>Group</th><th>View</th><th>Edit</th><th>Delete</th>'+
                        '</tr>'+
                        '</thead>';
                html += '<tbody>';

                    for(var i = 0;i<prse.result.length;i++){
                      console.log(prse.group[i]);
                      if(prse.priority == 1){
                        if(prse.group[i] == 'members'){
                            html += '<tr class="user_'+prse.result[i].id+'" ><td>'+prse.result[i].username+'</td><td>'+prse.result[i].first_name+'</td><td>'+prse.result[i].last_name+'</td><td>'+prse.result[i].email+'</td><td>'+prse.result[i].last_login+'</td><td>'+prse.result[i].active+'</td><td>'+prse.group[i]+'</td><td><button type="button" class="btn btn-round btn-info user_view" data-toggle="modal" data-target="#myModal" data-id="'+prse.result[i].id+'" >View</button></td><td>EDIT</td><td>DELETE</td></tr>';
                        }
                      }

                    if(prse.priority == 2){
                        if(prse.group[i] == 'admin,members' || prse.group[i] == 'members'){
                            if(prse.group[i] == 'members'){
                                html += '<tr class="user_'+prse.result[i].id+'" ><td>'+prse.result[i].username+'</td><td>'+prse.result[i].first_name+'</td><td>'+prse.result[i].last_name+'</td><td>'+prse.result[i].email+'</td><td>'+prse.result[i].last_login+'</td><td>'+prse.result[i].active+'</td><td>'+prse.group[i]+'</td><td><button type="button" class="btn btn-round btn-info user_view" data-toggle="modal" data-target="#myModal" data-id="'+prse.result[i].id+'">View</button></td><td><button type="button" class="btn btn-round btn-warning user_edit" data-group = "'+prse.group[i]+'" data-toggle="modal" data-target="#myModaledit" data-id="'+prse.result[i].id+'">Edit</button></td><td>DELETE</td></tr>';    
                            }else{
                                if(chk_us == prse.result[i].id){
                                    html += '<tr class="user_'+prse.result[i].id+'" ><td>'+prse.result[i].username+'</td><td>'+prse.result[i].first_name+'</td><td>'+prse.result[i].last_name+'</td><td>'+prse.result[i].email+'</td><td>'+prse.result[i].last_login+'</td><td>'+prse.result[i].active+'</td><td>'+prse.group[i]+'</td><td><button type="button" class="btn btn-round btn-info user_view" data-toggle="modal" data-target="#myModal" data-id="'+prse.result[i].id+'">View</button></td><td><button type="button" class="btn btn-round btn-warning user_edit" data-group = "'+prse.group[i]+'" data-toggle="modal" data-target="#myModaledit" data-id="'+prse.result[i].id+'">Edit</button></td><td>DELETE</td></tr>';    
                                }else{
                                    html += '<tr class="user_'+prse.result[i].id+'" ><td>'+prse.result[i].username+'</td><td>'+prse.result[i].first_name+'</td><td>'+prse.result[i].last_name+'</td><td>'+prse.result[i].email+'</td><td>'+prse.result[i].last_login+'</td><td>'+prse.result[i].active+'</td><td>'+prse.group[i]+'</td><td><button type="button" class="btn btn-round btn-info user_view" data-toggle="modal" data-target="#myModal" data-id="'+prse.result[i].id+'">View</button></td><td>EDIT</td><td>DELETE</td></tr>';    
                                }
                                
                            }
                            
                        }
                    }
//<button type="button" class="btn btn-round btn-danger user_delete" data-id="'+prse.result[i].id+'">Delete</button>
//<button type="button" class="btn btn-round btn-warning user_edit" data-group = "'+prse.group[i]+'" data-toggle="modal" data-target="#myModaledit" data-id="'+prse.result[i].id+'">Edit</button>
                    if(prse.priority == 3){
                        
                            html += '<tr class="user_'+prse.result[i].id+'" ><td>'+prse.result[i].username+'</td><td>'+prse.result[i].first_name+'</td><td>'+prse.result[i].last_name+'</td><td>'+prse.result[i].email+'</td><td>'+prse.result[i].last_login+'</td><td>'+prse.result[i].active+'</td><td>'+prse.group[i]+'</td><td><button type="button" class="btn btn-round btn-info user_view" data-toggle="modal" data-target="#myModal" data-id="'+prse.result[i].id+'">View</button></td><td><button type="button" class="btn btn-round btn-warning user_edit" data-group = "'+prse.group[i]+'" data-toggle="modal" data-target="#myModaledit" data-id="'+prse.result[i].id+'">Edit</button></td><td><button type="button" class="btn btn-round btn-danger user_delete" data-id="'+prse.result[i].id+'">Delete</button></td></tr>';
                        
                    }


                    }

                html += '</tbody>'; 

                $('#push_data').html(html);
                

                var grp_group = '';
                for (var i = 0;i<prse.groups.length;i++){
                    grp_group += prse.groups[i].name+',';
                }
                $('#push_data').append("<input type='hidden' value='"+grp_group+"' id='all_grp_values'>");
                $('table').dataTable();
                var make_option = '';
                for(var i = 0; i <prse.groups.length; i++){
                    make_option += '<option value="'+prse.groups[i].id+'" >'+prse.groups[i].name+'</option>';
                
                }
                $('#create_group').html(make_option);
                $('#create_group').multiselect();
                

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
            var grab_id_gl = '';
                $('.user_edit').on('click',function(){
                    // grab the id 
                    var  grab_id = $(this).attr('data-id');
                    grab_id_gl = grab_id;
                    //grab group data 
                    var  grab_group = $(this).attr('data-group');
                    
                    // attach id to class
                    // Dirty Method
                    var grab_edit_data = $('.user_'+grab_id).children('td');
                    //console.log(grab_edit_data);
                    var username = grab_edit_data[0].outerText;
                    var first_name = grab_edit_data[1].outerText;
                    var last_name =  grab_edit_data[2].outerText;
                    var email = grab_edit_data[3].outerText;
                    var last_login = grab_edit_data[4].outerText;
                    var active = grab_edit_data[5].outerText;
                    var group = grab_edit_data[6].outerText;
                    $('#edit_username').val(username);
                    $('#edit_fname').val(first_name);
                    $('#edit_lname').val(last_name);
                    $('#edit_email').val(email);
                    $('#edit_last_login').val(last_login);
                    $('#edit_active').val(active);
                    $('#edit_group').val(group);




                    var count_grp = $('#all_grp_values').val();
                    var count_db_grp  = count_grp.split(',');
                    var make_option = '';
                    var take_count = grab_group.split(',');

                    var array1 = Array();
                    var array2 = Array();
                    var i = 1;
                    $.grep(count_db_grp, function(el){
                        array1[i] = el;
                        array2[i] = $.inArray(el, take_count);
                        i++;

                    });

                    var make_option = '<select name="" id="group_edit" multiple>';





                    for(var k = 1;k<array1.length;k++){

                        if(array1[k] != ''){
                            if(array2[k] != -1){
                                make_option += '<option value="'+k+'" selected>'+array1[k]+'</option>';
                               
                            }else{
                               make_option += '<option value="'+k+'" >'+array1[k]+'</option>'; 

                            } 
                        }

                    }

                    make_option += '</select>';

                    $('#create_group').html();

                    $('#group_edit_container').html('');
                    $('#group_edit_container').html(make_option);
                    $('#group_edit').multiselect();
                    $('#create_group').multiselect();
                    

                });
            //End Overlay Edit
        

        $('.edit_users').on('click',function(){


            var fname = $('#edit_fname').val();
            var lname = $('#edit_lname').val();
            var phone = $('#edit_phone').val();
            var email = $('#edit_email').val();
            //var company = $('#create_company').val();
            var password = $('#edit_password').val();
            var groups = $('#group_edit').val();

            // var values = {

            // }


            form_validation();

            $.ajax({
                url: base_url_user+'auth/edit_user/'+grab_id_gl,
                type: 'POST',
                data: {
                     first_name : fname,
                     last_name :lname,
                     phone : phone,
                     email : email,
                     //company : company,
                     password : password,
                     groups : groups
                     //id : grab_id_gl
                },
            })
            .done(function(data) {
                //var prse = JSON.parse(data);
                //console.log(prse);
                $('.close').click();
                load_ajax_data();

            })
            .fail(function() {
                //console.log("error");
            })
            .always(function() {
                //console.log("complete");
            });
        });




        $('.user_view').on('click',function(){

            console.log('Hey B');
                    var  grab_id = $(this).attr('data-id');
                    
                    //grab group data 
                    var  grab_group = $(this).attr('data-group');
                    
                    // attach id to class
                    // Dirty Method
                    var grab_edit_data = $('.user_'+grab_id).children('td');

                    
                    var username = grab_edit_data[0].outerText;
                    var first_name = grab_edit_data[1].outerText;
                    var last_name =  grab_edit_data[2].outerText;
                    var email = grab_edit_data[3].outerText;
                    var last_login = grab_edit_data[4].outerText;
                    var active = grab_edit_data[5].outerText;
                    var group = grab_edit_data[6].outerText;
                    console.log(group);
                    //$('#view_fname').val(username);
                    $('#view_fname').html('');
                    $('#view_lname').html('');
                    $('#view_email').html('');
                    $('#view_groups').html('');
                    $('#view_fname').append(first_name);
                    $('#view_lname').append(last_name);
                    $('#view_email').append(email);
                    // $('#edit_last_login').append(last_login);
                    // $('#edit_active').append(active);
                    $('#view_groups').append(group);
        });



        $('.paginate_button').on('click',function(){
            common_functions();
        });

        $('#DataTables_Table_0_filter input').on('change',function(){
            common_functions();
        });



        $('.user_delete').on('click',function(){
            var y = confirm('Are you sure you want to delete');
            //alert(y);
            if(y == true){
            var grab_id = $(this).attr('data-id');
            $.ajax({
                url: base_url_user+'admin/delete_user_update/'+grab_id,
                type: 'POST',
                data: {
                },
            })
            .done(function(data) {
                
                $('.close').click();
                load_ajax_data();

            })
            .fail(function() {
                //console.log("error");
            })
            .always(function() {
                //console.log("complete");
            });

        }
        });


}
        $('.create_users').on('click',function(){
            var bool = create_form_validation();
            if(bool == true){

                var fname = $('#create_fname').val();
                var lname = $('#create_lname').val();
                var phone = $('#create_phone').val();
                var email = $('#create_email').val();

                var password = $('#create_password').val();
                var groups = $('#create_group').val();

            $.ajax({
                    url: base_url_user+'admin/create_user_callback_update',
                    type: 'POST',
                    data: {
                         first_name : fname,
                         last_name :lname,
                         phone : phone,
                         email : email,
                         password : password,
                         group : groups
                    },
                })
                .done(function(data) {
                    
                    $('.close').click();
                    load_ajax_data();

                })
                .fail(function() {
                    //console.log("error");
                })
                .always(function() {
                    //console.log("complete");
                });
            }
        });

        


        function create_form_validation(){
             
            var fname = $('#create_fname');
            var lname = $('#create_lname');
            var phone = $('#create_phone');
            var email = $('#create_email');
            var password = $('#create_password');
            var groups = $('#create_group');

            if(fname.val() == ''){
                alert('First Name is required');
                return false;
            }

            if(lname.val() == ''){
                alert('Last Name is required');
                return false;
            }
            if(email.val() == ''){
                alert('Email is required');
                return false;
            }
            if(phone.val() == ''){
                alert('Phone is required');
                return false;
            }

            if(password.val() == ''){
                alert('Password is required');
                return false;
            }
            if(groups.val() == ''){
                alert('Group is required');
                return false;
            }

            return true;
        }

});