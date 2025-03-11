<?php
class loginControllers{
    private $user;
    public function __construct(){
        require_once("./Models/user.php");
        $this->user = new User() ;
    }
    public function login(){
        require_once "./Views/main/login.php";
        if(isset($_POST["login"])){

            $username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
            $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';
            
            $infor = $this->user->checkUser($username);
    
            if ($username !== "" && $password !== "") {

                if($infor && isset($infor["role"]) && $username === $infor["username"]&& $password === $infor["password"] ) {
                    $_SESSION["role"] = $infor["role"];
                    $user_id = $infor["id"];

                    
                    if($infor["role"] === "admin"){
                        header("location: index.php?route=admin");
                    }
                    if($infor["role"] === "client"){
                        header("location: index.php?route=client&id=$user_id");
                    }
                    $_SESSION["username"] = $infor["username"];
                    $_SESSION["user_id"] = $user_id;
                }else{
                    $error = 'Sai thông tin đăng nhập';
                }
            }else{
                $error = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu";
            } 

            if($error){
                $_SESSION["error"] = $error;
            }
        }
        
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?route=home");
        exit();
    }
}
?>