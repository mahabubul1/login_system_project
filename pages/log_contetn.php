<?php 
     if(isset($_POST['login'])){
         $obj_user= new log_user();
         $messege=$obj_user->userLogin($_POST); 
        
     }
     
?>

<div class="container">
    <div class="design-area">
        <div class="row">
            <div class="col-md-12">
                <div class="row up-area">
                    <div class="col-md-12">
                        <h3>user log in</h3>
                    </div>
                </div>
                <div class="row">
                  
                    <div class="col-md-12">
                        <?php  if(isset($messege)){ echo $messege;  }?>
                        <form action="" method="post">
                           <div class="form-group">
                                <label for="email"> Email address</label>
                                <input type="text" id="email" name="gmail_address" class="form-control"  >
                                
                            </div>
                            <div class="form-group">
                                <label for="password"> password</label>
                                <input type="password" id="password" name="password" class="form-control" >
                            </div>
                            <button type="submit" name="login" class=" btn btn-success">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

