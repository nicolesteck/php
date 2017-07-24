<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8""/>
    <title>Meet this Dog</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <h2>Meet Me!</h2>
    
<?php
    require_once('connectvars.php');
    if (isset($_GET['id'])) {
        
        // Grab data from the GET
        
        $id = $_GET['id'];
        echo '<div class="centerMe confirmation">';
		echo '<p>Is this the adoptabull pupper of your dreams???</p>';
  //    echo '<p><strong>Title: </strong>' . $title . '<br /><strong>Date:'
  //            . '</strong>' . $date . '<br /><strong>Post text: </strong>' 
  //            . $blogPost . '</p>';
        echo '<form method="post" action="matchMade.php">';
        echo '<input type="radio" name="confirm" value="Yes" class="confirmRadio">Yes</input><br />';
        echo '<input type="radio" name="confirm" value="No" class="confirmRadio">No</input><br />';
        echo '<input type="submit" value="Submit" name="submit" />';
        
        echo '<input type="hidden" name="id" value="' . $id . '" />';
//      echo '<input type="hidden" name="date" value="' . $date 
//              . '" />';
//      echo '<input type="hidden" name="post" value="' . $blogPost
//              . '" />';
        echo '</form>';   
        echo '</div>';
    }
    else if (isset($_POST['id'])) {
                
        //Grab data from the POST
        $id = $_POST['id'];

     if ($_POST['confirm'] == 'Yes') {
            // If the user does actually want to meet the dog, then that dog's
            // status will be moved from available to unavailable, and that dog
            // will no longer be able to be viewed by other potential adopters
            // until it is released by an administrator. 
            
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
            // Delete the workout from the database
            $query = "UPDATE adoptabullPups set isAvailable=0 WHERE id = '$id'";
            //echo $query; 
            
            mysqli_query($dbc, $query);
            mysqli_close($dbc);
            
            // Confirm success with the user
            echo '<p class="centerMe">Thanks! This pup is now placed on Hold until you can come in and see them.</p>';
        }
        // If the user does not wind up wanting to meet this dog, provide a response message
        // but make no changes to the database. 
        else if ($_POST['confirm'] == 'No') {
            echo '<p class="centerMe">Okay, let\'s keep looking until we find your perfect adoptabull friend!</p>';
        } 
        else {
            echo '<p class="error centerMe">This pup is not available, or we experienced a technical glitch. Please try again later or come on in and we can help you out in person.</p>';
        }
    }
    
    
    
    echo '<br /><br /><p class="centerMe"><a href="index.php">&lt;&lt; Home</a></p>';
    echo '<p class="centerMe"><a href="adoptabullPups.php">&lt;&lt; Back to Adoptabull Dog Listings</a></p>';
?>

</body>
</html>