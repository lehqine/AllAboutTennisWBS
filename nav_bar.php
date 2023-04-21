<nav class="navbar navbar-default" style="background-color: #DDA0DD">
  <ul class="nav navbar-nav">
    <img class="img-responsive" width="50px" height="60px" style="margin-right: 20px;" src="logo.png"></img>
  </ul>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><font face="Forte">AllAboutTennis</font></a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
       <li><a href="index.php"><font face="Times New Roman">Home</font></a></li>
      <li><a><font face="Times New Roman"><?php echo htmlspecialchars($_SESSION["position1"]).', '.htmlspecialchars($_SESSION["sname"]) ; ?></font></a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font face="Times New Roman">Menu</font><span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color: #e0ffff">
            <li><a href="products.php"><font face="Times New Roman">Products</font></a></li>
            <li><a href="customers.php"><font face="Times New Roman">Customers</font></a></li>
            <li><a href="staffs.php"><font face="Times New Roman">Staffs</font></a></li>
            <li><a href="orders.php"><font face="Times New Roman">Orders</font></a></li>
            <li class="divider"></li>
            <li><a href="password.php"><font face="Times New Roman">Reset Password</font></a></li>
            <li><a href="logout.php"><font face="Times New Roman">Log Out</font></a></li>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>