<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adoptabull Pups - Our Pups</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                                                
            </button>
            <a class="navbar-brand" href="#">Adoptabull Pups!</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="adoptabullPups.php">Adoptable Dogs</a></li>
         </ul>

        </div>
    </div>
</nav>
    
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <h3 class="italicizeMe">Thank you for supporting the vital work we at Adoptabulls seek to do.</h3>
            <p>Adoptabull Dogs was founded in 2017, as a way for a dog-crazed midwest transplant to force a group of classmates to look at pictures of adorable dogs for 7-10 minutes on a Wednesday night. </p>
            <img src>
        </div>
        <div class="col-sm-8 text-left">
            <h2>Find your perfect dog!</h2>
            <div class="form">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="age">Age:</label>
                    <select name="age">
                        <option value="%">No preference</option>
                        <option value="senior">Senior</option>
                        <option value="adult">Adult</option>
                        <option value="puppy">Puppy</option>
                    </select><br />
                    <label for="size">Size:</label>
                    <select name="size">
                        <option value="%">No preference</option>
                        <option value="xl">75+ lbs</option>
                        <option value="large">50-75 lbs</option>
                        <option value="medium">30-50 lbs</option>
                        <option value="small">10-30 lbs</option>
                        <option value="xs">1-10 lbs</option>
                    </select><br />
                    <label for="sex">Sex</label>
                    <select name="sex">
                        <option value="%">No preference</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select><br />
                    <label for="fixed">Fixed?</label>
                    <select name="isFixed">
                        <option value="%">No preference</option>
                        <option value="1">Fixed</option>
                        <option value="0">Unfixed</option>
                    </select><br />   
                    <label for="breed">Breed</label>
                    <input type="text" id="breed" name="breed" 
                            value="<?php if (!empty($breed)) echo $breed; ?>" /><br />
                 
                    <hr />
                    <input type="submit" value="Search" name="submit" />
                </form>
            </div>
            
            
            <h1>Available Dogs</h1>
            
                <?php
                $debug = false;
                if ($debug) {
                    echo "<!--";
                    echo "hi";
                    echo "-->";
                }
                
                if ($debug) {print_r($_POST);}
                require_once('connectvars.php');
                
                // Connect to the database
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                                or die("Error connecting to database.");
                
                // Since the form hasn't been submitted yet, start out by 
                // showing all available dogs
                if (!isset($_POST['submit'])) {                
                    $query = "SELECT * FROM adoptabullPups WHERE isAvailable=1";
                    
                    $data = mysqli_query($dbc, $query)
                                    or die("Error querying DB_NAME. The query was: $query");
                    
                    $numrows = mysqli_num_rows($data);
                        
                    if ($debug) {echo "<h1>number of rows: $numrows</h1>";}
                                
                } else {
                   
                    // Assemble the query if the form's been submitted
                    $isFixed = $_POST['isFixed'];
                    
                    if (empty(age)) {
                        $age = '%';
                    } else {
                        $age = $_POST['age'];
                    }
                    
                    if (empty(size)) {
                        $size = '%';    
                    } else {
                        $size = $_POST['size'];
                    }
                    
                    if (empty(sex)) {
                        $sex = '%';
                    } else {
                        $sex = $_POST['sex'];
                    }
                    
                    if (empty(breed)) {
                        $breed = '%';
                        if ($debug) {echo "empty breed: $breed";}
                    } else {
                        $breed = $_POST['breed'];
                        if ($debug) {echo "populous breed: $breed";}
                    }
                    
                   if ($debug) {
                        echo "age: $age";
                        echo "<br />";
                        //echo $weight;
                        echo "<br />size: $size";
                        echo "<br />is fixed? $isFixed<br />";
                        echo "sex: $sex";
                        echo "<br /> breed $breed";
                   }
                    
                    // Connect to the database
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                            or die("Error connecting to database.");
              
                    // Search the database 
                    $query = "SELECT * FROM adoptabullPups WHERE "
                            . "age LIKE '$age' AND sex LIKE '%$sex' AND size "
                            . "LIKE '$size' AND breed LIKE '%$breed%' AND isFixed LIKE '$isFixed' AND isAvailable LIKE '1'";
                            // AND sex = '$sex'
                            
                            if ($debug) {echo "<h1> $query </h1>";}
                            
                    $data = mysqli_query($dbc, $query)
                            or die("Error querying database.");
                            
                    $numrows = mysqli_num_rows($data);
                    
                    if ($debug) {echo "<h1>number of rows: $numrows</h1>";}
                            
                            
              
//                  // Confirm success with the user
//                  echo '<p>Thanks for adding your new high score!</p>';
//                  echo '<p><strong>Name:</strong> ' . $name . '<br />';
//                  echo '<strong>Score:</strong> ' . $score . '</p>';
//                  echo '<img src="' . GW_UPLOADPATH . $screenshot 
//                          . '" alt="Score image" />';
//                  echo '<p><a href="index.php">&lt;&lt; '
//                          . 'Back to high scores</a></p>';
//            
//                  // Clear the score data to clear the form
//                  $name = "";
//                  $score = "";
//                  $screenshot = "";
              
                    mysqli_close($dbc);
                    
                    unset($_POST);

                }
                
                // When there are results returned, loop through the data & format
                if ($numrows > 0) {
                    
                    echo '<div>';
                    echo '<table class="dogsTable">';
                    echo '<tr><th>Name</th><th>Age</th><th>Size</th><th>Sex</th><th>Fixed?</th><th>Breed</th><th> </th></tr>';
                    while ($row = mysqli_fetch_array($data)) {
                            // Display score data
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['age'] . '</td>';
                            echo '<td>' . $row['size'] . '</td>';
                            echo '<td>' . $row['sex'] . '</td>';
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
                    
                            echo '<td><a href="meetMe.php?id=' . $row['id'] . '">Meet Me!</a>';
                            echo '<tr><td colspan=7 class="colorMe"><br /> </td></tr><tr></tr>';
                            echo '</td></tr>';
                    } 
                } else {
                        // If no results are returned, return a message saying as much
                        echo '<div class="dogsTable">';
                        echo '<table>';
                        echo '<tr class="centerMe">No results found.</p>';
                        echo '<tr class="centerMe">Search again above, or click Search without entering any values to view all dogs.</p>';
                        echo '</table>';
                }
        
                echo '</table>';
                echo '</div>';
               
        
                ?>
                
            <hr /><br /><br /><br />


        </div>
        
        <div class="col-sm-2 sidenav">
            <img class="rightBar" src="images/IMG_4283.jpg" />
            <p class="centerMe italicizeMe" >Always a slumber party here at AdoptabullPups.</p>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p><a href="admin.php">Administrator Login</a></p>
</footer>

</body>
</html>
