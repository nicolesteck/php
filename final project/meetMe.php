<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Meet this Dog!</title>
    
    
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
    require_once('connectvars.php');
    
    // Retrieve the data from MySQL
    $id = $_GET['id'];
    $output_query = "SELECT * FROM adoptabullPups WHERE id = '$id'";
   // echo $output_query;
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                  or die("Error connecting to database.");
    $data = mysqli_query($dbc, $output_query);
    
    // Loop through the array of data, format as HTML
    echo '<table class="dogsTable" id="meetMeTable">';
    echo '<tr><th>Name</th><th>Age</th><th>Size</th><th>Sex</th><th>Fixed?</th><th>Breed</th><th> </th></tr>';
    while ($row = mysqli_fetch_array($data)) {
        // Display the selected dog
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';
        echo '<td>' . $row['size'] . '</td>';
        echo '<td>' . $row['sex'] . '</td>';
        // reformat the isFixed boolean to be legible to end users
        if ($row['isFixed'] == 1) {
            $row['isFixed'] = 'fixed';                                
        } else if ($row['isFixed'] == 0) {
            $row['isFixed'] = 'not fixed';
        }
        echo '<td>' . $row['isFixed'] . '</td>';
        echo '<td>' . $row['breed'] . '</td>';
        echo '<td><img class="small" src=" ' . UPLOADPATH . $row['image'] . '" alt="Dog photo" /></td>';
     // echo '<td>' . $row['image'] . '</td>';
        echo '</tr><tr>';
        echo '<td colspan=6>' . $row['narrative'] . '</td>';
        echo '<td></td>';
        echo '<tr><td colspan=7 class="colorMe"><br /> </td></tr><tr></tr>';
        echo '<tr><td colspan=7><a href="matchMade.php?id=' . $row['id'] . '">Meet Me!</a>';
        echo '</td></tr>';

    } 
    
    echo '</table';
    
    
?>