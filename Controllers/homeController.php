<?php
class homeControllers{
    private $home;
    public function __construct(){
        require_once("./Models/home.php");
        $this->home = new Home() ;
    }
    public function home(){
        $sql = "SELECT * from tour WHERE tour_status = 'hot'";
        $sql_famous = "SELECT * from tour WHERE tour_status = 'famous' LIMIT 3";
        $sql_bac = "SELECT * from tour WHERE region = 'Miền Bắc' LIMIT 4";
        $sql_nam = "SELECT * from tour WHERE region = 'Miền Nam' LIMIT 4";

        $arr = $this->home->getAll($sql);
        $arr_famous = $this->home->getAll($sql_famous);
        $arr_bac = $this->home->getAll($sql_bac);
        $arr_nam = $this->home->getAll($sql_nam);

        require_once "./Views/main/home.php";
    }

    public function tourDetail(){

        $id = $_GET["id"];
        $sql= "SELECT * from tour WHERE id = ?";
        $detail = $this->home->getByID($sql,$id);

        $sqlNews = "SELECT * FROM news";
        $news = $this->home->getAll($sqlNews);

        $this->comment();
        $comments = $this->home->getReviewsByTourId($id);

        require_once "./Views/main/tourdetail.php";

    }

    public function search(){
        $search_input = isset($_GET['search_input']) ? trim($_GET['search_input']) : '';
        $arr_search = $this->home->getTour($search_input);
       
        require_once './Views/main/search.php';
    }

    public function alltour(){
        $region = isset($_GET['region']) ? $_GET['region'] : null;
        $alltour = $this->home->getAllTours($region);
        require_once './Views/main/alltour.php';

    }
    public function client(){
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?route=login");
            exit();
        }
        $user_id = $_SESSION["user_id"];
        $sql = "SELECT * FROM bookings 
                JOIN user ON bookings.user_id = user.id
                JOIN tour ON bookings.tour_id = tour.id
                WHERE bookings.user_id = $user_id";
        $allBookings = $this->home->getAll($sql);

        require_once './Views/main/client.php';

    }

    public function comment() {
        $notification = '';
        if (isset($_POST["clientComment"])) {
            if (!$_SESSION["username"]) {
                return $_SESSION['notification'] = "Vui lòng đăng nhập để bình luận";
            }
            if (trim($_POST["comment"]) !== '') {
                $tour_id = $_GET["id"];
                $username = $_SESSION['username'];
                $user = $this->home->getUserBy('username', $username);
                $user_id = $user["id"];
                $comment = trim($_POST["comment"]);
                $created_at = date('Y-m-d');
    
                $this->home->insertComment($tour_id, $user_id, $comment, $created_at);
            } else {
                $_SESSION['notification'] = "Hãy nhập nội dung bình luận";
               
            }
        }
    }
    // private function checkClientPermission() {
    //     return isset($_SESSION['role']) && $_SESSION['role'] === 'client';
    // }
   
    
    



    




    
}
?>