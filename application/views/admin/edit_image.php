<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once( 'includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.fancybox.css">
    <script src="<?=base_url()?>assets/js/jquery.fancybox.pack.js"></script>
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
                                <?php  $name ='';
                                    foreach ($images_data as $value) {
                                        if ($value->filter_id == 48) {
                                            $name ='Certificate Image';
                                        } elseif ($value->filter_id == 49) {
                                            $name ='Image 1';
                                        } else{
                                            $name ='Image 2';
                                        }
                                        
                                ?>
                                    <h5><b><?=$name?></b></h5>
                                    <a class="fancybox" rel="gallery1" href="<?=base_url()?>assets/uploads/<?=$value->filter_value?>" title="Morning Godafoss (Brads5)">
                                        <img src="<?=base_url()?>assets/uploads/<?=$value->filter_value?>" width="200px" style="-webkit-transform:rotate(0deg);"alt="" />
                                    </a><br><br>
                                   <button class="delete_image" data-id="<?=$value->id?>"><b>Click TO Delete This Image</b></button>
                                    
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <form id="" style="" class="form-horizontal" role="form" method="post" action="<?=base_url();?>admin/add_more_images" enctype= "multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="product_id" id="product_id" value="<?=$product_id?>" >
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="master_multi_48" id="master_multi_48" class="" >
                                    </div>
                                    <div class="form-group">
                                        <lable>Image Type</lable>
                                        <select name="image_type" id="image_type" class="form-control filter_drp">
                                            <option value="">SELECT</option>
                                            <option value="certificate_image">certificate image</option>
                                             <option value="image1">image 1</option>
                                              <option value="image2">image 2</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn" id="">Submit Image Data</button>
                                    </div>
                                </form>
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
     <script type="text/javascript">
      $(document).ready(function() {
        $(".fancybox").fancybox({
        openEffect  : 'none',
        closeEffect : 'none'
    });
      });
    </script>
    <script>
    var base_url = 'http://hircolab.com/index.php/admin/';
    $(document).ready(function(){
        $('.delete_image').click(function(event) {
            var id = $(this).data("id");
            // console.log(id);
            $.ajax({
                url: base_url+'delete_images',
                type: 'POST',
                data: {id : id},
            })
            .done(function(data) {
                if (data == 'success') {
                    alert("Image DELETED Successfully");
                    window.location.reload();
                    // window.location.href = 'http://pearlsarkar.net/hirco/index.php/admin/edit_image/'+id;
                } else {
                    alert("This Image couldn't get DELETED Please try again later");
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
                window.location.reload();
            });
        });

    }); // document.ready
    </script>

</body>
</html>