<head>
<style>
  @import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
html {

	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
}
body {
	margin: 0;
}

html, body {
	width: 100%;
	height: 100%
}
article, aside, details, figcaption, figure, footer, header, main, menu, nav, section, summary {
	display: block;
}
audio, canvas, progress, video {
	display: inline-block;
	vertical-align: baseline;
}
audio:not([controls]) {
	display: none;
	height: 0;
}

a {
	background-color: transparent;
	text-decoration: none;
}
a:active, a:hover {
	outline: 0;
}

h1,h2,h3,h4,h5,h6,p,ul,ol{ margin:0px; padding:0px;}


/***********************  TOP Bar ********************/
.sidebar{ width:220px;  background-color:#06d6a0;transition: all 0.5s  ease-in-out; }
.bg-default{background-color:#06d6a0;}
.sidebar ul{ list-style:none; margin:0px; padding:0px; }
.sidebar li a,.sidebar li a.collapsed.active{ display:block; padding:8px 12px; color:#fff;border-left:0px solid #dedede;  text-decoration:none}
.sidebar li a.active{background-color:#06d6a0;border-left:5px solid #dedede; transition: all 0.5s  ease-in-out}
.sidebar li a:hover{background-color:black !important;}
.sidebar li a i{ padding-right:5px;}
.sidebar ul li .sub-menu li a{ position:relative}
.sidebar ul li .sub-menu li a:before{
    font-family: FontAwesome;
    content: "\f105";
    display: inline-block;
    padding-left: 0px;
    padding-right: 10px;
    vertical-align: middle;
}
.sidebar ul li .sub-menu li a:hover:after {
    content: "";
    position: absolute;
    left: -5px;
    top: 0;
    width: 5px;
    background-color: #111;
    height: 100%;
}
.sidebar ul li .sub-menu li a:hover{ background-color:#222; padding-left:20px; transition: all 0.5s  ease-in-out}
.sub-menu{ border-left:5px solid #dedede;}
	.sidebar li a .nav-label,.sidebar li a .nav-label+span{ transition: all 0.5s  ease-in-out}
	

	.sidebar.fliph li a .nav-label,.sidebar.fliph li a .nav-label+span{ display:none;transition: all 0.5s  ease-in-out}
	.sidebar.fliph {
    width: 42px;transition: all 0.5s  ease-in-out;
   
}
	
.sidebar.fliph li{ position:relative}
.sidebar.fliph .sub-menu {
    position: absolute;
    left: 39px;
    top: 0;
    background-color: #222;
    width: 150px;
    z-index: 100;
}

</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>  

<div id="menu" style="float:left;width:18%">
<div class="sidebar left ">
  <ul class="list-sidebar bg-default">
   
    </li>
    <li> <a href="dashboard.php"   class="collapsed active" > <i class="fa fa-th-large "></i> <span class="nav-label"> Dashboard</span>  </a>
   
    </li>
    <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active" > <i class="far fa-calendar fa-1x" aria-hidden="true"></i>
 <span class="nav-label">Today Special</span> <span class="fa fa-chevron-left pull-right"></span> </a>
      <ul class="sub-menu collapse" id="products">
        <li class="active"><a href="todayspl.php"><i class="fas fa-plus-circle"></i>Add Menu</a></li>
      </ul>
    </li>
    <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active" ><i class="fas fa-users fa-1x" aria-hidden="true"></i>
 <span class="nav-label">Chef</span><span class="fa fa-chevron-left pull-right"></span></a>
      <ul  class="sub-menu collapse" id="tables" >
        <li><a href="our_chef.php"> <i class="fas fa-users fa-1x" aria-hidden="true"></i> Our Chefs</a></li>
        <li><a href="add_chef.php"><i class="fas fa-user-plus"></i> Add Chef</a></li>
      </ul>
    </li>
    <li> <a href="todaybills.php" data-toggle="collapse" data-target="#e-commerce" class="collapsed active" ><i class="far fa-sticky-note fa-1x"></i> <span class="nav-label">Today Bills</span><span class="fa fa-chevron-left pull-right"></a>
    <ul  class="sub-menu collapse" id="e-commerce" >
        <li><a href="todaybills.php"> <i class="fas fa-sticky-note fa-1x"></i>Bills</a></li>        
      </ul>
    </li>
    <li> <a href="#" data-target="#logoutModal" data-toggle="modal"><i class="fas fa-sign-out-alt fa-1x"></i> <span class="nav-label">Logout</span></a> </li>
  </ul>
</div>

 
</div>
 <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: salmon;">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" style="background-color: black;color:white">Do You Want Logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php" class="material-icons">Logout</a>
        </div>
      </div>
    </div>
  </div>
