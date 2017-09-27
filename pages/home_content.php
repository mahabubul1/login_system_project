<?php 
 ob_start();
      $obj_user = new log_user();
        $per_user=5;
        $user_list=0;
        if(isset($_GET['user_list'])){
            if($_GET['user_list']==1){
                  $user_list=0;
            }else{
               $user_list= $_GET['user_list']*$per_user-$per_user;
              
            }
        }
          $sl_info=$obj_user->select_data_pagination_user($user_list,$per_user);
       
    
       
?>


<div class="container">
    <div class="design-area">
        <div class="row">
            <div class="col-md-12">
                <?php $loginmes = session::get('loginmes');
                        if(isset($loginmes)){
                            echo $loginmes;
                        }
                        session::set('loginmes', NULL);
                
                   ?>
                <div class="row up-area">
                    <div class="col-md-6">
                        <h3>user list</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="right">
                            <h3>welcome! 
                                    <?php   $name = session::get('user_name');
                                        if(isset($name)){
                                            echo $name;
                                        }
                                    
                                    ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <tr>
                                <th width="21%">Serial</th>
                                <th width="21%">Name</th>
                                <th width="21%">Usename</th>
                                <th width="25%">Email Address</th>
                                <th width="22%">Action</th>
                               </tr>  
                            <?php foreach ($sl_info as  $value) {?>                                                             
                                <tr>
                                    <td><?php echo  $value['id'] ;?></td>
                                    <td><?php echo  $value['name'] ;?></td>
                                    <td><?php echo  $value['user_name'] ;?></td>
                                    <td> <?php echo  $value['gmail_address'] ;?></td>
                                    <td><a  class="btm btn-primary" href="profile.php?id=<?php echo  $value['id'] ;?>">view</a></td>
                                </tr>
                             <?php }?>
                        </table>
                        <?php 
                                
                            $sl_info = $obj_user->select_data();
                            $total_row =  $sl_info->rowCount($sl_info);
                            $total_user = ceil($total_row/$per_user);
                          
                           for ($i=1; $i <= $total_user; $i++){ ?>
                             
                        
                                     <a   style=" font-size:18px;font-weight:600;text-align:center;padding: 2px 5px; "  href="master_inner.php?user_list=<?php echo $i ?>  "><?php echo $i ;?></a>
                        
                        
                        <?php   }  ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

