 
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand">
      Website Name
    </a>
    <form class="navbar-form navbar-left" role="search" method="get" action="search.php">
      <div class="form-group">
        <?php 
        if($_GET["search"]){ 
          $searchvalue = $_GET["search"]; 
        }
        ?>
        <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $searchvalue;?>">
      </div>
      <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
      </button>
    </form>
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
       <li><a href="register.php">Register</a></li>
       <li><a href="/phpmyadmin" target="_blank">Database</a></li>
    </ul>
  </div>
  </div>
</nav>