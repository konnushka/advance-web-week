<?php
include("includes/database.php");
//php receives the GWT parameters as an array $_array $_GET
if ( isset($_GET["id"]))
{
  $product_query = "SELECT id, name, price,  description from products WHERE id=?";
  $statement = $connection -> prepare($product_query);//works with question marks 
  $statement -> bind_param("i",$_GET["id"]);//used to filling the question mark, the type , and command
  //types of bind_param i= int, s= string, d= double and b=blob (or binary)
  
  //now lets execute the statement
  $statement -> execute();
  //get result
  $result = $statement-> get_result();
  //convert result into an array
  $product = $result->fetch_assoc();
  
  
}
?>
<!doctype html>
<html>
  <?php include("includes/headtag.php"); ?>
    <body>
      <?php include("includes/nav.php");?>
      
       <div class = "container">
         <dic class = "row">
           <div vlass = "col-mid-6 col-md-offset-3">
             <h2><?php echo $product["name"];?></h2>
             <h3 class ="price"><?php echo $product["price"];?></h3>
             <p><?php echo $product["description"];?></p>
           </div>
         </div>
       </div>
    </body>
</html>