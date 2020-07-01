<html>
        <head>
                <title><?php if(isset($title)) echo $title; ?></title>
        </head>
        <body>
        		        		

                <h1><?php if(isset($title)) echo $title; ?></h1>
                <p><a href="<?php echo site_url(); ?>">Domov</a>
                <a href="<?php echo site_url('event'); ?>">Dogodki</a>
                <a href="<?php echo site_url('user_authentication/signup'); ?>">Registracija</a>
                <a href="<?php echo site_url('user_authentication/signin'); ?>">Prijava</a> 
                <a href="<?php echo site_url('user_authentication/admin'); ?>">Osebna stran</a></p>



            