
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Fitness Tracker</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="nutrition"><a href="food.php">Nutrition</a></li>
        <li class = "fitness"><a href="exercise.php">Fitness</a></li>
        <li class = "blog"><a href="#">Blog</a></li>
      
      </ul>
   
      <ul class="nav navbar-nav navbar-right">
      	<li class = "signup"><a href = "signup.php">Sign Up</a></li>
        <li class = "dropdown">
        	<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
        	
        		<div class = "dropdown-menu sign-in-dropdown">
        			
        			<form action="sign_in" method="post" accept-charset="UTF-8">
        				<label for="inputUsername">Username</label>
  						<input id="user_username"  type="text" name="user[username]" size="30" />
  						<label for="inputPW">Password</label>
  						<input id="user_password"  type="password" name="user[password]" size="30" />
  						<input id="user_remember_me" style="" type="checkbox" name="user[remember_me]" value="1" />
  						<label class="string optional" for="user_remember_me"> Remember me</label>
 
  						<input class="btn btn-primary sign-in-btn"  type="submit" name="commit" value="Sign In" />
					</form>

        		</div>
        <li class = "dropdown">
        	<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><span class="glyphicon glyphicon-search"></span></a>
        	<ul class = "dropdown-menu search" role = "menu">
        		
        		
        		<li>
        			<form class="navbar-form navbar-left" role="search">
        				<div class="form-group">
          					<input type="text" class="form-control" placeholder="Search">
        				</div>
       				 	<button type="submit" class="btn btn-sm btn-info">Submit</button>
     				 </form>
        		</li>
        		
        	</ul>
        </li>
        
    
        
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
