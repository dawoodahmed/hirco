<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css?v=jdd">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js?v=dfnj3e3"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
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
     </style>
  <script>
  $(function() {
    $( ".date_control" ).datepicker({
      dateFormat: "yy-m-dd",
    });
  });
  </script>
    
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
            <h1 class="page-header"><?=str_replace('_', " ", $this->uri->segment(2, 0))?></h1>
            <hr>
            <h2 class="page-header"><a href="<?=base_url()?>index.php/admin/add_form">Add Item</a></h2>
            <div style="clear:both"></div>
            <div class="row mt">
              <div class="col-lg-12" id="push_data">
                <style>
                    td,th {
                        padding:10px !important;
                    }

                    .report_id{
                        cursor: pointer;
                    }
                </style>
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

    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/resources/demo.js"></script>
    <script type="text/javascript" language="javascript" src="<?=base_url()?>assets/js/datatables/dataTables.tableTools.js"></script>
  <script>
    // $(document).ready(function() {
    //   $(".various").fancybox({
    //     fitToView : false,
    //     closeClick  : true,
    //     openEffect  : 'none',
    //     closeEffect : 'none'
    //   });
    // });

    $(document).ready(function() {
        $(".fancybox").fancybox({
       
    });
      });
  </script>
</body>
</html>