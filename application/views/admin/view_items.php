<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.fancybox.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css?v=jdd">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.fancybox.pack.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js?v=dfnj3e3"></script>
    <!-- <link rel="stylesheet" href="/resources/demos/style.css?v=df45"> -->
    <<!-- link type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css"></script> -->
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
            <h1 class="page-header">Item View <?=$products[0]->product_id?></h1>
            <hr>
            <div style="clear:both"></div>
            <div class="row mt">
              <div class="col-lg-12" id="">
                <div class="col-lg-8">
                  <?php
                    foreach ($filter_data[$products[0]->product_id] as $value) {
                      if ($value->mid == 48 || $value->mid == 49 || $value->mid == 50) {
                  ?>
                        <h5><b><?=$value->filter_name?></b></h5>
                        <h5>
                           <a class="fancybox" rel="gallery1" href="<?=base_url()?>assets/uploads/<?=$value->filter_value?>" title="Morning Godafoss (Brads5)">
                           <img src="<?=base_url()?>assets/uploads/<?=$value->filter_value?>" width="200px" s  alt="" />
                           </a>
                        </h5>
                  <?php
                      } else {
                  ?>
                        <h5><b><?=$value->filter_name?></b></h5>
                        <h5><?=$value->filter_value?></h5>
                  <?php
                      }
                  ?>
                    <br>
                    <hr>
                  <?php
                    }
                  ?>
                  <a href="<?=base_url()?>admin/delete_item/<?=$products[0]->product_id?>"><button class="btn">Delete</button></a>
                  <a href="<?=base_url()?>admin/item"><button class="btn">Back</button></a>
                </div>
              </div>
            </div>
          </section>
        </section>
    </section>
    <?php include_once( 'includes/site_bottom_scripts.php'); ?>

    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/admin/js/product_details.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/datatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/datatables/resources/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/datatables/dataTables.tableTools.css">

    <style type="text/css" class="init">
      div.dataTables_wrapper {
          margin-bottom: 3em;
      }
    </style>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".fancybox").fancybox({
       
    });
      });
    </script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/resources/demo.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/dataTables.tableTools.js"></script>
</body>
</html>