//add the database
<?php include ("includes/database.php");

if (isset($_GET["search"]))
{
    
    $search_words = "%".$_GET["search"]."%"; // because we are use LIKE we add the % icons
    //create the quey
    $search_query = "SELECT id, name, price FROM products WHERE name LIKE ? OR description LIKE ?";
    ///send the query
    $statement = $connection -> prepare($search_query);
    $statement-> bind_param("ss",$search_words,$search_words);
    $statement -> excute();
    
    // get the result
    $result = $statement-> get_result();
    
    
}



?>

<?doctype html>
<html>
<?php include("includes/head.php");?>

    <body>
        <?php include("include/nav.php");?>
        
        <div class="container">
            <?php echo "Your Search for "$search_word;
            if ($result -> num_rows > 0 )
            {
                
                
                /*
                while ($row = $result -> fetch_assoc() )
                {
                    $id = $row["id"];
                    $name = $row["name"];
                    echo "div class=\"row\">
                    <div class = \"col-md-12\">
                    <h3>$name</h3>
                    <a href=\"detail.php?id=$id\">Read More</a>
                    echo "</div>";
                    
                    
                }*/
            }
            else 
            {
                echo "You Search for "$search_word;
                
            }
            
        </div>
        
        
    </body>


</html>