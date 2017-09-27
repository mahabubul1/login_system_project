<?php include "Database.php ";?>
<?php include "session.php ";?>
<?php 
     class log_user extends dBase{
            private  $table="log_tbl ";
            public function user_resigtration($data){
                $name = $data['name'];
                $user_name = $data['user_name'];
                $gmail_address = $data['gmail_address'];
                $password =$data['password'];
                $email_check = $this->emailCheck($gmail_address);
                  if($name== " " or  $user_name=='' or  $gmail_address== ''or   $password==" "){
                       $messege= " <div class='alert  alert-danger'> <storng> Erros !</storng>  field must not emty  </div> ";
                       return $messege;
                  }   
                   if(filter_var( $gmail_address, FILTER_VALIDATE_EMAIL) == false){
                          $messege=" <div class='alert  alert-danger'> <storng> Erros !</storng>  Email is not valid !  </div> ";
                           return $messege;
                    }
                    
                    if( $email_check== true){
                          $messege=" <div class='alert alert-danger'> <storng> errors! </storng> Email already is exits</div> ";
                            return $messege;
                    }
                 $password = md5($data['password']);
                    try {
                    
                    $resigrtation_info=$this->pdo->prepare("insert into $this->table(name,user_name, gmail_address, password)  values(:alam, :himel, :potol, :alu)");
                     $resigrtation_info->bindParam(':alam',  $name);
                     $resigrtation_info->bindParam(':himel', $user_name);
                     $resigrtation_info->bindParam(':potol', $gmail_address);
                     $resigrtation_info->bindParam(':alu',   $password);
                     $resigrtation_info->execute();
                        $messege=" <div class='alert btn-success'> <storng> successful ! </storng> Thank you  , you have been successful</div> ";
                            return $messege;

                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }   
     
            }
            
          public function emailCheck($gmail_address){
                  $gmail_check= $this->pdo->prepare(" select gmail_address from $this->table where  gmail_address=:email");
                 $gmail_check->bindValue(':email',$gmail_address);
                 $gmail_check->execute();
                 if( $gmail_check->rowCount() > 0){
                     return true;
                     
                 }else{
                     return false;
                 }
              
          }  
          public function getLogInUser($gmail_address,$password){
                    try {
                          $query= $this->pdo->prepare(" select * from $this->table where  gmail_address=:email  AND password=:password");
                          $query->bindValue(':email',$gmail_address);
                          $query->bindValue(':password',$password);
                          $query->execute();
                          $result=$query->fetch(PDO::FETCH_OBJ);
                           return $result;
                     } catch (PDOException $exc) {
                           echo $exc->getMessage();
                       }
                   }
          public function userLogin($data){
                  $gmail_address = $data['gmail_address'];
                 $password = md5($data['password']);
                 $email_check = $this->emailCheck($gmail_address);
                 if($gmail_address== ''or   $password==" "){
                       $messege= " <div class='alert  alert-danger'> <storng> Erros !</storng>  field must not emty  </div> ";
                       return $messege;
                  }   
                if(filter_var( $gmail_address, FILTER_VALIDATE_EMAIL) == false){
                          $messege=" <div class='alert  alert-danger'> <storng> Erros !</storng>  Email is not valid !  </div> ";
                           return $messege;
                    }
                    if( $email_check == false){
                          $messege=" <div class='alert alert-danger'> <storng> errors! </storng> Email address is  wrong</div> ";
                            return $messege;
                    }
                    
                   $result= $this->getLogInUser($gmail_address,$password);
                        
                   if($result){
                       session::init();
                       session::set('longin', TRUE);
                       session::set('id', $result->id);
                       session::set('name', $result->name);
                       session::set('user_name', $result->user_name);
                       session::set('gmail_address', $result->gmail_address);
                       session::set('loginmes', "<div class='alert alert-success'> <storng> success! </storng> success Log in </div>");
                       header("location:master_inner.php");
                   }else{
                         $messege=" <div class='alert  alert-danger'> <storng> Erros !</storng>  Data not found!  </div> ";
                           return $messege;
                   }
          }   
          
          public function select_data_pagination_user($user_list,$per_user){
                try {
                     $sl_info= $this->pdo->prepare(" select * from $this->table order by id DESC limit $user_list,$per_user ");
                     $sl_info->execute();
                     return $sl_info;
                } catch (PDOException  $exc) {
                    echo $exc->getMessage();
                }
                       
          }
          public function select_data(){
                try {
                     $sl_info= $this->pdo->prepare(" select * from $this->table order by id DESC");
                     $sl_info->execute();
                     return $sl_info;
                } catch (PDOException  $exc) {
                    echo $exc->getMessage();
                }
                       
          }
          public function select_data_id($log_id){
             $user_info= $this->pdo->prepare(" select * from $this->table where id='$log_id' ");
             $user_info->execute();
             $result= $user_info->fetch(PDO::FETCH_ASSOC);
               return  $result;
          }
          
         public function user_logIn_update($data){
                   try {
                        $user_up= $this->pdo->prepare("  update  $this->table  set  name= ?,user_name= ?, gmail_address=? where id= ? ");
                       $user_up->bindParam(1, $data['name']);
                       $user_up->bindParam(2, $data['user_name']);
                       $user_up->bindParam(3, $data['gmail_address']);
                       $user_up->bindParam(4, $data['id']);
                       $user_up->execute();
                       $message=" <div class='alert alert-success'> <storng> success! </storng> data update success</div> ";
                       return  $message;
                   } catch (PDOException $exc) {
                        echo $exc->getMessage();
                   }
          } 
          
          private function checkpassword($log_id,$old_password){
                   $password= md5($old_password);
                   $old_query= $this->pdo->prepare(" select  password  from $this->table where id=:id  AND  password=:password ");
                    $old_query->bindParam(':id',$log_id);
                   $old_query->bindParam(':password',$password);
                   $old_query->execute();
                   if( $old_query->rowCount() > 0 ){
                       return true;
                   }else{
                       return false;
                   }
                    
                   
          }

         public function updatePassword($log_id,$data){
                   $old_password=$data['old_pass'];
                   $new_password= $data['password'];
                   $che_pass= $this->checkpassword($log_id,$old_password);
                   if($old_password=='' ||  $new_password==''){
                       $messege= " <div class='alert  alert-danger'> <storng> Erros !</storng>  field must not emty  </div> ";
                        return $messege;
                   }
                   if( $che_pass == false){
                       $messege= " <div class='alert  alert-danger'> <storng> Erros !</storng>  Old password not exit  </div> ";
                        return $messege;
                   }
                   if(strlen($new_password < 6)){
                        $messege= " <div class='alert  alert-danger'> <storng> Erros !</storng>  new password is too short  </div> ";
                        return $messege;
                   }
               
                     $password= md5($new_password);
                   try {
                    
                        $up_pass=$this->pdo->prepare(" update $this->table set password=:password where id =:id");
                        $up_pass->bindParam(':password',$password);
                        $up_pass->bindParam(':id',$log_id);
                        $up_pass->execute();
                        $messege= " <div class='alert  alert-success'> <storng> success !</storng>  password change successfully </div> ";
                        return $messege;
                        
                   } catch (PDOException $exc) {
                            echo $exc->getMessage();
                   }
                                  
                   
                   
          }
          
          
     }

?>


