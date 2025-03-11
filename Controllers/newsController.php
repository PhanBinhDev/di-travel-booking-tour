<?php
class newsControllers{
    private $home;
    public function __construct(){
        require_once("./Models/home.php");
        $this->home = new Home() ;
    }

    public function news(){
        $sql = "SELECT * from news";
        $sql1 = "SELECT * from news ORDER BY create_at ASC LIMIT 1";
        $sql2 = "SELECT * from news ORDER BY create_at DESC LIMIT 2";

        $arr_news = $this->home->getAll($sql);
        $arr_news1 = $this->home->getAll($sql1);
        $arr_news2 = $this->home->getAll($sql2);

        require_once "./Views/main/news.php";
    }

    public function newsDetail(){
        $sql = "SELECT * from news";
        $arr_news = $this->home->getAll($sql);

        $id = $_GET["id"];
        $sql= "SELECT * from news WHERE news_id = ?";
        $detail = $this->home->getByID($sql,$id);

        require_once "./Views/main/newsdetail.php";
    }
    public function gt(){
        require_once "./Views/layout/gt.php";

    }
    public function lh(){
        if(isset($_POST["lh"])){
            $notify = '';
            $name = $_POST["name"] ?? '';
            $email = $_POST["email"] ?? '';
            $phone = $_POST["phone"] ?? '';
            $message = $_POST["message"] ?? '';
            $create_at = date('Y-m-d');
            $result = $this->home->insertContact($name, $email, $phone, $message, $create_at);
            if(!$result){
                $notify = "Gửi liên hệ thất bại";
            }
            $notify = "Gửi liên hệ thành công";
        }
        require_once "./Views/layout/lh.php";

    }



    
}
?>