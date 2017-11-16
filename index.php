<?php
include("includes/database.php");


if($connection){
  //echo "success";
  $query = "SELECT id,name,price,description FROM products";
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
      <?php include("includes/nav.php");?>
      <div class="container">
        <?php
        if($result -> num_rows > 0){
            $counter=0;
          while( $row = $result -> fetch_assoc() ){//converts results into an array
            $id = $row["id"];
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
            <p><a href=\"detail.php?id=$id\">Product details</a> </p>
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