<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8""/>
    <title>Update Dog Availability</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <h2>Update Dog Availability</h2>
    
<?php
    require_once('connectvars.php');
    if (isset($_GET['id'])) {
        
        // Grab data from the GET
        
        $id = $_GET['id'];
		echo '<p class="centerMe">Should this dog be moved back into the adoptable pool?</p>';

        echo '<form method="post" action="makeAvailable.php" class="centerMe">';
        echo '<input type="radio" name="confirm" value="Yes" class="confirmRadio">Yes</input><br />';
        echo '<input type="radio" name="confirm" value="No" class="confirmRadio">No</input><br />';
        echo '<input type="submit" value="Submit" name="submit" />';
        
        echo '<input type="hidden" name="id" value="' . $id . '" />';

        echo '</form>';        
    }
    else if (isset($_POST['id'])) {
                
        //Grab dog data from the POST
        $id = $_POST['id'];

     if ($_POST['confirm'] == 'Yes') {
            
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
            // Delete the workout from the database
            $query = "UPDATE adoptabullPups set isAvailable=1 WHERE id = '$id' LIMIT 1";
            //echo $query; 
            
            mysqli_query($dbc, $query);
            mysqli_close($dbc);
            
            // Confirm success with the user
            echo '<p class="centerMe">This dog has been moved into the adoptable dogs pool.</p>';
        }
        
        else {
            echo '<p class="error centerMe">This dog has not been made available again.</p>';
        }
    }
    
    // If all data came through, confirm whether to move into adoption pool
    else if (isset($id)) {
        echo '<p class="centerMe">Are you sure you want to move this dog back into the available for adoption pool</p>';
        echo '<p class="centerMe"><strong>Name: </strong>' . $name . '<br /><strong>Size:'
                . '</strong>' . $size . '<br /><strong>Breed: </strong>' 
                . $breed . '</p>';
        echo '<form method="post" action="makeAvailable.php" class="centerMe">';
        echo '<input type="radio" name="confirm" value="Yes" />Yes';
        echo '<input type="radio" name="confirm" value="No" />No';
        echo '<input type="submit" value="Submit" name="submit" />';
        
        echo '<input type="hidden" name="name" value="' . $name . '" />';
        echo '<input type="hidden" name="size" value="' . $size 
                . '" />';
        echo '<input type="hidden" name="breed" value="' . $breed
                . '" />';
        echo '</form>';
    }
    
    
    echo '<p class="centerMe"><a href="index.php">&lt;&lt; Home.</a></p>';
?>

</body>
</html>