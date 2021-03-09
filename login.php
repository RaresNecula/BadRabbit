<?php
  

if(isset($_POST['but_submit'])){   //login
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
            header('Location: login.php');
        }else{
            echo "Invalid username and password";
        }

    }

}

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'logout')   //logout
{
  $_SESSION = array(); 
  session_destroy();
  echo "<meta http-equiv='Refresh' content='0; url=login.php'>"; 
  exit;
}
?>


  <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">

    <!-- ============================ COMPONENT LOGIN   ================================= -->
        <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
          <div class="card-body">
          <h4 class="card-title mb-4">Sign in</h4>
          <form action="" method="POST">
                <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  Sign in with Facebook</a>
                <a href="#" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  Sign in with Google</a>
              <div class="form-group">
                 <input name="" class="form-control" placeholder="Username" type="text">
              </div> <!-- form-group// -->
              <div class="form-group">
                <input name="" class="form-control" placeholder="Password" type="password">
              </div> <!-- form-group// -->
              
              <div class="form-group">
                  <a href="#" class="float-right">Forgot password?</a> 
                <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> Remember </div> </label>
              </div> <!-- form-group form-check .// -->
              <div class="form-group">
                  <button type="submit" class="btn btn-dark btn-block" name="but_submit"> Login  </button>
              </div> <!-- form-group// -->    
          </form>
          </div> <!-- card-body.// -->
        </div> <!-- card .// -->
    
         <p class="text-center mt-4">Don't have account? <a href="#">Sign up</a></p>
         <br><br>
    <!-- ============================ COMPONENT LOGIN  END.// ================================= -->
    
    
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    
    
    <!-- ========================= FOOTER ========================= -->
  