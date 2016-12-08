<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('includes/head.php'); ?>
     <link type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css"></script>
     <style>
        .fancybox-iframe{
          width: 100%;
          height: 600px !important;
          margin-top: 5%;
        }

        .fancybox-inner{
          height: 600px !important;
        }
     </style>
  </head>
  <body>
  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="javascript:void(0);" class="logo"><b>Menu</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                   
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?=base_url()?>index.php/auth/logout">Logout</a></li>
              </ul>
            </div>
        </header>
      <aside>
        <?php include_once('includes/sidebar.php'); ?>
      </aside>
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h1></h1>
            <hr>
            <div class="row mt">
              <div class="col-lg-12">
              <script src="http://malsup.github.com/jquery.form.js"></script> 
              <script src="<?=base_url()?>assets/admin/js/admin_tasks.js"></script>
            <?php 
                $count = count(@$all_multiple);
                if ($count) {
            ?>
                <form method="POST" action="<?=base_url();?>index.php/admin/update_images/<?=@$all_multiple['0']->product_id?>" id="myform" enctype="multipart/form-data">
                <?php
                    for ($i=0; $i < @$count; $i++) { 
                      echo "<img width='100px' src='http://pearlsarkar.net/hirco/assets/uploads/".$all_multiple[$i]->filter_value."'>";
                      echo "<input type='file' name='image_".$all_multiple[$i]->id."'/>";
                      echo "<br>";
                    }
                ?>
                  <input type="submit" id="submit" value="Submit">
                </form>
            <?php
                } else {
            ?>
              <a href="<?=base_url()?>index.php/admin/upload_images/<?=$product_id?>" class="btn iframe">Upload Multiple Images</a>
              <!-- <a id="single_image" href="<?=base_url()?>assets/images/logo.png"><img src="<?=base_url()?>assets/images/logo.png" alt=""/></a> -->
            <?php
                }
            ?>
              </div>
            </div>
      
    </section><!-- /wrapper -->
      </section><!-- /MAIN CONTENT -->
      <footer class="site-footer">
          <div class="text-center">
                
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

  <?php include_once('includes/site_bottom_scripts.php'); ?>
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
        $(".iframe").fancybox({
            type: 'iframe',
        });
    });
  </script>  
  </body>

</html>