<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            <?php if(isset($title) && $title):?>
                <?php echo ucfirst($title) . ' &middot; Sharing is Caring' ;?>
            <?php else:?>
                <?php echo 'Sharing is Caring';?>
            <?php endif;?>
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- css -->
        <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
        <!-- our JavaScript -->
        <script src="<?php echo URL; ?>public/js/application.js"></script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var oa = document.createElement('script');
            oa.type = 'text/javascript'; oa.async = true;
            oa.src = '//sharing-is-caring.api.oneall.com/socialize/library.js'
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(oa, s)
        </script> 

        <?php require('application/tools/oneall/oneall_header.php');?>

    </head>