<?php   
     
      if(isset($_GET["id"])){
           $log_id= $_GET['id'];
           $session_id=session::get('id');
            if($log_id != $session_id){ 
                header("Location:master_inner.php ");
            }
      }
      
      
         $obj_user= new log_user();
         if(isset($_POST['update_pass'])){
              $messege=$obj_user->updatePassword($log_id,$_POST);
          
         }
    

?>
<div class="container">
    <div class="design-area">
        <div class="row">
            <div class="col-md-12">
               
                <div class="row up-area">
                
                    <div class="col-md-6">
                        <h3>change password</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="right">
                            <h3><a class="btn btn-primary" href="profile.php?id=<?php echo $log_id ;?>">back</a></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if(isset($messege)){ echo $messege;}?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="old_pass"> Old Password</label>
                                <input type="password" id="id" name="old_pass" class="form-control"  />
                               
                            </div>
                            <div class="form-group">
                                <label for="new Password"> New Password</label>
                                <input type="password" id="id" name='password' class="form-control"   />
                            </div>
                            <button type="submit" name="update_pass" class=" btn btn-success">update password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>