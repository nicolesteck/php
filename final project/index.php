<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adoptabull Pups - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
    <!-- The home page contains no PHP, and is provided as the landing page -->
    
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                                                
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <h1 class="whiteOut">Adoptabull Pups!</h1>
            </div>
        </div>
    </nav>
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>
    
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class ="activeImage" src="images/home_slider-03_v2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <h3>Older dogs available</h3>
                        <p>Like this dog! *<br /><sup class="italicizeMe">* Not this actual dog.</sup></p>
                    </div>            
                </div>
    
                <div class="item">
                    <img class ="activeImage" src="images/DottyTheDalmatian.jpg" alt="Image">
                    <div class="carousel-caption">
                        <h3>Young adult dogs & puppies available</h3>
                        <p>Like this dog! *<br /><sup class="italicizeMe">*Not this actual dog.</sup></p>
                    </div>            
                </div>
            </div>
    
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
        
    <div class="container text-center">        
        <h3>Our Animals</h3><br>
        <div class="row">
            <div class="col-sm-6">
                <a href="adoptabullPups.php"><img src="images/IMG_0002.JPG" class="img-responsive width" alt="Image">
                <p>Available Pets</p></a>
            </div>
            <br /><br />
            <div class="col-sm-6 spacer">
                <div class="well">
                 <p><a href="about.html">About Us</a></p>
                </div>
                <div class="well">
                 <p><a href="https://www.paypal.com/paypalme/NicoleSteck">Donate</a></p>
                </div>
            </div>
        </div>
    </div><br>
    
    <footer class="container-fluid text-center">
        <p>Copyright Millie the Dog</p>
    </footer>

</body>
</html>
