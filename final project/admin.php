<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Admin</title>
    
    
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php 
    require_once('secured.php');
    require_once('connectvars.php');
    
    // Retrieve the dogs marked as "unavailable" from the database
    $output_query = "SELECT * from adoptabullPups where isAvailable=0";
   // echo $output_query;
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                  or die("Error connecting to database.");
    $data = mysqli_query($dbc, $output_query);
    
    // Loop through the array of data, format as HTML
    $numrows = mysqli_num_rows($data);
    if ($numrows >= 1) {
        echo '<table id="adminTable">';
        echo '<tr><th>Name</th><th>Size</th><th>Breed</th><th>Narrative</th><th></th><th colspan=2>Admin Options</th></tr>';
        while ($row = mysqli_fetch_array($data)) {
            // Display score data
            echo '<tr class="row"><td><strong>' . $row['name'] . '</strong></td>';
            echo '<td>' . $row['size'] . '</td>';
            echo '<td>' . $row['breed'] . '</td>';
            echo '<td>' . $row['narrative'] . '</td>';
            echo '<td><img class="small" src=" ' . UPLOADPATH . $row['image'] . '" alt="Dog photo" /></td>';        
            echo '<td><a href="removeDog.php?id=' . $row['id'] . '">Adopted!</a>';
            echo '<td><a href="makeAvailable.php?id=' . $row['id'] . '">Make Available for Adoption</a>';
            echo '</td></tr>';
    } 
    
    echo '</table'; 
    
    // If no dogs have had their availability state altered, no results are returned.
    } else {
        echo '<p class="centerMe">No dogs require administrator adjustment at the moment.</p>';
        echo '<a href="index.php"><p class="centerMe">Home</p></a>';
    }

    
    mysqli_close($dbc);
?>