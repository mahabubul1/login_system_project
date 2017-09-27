<?php 
      
        $obj_user= new log_user();
          $log_id= $_GET['id'];
        $result=$obj_user->select_data_id($log_id);
        if(isset($_POST['update'])){
             $message= $obj_user->user_logIn_update($_POST);
        }
  
?>


<div class="container">
    <div class="design-area">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($message)){  echo $message;}?>
                
                <div class="row up-area">
                    <div class="col-md-6">
                        <h3>user profile</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="right">
                            <h3><a class="btn btn-primary" href="master_inner.php">back</a></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name"> Your name</label>
                                <input type="text" id="name" name="name"    value="<?php  echo $result['name']?>" class="form-control"  />
                                <input type="hidden" id="name" name="id"    value="<?php  echo $result['id']?>" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <label for="User-name"> User name</label>
                                <input type="text" id="User-name" name="user_name"   value="<?php  echo $result['user_name']?>" class="form-control"   />
                            </div>
                            <div class="form-group">
                                <label for="email"> Email address</label>
                                <input type="text" id="email"   name="gmail_address" value="<?php  echo $result['gmail_address']?>"   class="form-control" >
                            </div>
                            
                            <?php    
                                 $session_id=session::get('id');
                                 if($log_id== $session_id){  ?>
                            
                                    <button type="submit" name="update" class=" btn btn-success">update</button>
                                     <a  class=" btn btn-primary" href="change_pass.php?id=<?php echo $log_id?>"> change Password</a>
                                 <?php }?>
                                    
                                
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
