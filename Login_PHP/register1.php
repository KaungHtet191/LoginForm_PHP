<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
    rel="stylesheet"
    />
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-3">
                <div class="text-center">
                    <a href="login1.php">
                        <button class="btn bg-primary text-white mb-3" style="width:200px">Login</button>
                    </a>
                </div>
                <div class="text-center">
                    <a href="register1.php">
                        <button class="btn bg-success text-white mb-3" style="width:200px">Register</button>
                    </a>
                </div>
                <div class="text-center">
                    <a href="logout1.php">
                        <button class="btn bg-danger text-white mb-3" style="width:200px">Logout</button>
                    </a>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                      Register
                      <form action="" method="POST">
                      <div class="mb-3">
                           <label for="">Name</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label for="">Email</label>
                           <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label for="">Password</label>
                           <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label for="">Confirm Password</label>
                           <input type="password" name="confirmPassword" class="form-control">
                        </div>
                        <button name="register" type="submit" class="btn bg-dark text-white float-end">Register</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    //session_start();
    function CheckStrongPassword($password){
        $upperStatus=false;
        $lowerStatus=false;
        $numberStatus=false;
        $specialStatus=false;

        if(preg_match('/[A-Z]/',$password)){
            $upperStatus==true;
        }
        if(preg_match('/[a-z]/',$password)){
            $lowerStatus=true;
        }
        if(preg_match('/[0-9]/',$password)){
            $numberStatus=true;
        }
        if(preg_match('/[!@#$%^&*]/',$password)){
            $specialStatus=true;
        }
        if($upperStatus=true && $lowerStatus=true && $numberStatus=true && $specialStatus=true){
            return true;
        }
        else{
            return false;
        }
    }
    CheckStrongPassword("KaungHtet@^#*&145");
    if(isset($_POST["register"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirmPassword=$_POST["confirmPassword"];
        
        if($name!="" && $email!="" && $password!="" && $confirmPassword!=""){
            if(strlen($password)>=6 && strlen($confirmPassword)>=6){
                if($password==$confirmPassword){
                    $status=CheckStrongPassword($password);
                    if($status){
                    $_SESSION["email"]=$email;
                    $_SESSION["passsword"]=password_hash($password,PASSWORD_BCRYPT);
                    echo "Register Successful!";
                    }    
                }else{
                    echo "Passwords are not the same";
                }
            }else{
                echo "Password must be greater than 6";
            }
        }
        else{
            echo "Need to fill";
        }
    }
    ?>
</body>
</html>