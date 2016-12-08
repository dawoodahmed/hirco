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
                <h1 class="page-header">Item Details</h1>
                <hr>
                <h3 class="page-header"><a href="<?=base_url();?>admin/add_form">Add Item</a></h3>
                <div class="row mt">
                    <div class="col-12-md">
                        <div class="col-12-lg">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Item Id</th>
                                        <?php
                                            foreach ($master_filter as $mf) {
                                        ?>
                                            <th><?=@$mf->filter_name?></th>
                                        <?php
                                            }
                                        ?>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($products as $item) {
                                            // print_r($filter_data);
                                    ?>
                                        <tr>
                                            <td><?=@$item->product_id?></td>
                                            <?php
                                                for ($i=0; $i < count($master_filter); $i++) { 
                                            ?>
                                                <?php if ($filter_data[$item->product_id][$i]->value_type == 'Image' && $filter_data[$item->product_id][$i]->filter_value != '') { ?>
                                                    <td><img src="<?=base_url();?>assets/uploads/<?=$filter_data[$item->product_id][$i]->filter_value?>" alt="" width="100px"></td>
                                                <?php } else { ?>
                                                    <td><?=$filter_data[$item->product_id][$i]->filter_value?></td>
                                                <?php } ?>
                                            <?php
                                                }
                                            ?>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <?php include_once( 'includes/site_bottom_scripts.php'); ?>
<!--     // <script src="//code.highcharts.com/highcharts.js"></script>
    // <script src="//code.highcharts.com/modules/exporting.js"></script> -->
    <script>
    var base_url = 'http://pearlsarkar.net/hirco/index.php/admin/';
    $(document).ready(function(){
    }); // document.ready
    </script>

</body>
</html>