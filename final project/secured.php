<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

</head>

<?php

    
    
    $username = 'admin';
    $password = 'admin';

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) 
    {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Blog"');
        exit('<p>Sorry, you must enter a valid user name and password to access this page.</p>
            <form class="form-horizontal" action="index.php" method="post" role="form">
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" name="back" value="back" class="btn btn-primary">Back</button>
                </div>
            </div>
            </form>');
    }
    //echo 'securing some more stuff';
?>