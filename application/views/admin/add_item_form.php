<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>
</head>

<body>
    <section id="container">
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="javascript:void(0);" class="logo"></a>
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
                <h1 class="page-header">Edit Item  <?=$id?></h1>
                <hr>
                <!-- <div class="row mt">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                           <!--  <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Date:</label>
                                    <div>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label></label>
                                <div class="form-group">
                                    <button class="btn" id="date_submit">Confirm Date</button>
                                </div>
                            </div>
                            --> <!-- <div id="produc_code_sec" class="col-md-12">
                                <div class="col-md-2 col-sm-2 col-lg-2">
                                    <div class="form-group">
                                        <label></label>
                                        <div>
                                            <input type="text" class="form-control" id="mnth" name="mnth" disabled fquired>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-2 col-sm-2 col-lg-2">
                                    <div class="form-group">
                                        <label></label>
                                        <div>
                                            <input type="text" class="form-control" maxlength="4" id="last_id" name="last_id" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-lg-2">
                                    <label></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="yr_dd" name="yr_dd" disabled required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-lg-2">
                                    <label></label>
                                    <div class="form-group">
                                        <button class="btn" id="product_code">Submit Product Code</button>
                                    </div>
                                </div> -->
                            <!-- </div>
                        </div>
                    </div>  -->
                    <?php $last = end($this->uri->segments);?>
                    <form id="product_form" style="" class="form-horizontal" role="form" method="post" action="<?=base_url();?>admin/update_data/<?=$last?>" enctype= "multipart/form-data">
                        <div class="col-lg-12">
                            <div class="col-lg-8">
                                <!-- <div class="form-group">
                                    <input type="hidden" class="form-control" id="productids" name="productids">
                                </div> -->
                                <?php
                                    foreach ($data as $filter_data) {
                                        if ($filter_data[0]->value_type == 'Dropdown') {
                                            $x=$filter_data[0]->filter_value;
                                            $fil_val = explode(",", $x);
                                ?>
                                    <div class="form-group">
                                        <lable><?=$filter_data[0]->filter_name?></lable>
                                        <select name="master_dropdown_<?=$filter_data[0]->id?>" id="master_dropdown_<?=$filter_data[0]->id?>" class="form-control filter_drp">
                                            <option value="SELECT">SELECT</option>
                                            <?php if (isset($filter_value[$filter_data[0]->id]['filter_value'])){
                                            ?>
                                                <option value="<?=$filter_value[$filter_data[0]->id]['filter_value']?>" selected><?=$filter_value[$filter_data[0]->id]['filter_value']?></option>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                for ($i=0; $i < count($fil_val); $i++) { 
                                                    if ($fil_val[$i] != '0') {
                                            ?>
                                                    <option value="<?=$fil_val[$i]?>"><?=$fil_val[$i]?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            <option value="Add New">Add New</option>
                                        </select>
                                        <input type="text" name="master_dropdown_<?=$filter_data[0]->id?>_txt" id="master_dropdown_<?=$filter_data[0]->id?>_txt" class="form-control" style="display: none">
                                    </div>
                                <?php
                                        } else if ($filter_data[0]->value_type == 'Textbox') {
                                ?>
                                    <div class="form-group">
                                        <lable><?=$filter_data[0]->filter_name?></lable>
                                        <input type="text" name="master_txt_<?=$filter_data[0]->id?>" id="master_txt_<?=$filter_data[0]->id?>" class="form-control" value="<?=@$filter_value[$filter_data[0]->id]['filter_value']?>">
                                    </div>
                                <?php
                                        } 
                                    }
                                ?>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <label></label>
                                    <div class="form-group">
                                        <button type="submit" class="btn" id="product_code">Submit Product Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <?php include_once( 'includes/site_bottom_scripts.php'); ?>
<!--     // <script src="//code.highcharts.com/highcharts.js"></script>
    // <script src="//code.highcharts.com/modules/exporting.js"></script> -->
    <script>
    var base_url = 'http://hircolab.com/index.php/admin/';
    $(document).ready(function(){
        $("#produc_code_sec").hide();
        // $("#date_submit").click(function() {
        //     if ($("#date").val() != '') {
        //         $.ajax({
        //             url: base_url+'get_product_last_id',
        //             type: 'POST',
        //             data: {date : $("#date").val()},
        //         })
        //         .done(function(data){
        //             var data = JSON.parse(data);
        //             console.log(data.id);
        //             if (data.id == 'null') {
        //                 $('#mnth').val(data.month);
        //                 $('#yr_dd').val(data.year+''+data.date);
        //                 $("#produc_code_sec").show();
        //             } else {
        //                 $('#mnth').val(data.month);
        //                 $('#last_id').val(data.id);
        //                 $('#yr_dd').val(data.year+''+data.date);
        //                 $("#produc_code_sec").show();
        //             }
        //         })
        //         .fail(function() {
        //             console.log("error");
        //         })
        //         .always(function() {
        //             console.log("complete");
        //         });
        //     } else {
        //         alert("Please Enter Date");
        //     }
        // });

        // $('#product_code').click(function(event) {
        //     console.log($('#last_id').val()+$('#mnth').val()+$('#yr_dd').val());
        //     $.ajax({
        //         url: base_url+'check_id_exists',
        //         type: 'POST',
        //         data: {id: $('#mnth').val()+$('#last_id').val()+$('#yr_dd').val()},
        //     })
        //     .done(function(data) {
        //         var data = JSON.parse(data);
        //     //     if (data.product_id == 'unsuccess') {
        //     //         alert("Code Already Exists");
        //     //     } else {
        //     //         $('#productids').val(data.product_id);
        //     //         alert("Code Generated Successfully");
        //     //         $('#product_form').show();
        //     //     }
        //     // })
        //     // .fail(function() {
        //     //     console.log("error");
        //     // })
        //     // .always(function() {
        //     //     console.log("complete");
        //     // });
        // });

         $('.filter_drp').on('change', function() {
            var t1=$(this).attr('id');
            var txtid=t1+"_txt";
            console.log(txtid);
            var txtval=$(this).val();
            console.log(txtval);
            if(txtval!="SELECT"&&txtval!="Add New"){
              console.log($(this).val());
            }else if(txtval=="Add New"){
              $('#'+t1).prop('disabled', true);
              $("#"+txtid).show();
              // console.log($("#"+txtid).val());
            }

        });
    });
    </script>

</body>
</html>