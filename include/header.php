<?php 
      if(isset($_GET['status']) && $_GET['status'] =='login' ){
            session::destroy();
      }

?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo">
                    <a href="">Log in register system and PDo</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="menu-area">
                    <nav>
                        <ul>
                           
                            <?php  
                                   $id=session::get('id');
                                   $userLogin = session::get('longin');
                                  if( $userLogin =='TRUE'){
                            ?>
                                    <li><a href="master_inner.php">Home</a></li>
                                   <li><a href="profile.php?id=<?php echo $id ; ?>">profile</a></li>
                                   <li><a href="?status=login">Logout</a></li>
                            
                              <?php }else{?>
                                <li><a href="index.php">Log in</a></li>
                                 <li><a href="register.php">register</a></li>
                             <?php }?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
 </header>