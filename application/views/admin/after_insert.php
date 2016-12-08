<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/jquery.fancybox.pack.js">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css?v=jdd">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js?v=dfnj3e3"></script>
    <link rel="stylesheet" href="/resources/demos/style.css?v=df45">
    <link type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css"></script>
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
            <h1 class="page-header">Print Page</h1>
            <hr>
              <div class="form-group">
                <a id="a" href="<?=base_url()?>admin/print_certificate/<?=$id?>"><button class="btn" data-id="<?php echo $id;?>" id="print_certificate">Print Certificate</button></a>
              </div>
              <div class="form-group">
                 <a id="a" href="<?=base_url()?>admin/print_label/<?=$id?>"><button class="btn" data-id="<?php echo $id;?>" id="print_label">Print Label</button></a>
              </div>
              <div class="form-group">
                <a href="<?=base_url()?>admin/item"><button class="btn">Back</button></a>
              </div>
          </section>
        </section>
    </section>
    <?php include_once( 'includes/site_bottom_scripts.php'); ?>
    <script>
       $(document).ready(function(){
           $("#print_certificate").click(function(){
           console.log($('#print_certificate').data('id'));
           });
            $("#print_label").click(function(){
              console.log($('#print_label').data('id'));
           });
       });
    </script>
</body>
</html>