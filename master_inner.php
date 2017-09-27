<?php 
     include 'classes/login_data.php';
?>
<?php 
     session::init(); 
     session::sessionCheck();
     
     
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title> facebook log in system </title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
    </head>
    <body>
        <?php include 'include/header.php';?>
        <section class="mainArea">
                 <?php 
                    if(isset($pages)){
                        if($pages=='profile'){
                            include './pages/profile_content.php';
                            
                        }elseif($pages=="change_pass"){
                             include './pages/change_pass_content.php';
                        }
                       
                       }else{
                           include './pages/home_content.php';
                       }
                ?> 
            
        </section>
        <?php include 'include/footer.php';?>
        
        <script type="text/javascript"  src="assets/js/jquery-1.12.0.min " ></script>
        <script type="text/javascript"  src="assets/js/bootstrap.min " ></script>
    </body>
</html>








