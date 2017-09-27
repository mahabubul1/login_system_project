<?php 
    if(isset($_POST['resigtration'])){
         $obj_user= new log_user();
          $messege=$obj_user->user_resigtration($_POST);
        
    }


?>


<div class="container">
    <div class="design-area">
        <div class="row">
            <div class="col-md-12">
                <div class="row up-area">
                    <div class="col-md-12">
                        <h3>user Registration</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                          <?php  if(isset($messege)){ echo $messege;} ?> 
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name"> Your name</label>
                                <input type="text" id="name" name="name" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <label for="User-name"> User name</label>
                                <input type="text" id="User-name" name="user_name" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <label for="email"> Email address</label>
                                <input type="text"  name="gmail_address" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="password"> password</label>
                                <input type="password"  name="password" class="form-control" />
                            </div>
                            <button type="submit" name="resigtration" class=" btn btn-success">resigtration</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>