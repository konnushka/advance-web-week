
<?php
include("includes/database.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    //array to store errors in registration
$errors = array(); // can be written as array[];
$username_errors = array();
    
    //check user name
    $username=$_POST["username"];
    if(strlen($username)<6)
    {
        $errors["username"]="Minimum 6 charactors";
        //echo "Minimum 6 charactors";
    }
    if (ctype_alnum($username)==false)//cheecks if striing contains alpha numeric
    {
        $username_errors["alnum"]="can only contain alphanumeric characters";
    }
    
    $errors["username"]= implode(",",$username_errors);
    
    // verify email
    $email = $_POST["email"];
    
    if (filter_var($email,FILTER_VALIDATE_EMAIL) == false)
    {
        $errors["email"] = "invalid email address";
        
    }
    
    //check for password
    
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $password_errors = array();
    
   if ($password1 !== $password2)
   {
       $password_errors["equal"] = "passwor are not the same";
       
   }
   if (strlen($password1)< 8|| strlen($password1)< 8 )
    {
        $password_errors["lenght"]="minimum 8 characters";
        
    }
  $errors["password"]= implode(",",$password_errors);
  //count the number of errors
  
  if(count($errors)==0)
  {
      //hash the password
      $hashed = password_hash($password1,PASSWORD_DEFAULT);
      $query = "INSERT INTO accounts 
                (username,email,password,active)
                VALUES (?,?,?,1)";
    $statement =$connection -> prepare($query);
    $statement -> bind_param("sss",$username,$email,$hashed);
    $statement -> execute();
    
      
      
  }
}

?>

<!doctype html>
<html>
  <?php include("includes/headtag.php"); ?>
  <body>
    <?php include("includes/nav.php"); $page_title ="Registration Page ";?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-offset-3">
                 <!-- form -->
                <form id="register-form" method="post" action="register.php">
                    <h2>Register For An Account</h2>
                    <?php
                    if ($errors["username"])
                    {$errors_class = "has-error";
                        
                    }
                    else {
                        {$error_class=" ";}
                    }
                    ?>
                    <div class="form-group" <?php echo $error_class;?>>
                        
                        <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="username88" value=<?php $username; ?>>
                            <span class="help-block"><?php echo $errors["username"];?></span>
                       
                    </div>
                    <!-- email -->
                   
                    <div class="form-group" <?php echo $error_class;?>>
                        
                        <label for="email">Email Address</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="username@domin.com">
                            <span class="help-block"><?php echo $errors["email"];?></span>
                       
                    </div>
                    
                    
                    
                     <?php
                    if ($errors["password"])
                    {$errors_class = "has-error";
                        
                    }
                    else {
                        {$error_class=" ";}
                    }
                    ?>
                    
                     <!-- password -->
                     
                    <div class="form-group" <?php echo $error_class;?>>
                        
                        <label for="password1">Password</label>
                            <input class="form-control" type="password" name="password1" id="password1" placeholder="minimum 8 characters">
                            <span class="help-block"><?php echo $errors["password"];?></span>
                       
                    </div>
                    
                    <!-- password re check -->
                    
                    <div class="form-group" <?php echo $error_class;?>>
                        
                        <label for="password2">Password</label>
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="Re-Enter Your Password">
                            <span class="help-block"><?php echo $errors["password"];?></span>
                       
                    </div>
                    <br>
                    <button type="reset"class = "btn btn-warning">Clear Form </button>
                    <button type="submit"class = "btn btn-success">Register</button>
                    
                </form>
                
            </div>
        </div>
    
    </div>
    
    
    
</html>