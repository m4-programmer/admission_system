<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Admission System</title>
  <meta charset="utf-8">

   <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		a{
			color:white!important;
		}
		li a:hover{
			background-color: rgb(238, 164, 18)!important;
			color:black!important;
			border:2px solid orange!important;
		
			
		}
		.apply{
			font-size: 14px;
font-weight: 400;
line-height: 25.3167px;
padding-bottom: 20px;
padding-left: 20px;
padding-right: 20px;
padding-top: 20px;
pointer-events: auto;
text-align: left
		}
	</style>
</head>
<body >



	<nav role="navigation" class=" navbar navbar-default container" style="background-color: rgb(76, 90, 125);" >
    
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if (isset($_SESSION['pin'])): ?>
               <a class="navbar-brand" ><span class="glyphicon glyphicon-home"></span>Application Form| Online student admission system

           </a>
            <?php endif ?>
            <?php if (!isset($_SESSION['pin'])): ?>
               <a class="navbar-brand" ><span class="glyphicon glyphicon-home"></span>UNN
           </a>
            <?php endif ?>
           
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
      
            
              <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['pin'])): ?>
               <li><a href="./">Home</a></li>
               	<!-- Button trigger modal -->
                
                  
                
          <li> <a class="nav-link" href="#"  data-toggle="modal" data-target="#applymodal" style="color: white"> Apply</a></li>
             <li> <a class="nav-link" href="admission_list.php" > View Admission List</a></li>
            <?php endif ?>
            <?php if (isset($_SESSION['pin'])): ?>
               <li><a href="logout.php">logout</a></li>
                
            <?php endif ?>
            </ul> 
            
        </div>
    </nav>



 