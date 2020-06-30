<html>
        <head>
                <title><?php if(isset($title)) echo $title; ?></title>
        </head>
        <body>
        		        		

                <h1><?php if(isset($title)) echo $title; ?></h1>
                <p><a href="<?php echo site_url('event'); ?>">Event</a>
                <a href="<?php echo site_url('event/create'); ?>">Create Event</a>
                <a href="<?php echo site_url('user_authentication/signup'); ?>">Sign up</a>
                <a href="<?php echo site_url('user_authentication/signin'); ?>">Login</a> 
                <a href="<?php echo site_url('user_authentication/admin'); ?>">User Page</a></p>



            