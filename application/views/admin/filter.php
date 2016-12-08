<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>
    <!-- <link rel="stylesheet" href="/resources/demos/style.css?v=df45"> -->
    <link type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css">
    </script>
    <style>
        .fancybox-iframe {
            width: 100%;
            height: 600px !important;
            margin-top: 5%;
            border: #fff solid 10px;
            border-radius: 20px;
        }
        
        .fancybox-inner {
            height: 600px !important;
        }
        
        .fancybox-outer {
            position: fixed;
        }
        
        .popupwindow {
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
                <h1 class="page-header">Filter Item</h1>
                <hr>
                <div class="col-lg-12" style="margin-left: 1%;margin-right: 9%;">
                    <div class="col-lg-6">
                        <div class="form-group">
                            
                            <form id="product_form" style="" class="form-horizontal" role="form" method="post" action="<?=base_url();?>admin/filter_data" enctype= "multipart/form-data">
                             <div class="form-group">
                                <label>Item Id</label>
                                <input type="number" class="form-control" id="id" name="id">
                             </div>
                        <?php
                        foreach ($data as $filter_data) {
                            if ($filter_data[0]->value_type == 'Dropdown') {
                                $x=$filter_data[0]->filter_value;
                                $fil_val = explode(",", $x);
                        ?>
                            <div class="form-group">
                                <lable>
                                    <?=$filter_data[0]->filter_name?>
                                </lable>
                                <select name="master_dropdown_<?=$filter_data[0]->id?>" id="master_dropdown_<?=$filter_data[0]->id?>" class="form-control filter_drp">
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
                                </select>
                            </div>
                            <?php
                                } else if ($filter_data[0]->value_type == 'Textbox') {
                                    if($filter_data[0]->id != '30' && $filter_data[0]->id != '29') {
                            ?>
                                        <div class="form-group">
                                            <lable>
                                                <?=$filter_data[0]->filter_name?>
                                            </lable>
                                            <input type="text" name="master_txt_<?=$filter_data[0]->id?>" id="master_txt_<?=$filter_data[0]->id?>" class="form-control">
                                        </div>
                            <?php
                                    }
                                } else if ($filter_data[0]->value_type == 'Decimal') {
                            ?>  
                                    <div class="form-group">
                                        <lable  style="width: 48%; float: left">
                                            <?=$filter_data[0]->filter_name?>
                                        </lable>
                                        <input type="Decimal" min="0" name="master_txt_<?=$filter_data[0]->id?>" id="master_txt_<?=$filter_data[0]->id?>"  class="form-control">
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
                                                <option value="<?=$value->name?>"><?=$value->name?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>

                                     <!-- <div class="form-group">
                                        <lable>Bill</lable>
                                        <select name="bill_status" id="bill_status" class="form-control filter_drp">
                                            <option value="">Bill Status</option>
                                            <option value="Done">Done</option>
                                             <option value="Pending">Pending</option>
                                            
                                        </select>
                                    </div> -->
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <label></label>
                                    <div class="form-group">
                                        <button type="submit" class="btn" id="product_code">Submit Details</button>
                                    </div>
                                </div> 
                    </div>
                </div>
                </form>
                </div>
            </section>
        </section>
    </section>

    <?php include_once( 'includes/site_bottom_scripts.php'); ?>
    <!--     // <script src="//code.highcharts.com/highcharts.js"></script>
    // <script src="//code.highcharts.com/modules/exporting.js"></script> -->
</body>

</html>