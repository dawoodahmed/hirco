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
        .square { 
            left: 3%;
            padding-top: 2%;
            border: 1px solid black;
            position: relative;
            width: 50vw;
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
                <h1 class="page-header">Edit Bill Form</h1>
                <hr>
                <?php 
                    foreach ($data as $value){
                ?>
                        <h4 style="margin-left: 1%;">Item Id : <?=$value->product_id?></h4>
                        <div class="row mt square">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div class="col-md-6">
                                        <label>Item Type</label>
                                        <div class="form-group">
                                             <input disabled type="text" class="form-control" value="<?=$value->type?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="col-md-6">
                                        <label>Rate per Carat</label>
                                        <div class="form-group">
                                             <input type="number" class="form-control" value="<?=$value->rate_per_carat?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="col-md-6">
                                        <label>Chaws</label>
                                        <div class="form-group">
                                             <input type="number" class="form-control" value="<?=$value->chaws?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="col-md-6">
                                        <label>Sealing</label>
                                        <div class="form-group">
                                             <input type="number" class="form-control" value="<?=$value->sealing?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="col-md-6">
                                        <label>Grading</label>
                                        <div class="form-group">
                                             <input type="number" class="form-control" value="<?=$value->grading?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="col-md-6">
                                        <label>Certificate Charg</label>
                                        <div class="form-group">
                                             <input type="number" class="form-control" value="<?=$value->certificate_charg?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                <?php
                    } 
                ?>
                <button type="submit" class="btn" id="bill">Generate bill</button>
            </section>
        </section>
    </section>

    <?php include_once( 'includes/site_bottom_scripts.php'); ?>
    <script>
    var base_url = 'http://hircolab.com/index.php/admin/';
    var carat_val = '';
    $(document).ready(function(){
        $("#bill").click(function(){
            window.location.href = "http://hircolab.com/index.php/admin/invoice";
        })
     })

        
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