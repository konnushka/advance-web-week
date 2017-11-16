
<nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">
            Website Name
          </a>
          //SEARCH BAR
          
         <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" method ="get" action = "search.php">
              </div>
                  <button type="submit" name="search" class="btn btn-default">
                      <span class = "glyphicon glyphicon-search">
                          
                      </span>
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
          </ul>
        </div>
        </div>
</nav>
      