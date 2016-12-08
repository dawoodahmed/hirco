<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>

    <?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>

    <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <style type="text/css">

        .qq-upload-button{
            z-index: 9999;
        }
    </style>
</head>

<body>
    <section id="container">
        <div class="col-md-3 pull-right btn" id =""></div>
        <section class="wrapper site-min-height">
            <h1><?=ucfirst($this->uri->segment(2, 0))?></h1>
            <hr>
            <div class="row mt">
                <div class="col-lg-12">
                    <?php echo $output; ?>
                </div>
            </div>
        </section>
    </section>
</body>
<script type="text/javascript">
</script>
</html>