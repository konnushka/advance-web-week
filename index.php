<?php
include("includes/database.php");


if($connection){
  //echo "success";
  $query = "SELECT name,price,description FROM products";
  //run the query
  $statement = $connection -> prepare($query);
  $statement -> execute();
  //get the result
  $result = $statement -> get_result();
}
else{
  echo "connection failed";
}
?>
<!doctype html>
<html>
  <?php include("includes/headtag.php"); ?>
    <body>
      <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">
            Website Name
          </a>
          <button class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="news.php">News</a></li>
          </ul>
        </div>
        </div>
      </nav>
      <div class="container">
        <?php
        if($result -> num_rows > 0){
            $counter=0;
          while( $row = $result -> fetch_assoc() ){
            $name = $row["name"];
            $price = $row["price"];
            $description = $row["description"];
            //add a counter to loop thro database
            
            $counter++;
            if($counter ==1){
            //create bootstrap row
            echo "<div class=\"row\">";
            }
            echo "<div class=\"col-md-6\">
            <h3>$name</h3>
            <h4 class =\"price\">$price</h4>
            <p>$description</p>
            
            </div>";
            if($counter == 2){
            echo "</div>";
            $counter=0;
            }
            //echo "<p>Product Name is $name and price is $ $price</p>";
          }
        }
        ?>
      </div>
    </body>
</html>