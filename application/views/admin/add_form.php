<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>
  <link rel="stylesheet" href="/resources/demos/style.css?v=df45">
     <link type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css"></script>
     <style>
        .fancybox-iframe{
          width: 100%;
          height: 600px !important;
          margin-top: 5%;
          border: #fff solid 10px;
          border-radius: 20px;
        }

        .fancybox-inner{
          height: 600px !important;
        }

        .fancybox-outer{
            position: fixed;
        }
        .popupwindow{
            display: none;
            width: 100%;
            text-align: right;
            float: right;
        }

     </style>
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
                <h1 class="page-header">Add Item</h1>
                <hr>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="col-md-6">
                                <div class="form-group" id="date_div">
                                    <label>Select Date:</label>
                                    <div>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6" id="carat_div">
                                <label>Enter Carat</label>
                                <div class="form-group">
                                     <input type="number" class="form-control" id="carat" name="carat">
                                </div>
                            </div>
                            <div class="col-md-6" id="date_submit_div">
                                <label></label>
                                <div class="form-group">
                                    <button class="btn" id="date_submit">Submit</button>
                                </div>
                            </div>
                            <div id="produc_code_sec" class="col-md-12">
                                <div class="col-md-2 col-sm-2 col-lg-2" id="mnth_div">
                                    <div class="form-group">
                                        <label></label>
                                        <div>
                                            <input type="text" class="form-control" id="mnth" name="mnth" disabled required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-lg-2" id="last_id_div">
                                    <div class="form-group">
                                        <label></label>
                                        <div>
                                            <input type="text" class="form-control" maxlength="4" id="last_id" name="last_id" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-lg-2" id="yr_dd_div">
                                    <label></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="yr_dd" name="yr_dd" disabled required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-lg-2" id="product_code_div">
                                    <label></label>
                                    <div class="form-group">
                                        <button class="btn" id="product_code">Submit Product Code</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="product_form" style="display: none" class="form-horizontal" role="form" method="post" action="<?=base_url();?>admin/insert_productdetails" enctype= "multipart/form-data">
                        <div class="col-lg-12" style="margin-left: 1%;margin-right: 9%;">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <p style="font-size: 30px;font-weight: bold;" id="item_id"></p>
                                <?php //print_r($data);?>
                                    <input type="hidden" class="form-control" id="productids" name="productids">
                                </div>
                                <?php
                                    foreach ($data as $filter_data) {
                                        if ($filter_data[0]->value_type == 'Dropdown') {
                                            $x=$filter_data[0]->filter_value;
                                            $fil_val = explode(",", $x);
                                ?>
                                    <div class="form-group">
                                        <lable><?=$filter_data[0]->filter_name?></lable>
                                        <select name="master_dropdown_<?=$filter_data[0]->id?>" id="master_dropdown_<?=$filter_data[0]->id?>" class="form-control filter_drp"> 
                                            <?php 
                                              if($filter_data[0]->id != 4){
                                            ?>
                                                <option value="SELECT">SELECT</option>
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
                                            <?php 
                                               }else{
                                                    foreach ($type as $key => $value) {                 
                                            ?>
                                                         <option value="<?=$value['type']?>"><?=$value['type']?></option>
                                            <?php 
                                                    }
                                               }
                                            ?>
                                        </select>
                                        <input type="text" name="master_dropdown_<?=$filter_data[0]->id?>_txt" id="master_dropdown_<?=$filter_data[0]->id?>_txt" class="form-control" style="display: none">
                                    </div>
                                <?php
                                        } else if ($filter_data[0]->value_type == 'Textbox') {
                                ?>
                                    <div class="form-group">
                                    <?php 
                                           if($filter_data[0]->filter_name != 'customer name' && $filter_data[0]->filter_name !='bill'){?>
                                            <lable><?=$filter_data[0]->filter_name?></lable>
                                            <input type="text" name="master_txt_<?=$filter_data[0]->id?>" id="master_txt_<?=$filter_data[0]->id?>" class="form-control">
                                    <?php  }  ?>
                                    </div>
                                <?php
                                           
                                        } else if ($filter_data[0]->value_type == 'Decimal') {
                                ?>
                                    <div class="form-group">
                                        <lable><?=$filter_data[0]->filter_name?></lable>
                                        <input type="Decimal"  min="0" name="master_txt_<?=$filter_data[0]->id?>" id="master_txt_<?=$filter_data[0]->id?>" class="form-control">
                                    </div>
                                <?php
                                        } else if ($filter_data[0]->value_type == 'Image') {
                                ?>
                                    <div class="form-group">
                                        <lable><?=$filter_data[0]->filter_name?></lable>
                                        <input type="file" name="master_img_<?=$filter_data[0]->id?>" id="master_img_<?=$filter_data[0]->id?>" class="">
                                    </div>
                    
                                <?php
                                        }
                                    }
                                ?>

                                    <div class="form-group">
                                        <lable>Customer Name</lable>
                                        <select name="customer_name" id="customer_name" class="form-control filter_drp">
                                            <option value="">SELECT Customer Name</option>
                                            <?php foreach ($customer as  $value) {  ?>
                                                <option value="<?=$value->id?>"><?=$value->name?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>

                                     <div class="form-group">
                                        <lable>Bill</lable>
                                        <select name="bill" id="bill" class="form-control filter_drp">
                                            <option value="">Bill Status</option>
                                            <option value="Done">Done</option>
                                             <option value="Pending">Pending</option>
                                            
                                        </select>
                                    </div>

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
    var carat_val = '';
    $(document).ready(function(){
        $("#clickpop").click(function(){
            $(".popupwindow").show();
            document.getElementById("ifr").src="http://hircolab.com/index.php/admin/add_images/";
        })

        $(".closebtn").click(function(){
            $(".popupwindow").hide();
        })
        // $(".fancybox").fancybox({
        //     type: 'iframe',
        // });

        $(".fancybox").click(function(){
            window.open("popUpDiv");
            document.write('<iframe height="450"  allowTransparency="true" frameborder="0" scrolling="yes" style="width:100%;" src="http://hircolab.com/index.php/admin/add_images/" type= "text/javascript"></iframe>');
        })

        $("#produc_code_sec").hide();
        $("#date_submit").click(function() {
            // console.log($("#date").val());
            // console.log($("#carat").val());
            if ($("#date").val() != '') {
                $.ajax({
                    url: base_url+'get_product_last_id',
                    type: 'POST',
                    data: {date : $("#date").val(),carat :$("#carat").val()},
                })
                .done(function(data){ 
                    var data = JSON.parse(data);
                    console.log(data.id);
                    if (data.id == 'null') {
                        $('#mnth').val(data.month);
                        $('#yr_dd').val(data.year);
                        $('#carat').val(data.carat);
                        $("#produc_code_sec").show();
                    } else {
                        $('#mnth').val(data.month);
                        $('#last_id').val(data.id);
                        $('#yr_dd').val(data.year);
                        $('#carat').val(data.carat);
                        $("#produc_code_sec").show();
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            } else {
                alert("Please Enter Date");
            }
        });

        $('#product_code').click(function(event) {
            var str = $('#carat').val();
            var carat_dec = str.split(".");
            $.ajax({
                url: base_url+'check_id_exists',
                type: 'POST',
                data: {id: $('#mnth').val()+$('#last_id').val()+$('#yr_dd').val()+carat_dec[1], date: $("#date").val(), auto_generated_id: $('#last_id').val(),carat : $('#carat').val() },
            })
            .done(function(data) {
                var data = JSON.parse(data);
                // console.log(data);
                if (data.product_id == 'unsuccess ') {
                    alert("Code Already Exists");
                } else {
                    var carat_val = data.carat ;
                    $('#master_txt_20').val(carat_val);
                    $('#productids').val(data.product_id);
                    alert("Item ID :"+data.product_id);
                    $('#item_id').text("Item ID : "+data.product_id);
                    $('#date_div').hide();
                    $('#date_submit_div').hide();
                    $('#mnth_div').hide();
                    $('#last_id_div').hide();
                    $('#yr_dd_div').hide();
                    $('#carat_div').hide();
                    $('#product_form').show();
                    $('#product_code_div').hide();
                    
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        });

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
    }); // document.ready
    </script>
  <script>
    // $(document).ready(function() {
    //   $(".various").fancybox({
    //     fitToView : false,
    //     closeClick  : true,
    //     openEffect  : 'none',
    //     closeEffect : 'none'
    //   });
    // });
  </script>
</body>
</html>