<?php
class adminControllers{
    private $home;
    public function __construct(){
        require_once("./Models/home.php");
        $this->home = new Home() ;
    }
    public function admin(){
        if (!$this->checkAdminPermission()) {
            header("Location: ?route=login");
            exit();
        }
        $sql = "SELECT * FROM tour ORDER BY create_at DESC";
        $sql1 = "SELECT * FROM news JOIN user ON news.author_id = user.id ORDER BY create_at DESC";
        $sql2 = "SELECT * FROM bookings 
                JOIN user ON bookings.user_id = user.id
                JOIN tour ON bookings.tour_id = tour.id
                ORDER BY create_at DESC";
        
        $sql3 = "SELECT reviews.*, user.fullname,tour.id, tour.tour_name, reviews.create_at as review_create_at FROM reviews 
                JOIN user ON reviews.user_id = user.id
                JOIN tour ON reviews.tour_id = tour.id
                ORDER BY review_create_at DESC";

        $sql4 = "SELECT * FROM contact ORDER BY create_at DESC";


        $allTours = $this->home->getAll($sql);
        $allNews = $this->home->getAll($sql1);
        $allBookings = $this->home->getAll($sql2);
        $allReviews = $this->home->getAll($sql3);
        $allContact = $this->home->getAll($sql4);


        require_once "./Views/main/admin.php";

    }
    public function deleteItem() {
        
        if (empty($_GET)) {
            die("Không có dữ liệu GET");
        }

        $id = $_GET['id'] ?? null;
        $type = $_GET['type'] ?? null;
        echo "ID: $id, Type: $type";
    
        if ($id && $type) {
            $result = $this->home->delete($id, $type);
            
            switch ($type) {
                case 'tour':
                    $redirectUrl = "?route=admin&type=tour";
                    break;
                case 'news':
                    $redirectUrl = "?route=admin&type=news";
                    break;
                case 'bookings':
                    if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
                        $redirectUrl = "?route=admin&type=bookings";
                    }
                    if(isset($_SESSION['role']) && $_SESSION['role'] === 'client'){
                        $redirectUrl = "?route=client&type=bookings";
                    }
                    break;
                case 'reviews':
                    $redirectUrl = "?route=admin&type=reviews";
                    break;
                case 'contact':
                    $redirectUrl = "?route=admin&type=contact";
                    break;
                default:
                    $redirectUrl = "?route=admin";
            }
            
            if ($result) {
                header("Location: $redirectUrl&status=success");
                exit();
            } else {
                header("Location: $redirectUrl&status=error");
                exit();
            }
        }
    }
    private function checkAdminPermission() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    public function newTour(){
        if (!$this->checkAdminPermission()) {
            header("Location: ?route=login");
            exit();
        }

        if(isset($_POST["addTour"])){
            $notify = '';
            $tour_name = $_POST['tour_name'];
            $location = $_POST['location'];
            $vehicle = $_POST['vehicle'];
            $region = $_POST['region'];
            $start_location = $_POST['start_location'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $duration = $_POST['duration'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $create_at = date('Y-m-d');
            $tour_status = $_POST['tour_status'];
        
        
            move_uploaded_file($_FILES["image"]["tmp_name"], "./Views/image/".$_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image1"]["tmp_name"], "./Views/image/".$_FILES["image1"]["name"]);
            move_uploaded_file($_FILES["image2"]["tmp_name"], "./Views/image/".$_FILES["image2"]["name"]);
            move_uploaded_file($_FILES["image3"]["tmp_name"], "./Views/image/".$_FILES["image3"]["name"]);
            move_uploaded_file($_FILES["image4"]["tmp_name"], "./Views/image/".$_FILES["image4"]["name"]);


            $image = $_FILES["image"]["name"];
            $image1 = $_FILES["image1"]["name"];
            $image2 = $_FILES["image2"]["name"];
            $image3 = $_FILES["image3"]["name"];
            $image4 = $_FILES["image4"]["name"];
            $result = $this->home->insertTour($tour_name,$location,$vehicle,$region,$start_location,
            $description,$price,$duration,$image,
            $start_date,$end_date,$create_at,$tour_status,
            $image1,$image2,$image3,$image4);

            header("location: ?route=admin");
            if(!$result){
                $notify = "Thêm tour thất bại";
            }
            $notify = "Thêm tour mới thành công";
            $_SESSION["notify"] = $notify;
            
        }
        require_once "./Views/main/newTour.php";

    }
    public function addNews(){
        if (!$this->checkAdminPermission()) {
            header("Location: ?route=login");
            exit();
        }
        
        if(isset($_POST["addNews"])){
            $notify = '';
            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $content2 = $_POST['content2'];
            $content3 = $_POST['content3'];
            $status = $_POST['status'];
            $create_at = date('Y-m-d');

            $role = $_SESSION['role'];
            $user = $this->home->getUserBy('role',$role);
            $author_id = $user["id"];
        
            move_uploaded_file($_FILES["main_img"]["tmp_name"], "./Views/image/".$_FILES["main_img"]["name"]);
            move_uploaded_file($_FILES["image1"]["tmp_name"], "./Views/image/".$_FILES["image1"]["name"]);
            move_uploaded_file($_FILES["image2"]["tmp_name"], "./Views/image/".$_FILES["image2"]["name"]);
            move_uploaded_file($_FILES["image3"]["tmp_name"], "./Views/image/".$_FILES["image3"]["name"]);

            $main_img = $_FILES["main_img"]["name"];
            $image1 = $_FILES["image1"]["name"];
            $image2 = $_FILES["image2"]["name"];
            $image3 = $_FILES["image3"]["name"];
            $result = $this->home->insertNews($title, $main_img, $description, $image1,
            $content, $image2, $content2, $image3,
            $content3, $author_id, $status, $create_at);

            header("location: ?route=admin&type=news");
            if(!$result){
                $notify = "Thêm tin thất bại";
            }
            $notify = "Thêm tin mới thành công";
            $_SESSION["notify"] = $notify;
        }
        require_once "./Views/main/addNews.php";
    }

    public function editTour(){
        if (!$this->checkAdminPermission()) {
            header("Location: ?route=login");
            exit();
        }
        $id = $_GET["id"] ?? '';
        $sql= "SELECT * from tour WHERE id = ?";
        $tour = $this->home->getByID($sql,$id);

        if(isset($_POST["editTour"])){
            $notify = '';
            $tour_name = $_POST['tour_name'];
            $location = $_POST['location'];
            $vehicle = $_POST['vehicle'];
            $region = $_POST['region'];
            $start_location = $_POST['start_location'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $duration = $_POST['duration'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $create_at = date('Y-m-d');
            $tour_status = $_POST['tour_status'];
            print_r($description);
        
            if(!empty($_FILES["image"]["name"]) || !empty($_FILES["image1"]["name"]) ||
            !empty($_FILES["image2"]["name"]) || !empty($_FILES["image3"]["name"]) || !empty($_FILES["image4"]["name"])){
                move_uploaded_file($_FILES["image"]["tmp_name"], "./Views/image/".$_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image1"]["tmp_name"], "./Views/image/".$_FILES["image1"]["name"]);
                move_uploaded_file($_FILES["image2"]["tmp_name"], "./Views/image/".$_FILES["image2"]["name"]);
                move_uploaded_file($_FILES["image3"]["tmp_name"], "./Views/image/".$_FILES["image3"]["name"]);
                move_uploaded_file($_FILES["image4"]["tmp_name"], "./Views/image/".$_FILES["image4"]["name"]);
                
                $image = $_FILES["image"]["name"];
                $image1 = $_FILES["image1"]["name"];
                $image2 = $_FILES["image2"]["name"];
                $image3 = $_FILES["image3"]["name"];
                $image4 = $_FILES["image4"]["name"];
            }else{
                $image = $tour["image"];
                $image1 = $tour["image1"];
                $image2 = $tour["image2"];
                $image3 = $tour["image3"];
                $image4 = $tour["image4"];
            }
            $result = $this->home->editTour($id,$tour_name,$location,$vehicle,$region,$start_location,
            $description,$price,$duration,$image,
            $start_date,$end_date,$create_at,$tour_status,
            $image1,$image2,$image3,$image4);

            header("location: ?route=admin");
            if(!$result){
                $notify = "Sửa tour thất bại";
            }
            $notify = "Sửa tour thành công";
            $_SESSION["notify"] = $notify;
            
        }
        require_once "./Views/main/editTour.php";
    }

    public function editNews(){
        if (!$this->checkAdminPermission()) {
            header("Location: ?route=login");
            exit();
        }
        $news_id = $_GET["news_id"] ?? '';
        $sql= "SELECT * from news WHERE news_id = ?";
        $news = $this->home->getByID($sql,$news_id);

        if(isset($_POST["addNews"])){
            $notify = '';
            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $content2 = $_POST['content2'];
            $content3 = $_POST['content3'];
            $status = $_POST['status'] ?? '';
            $create_at = date('Y-m-d');

            $role = $_SESSION['role'];
            $user = $this->home->getUserBy('role',$role);
            $author_id = $user["id"];

            if(!empty($_FILES["main_img"]["name"]) || !empty($_FILES["image1"]["name"]) ||
            !empty($_FILES["image2"]["name"]) || !empty($_FILES["image3"]["name"])){
                move_uploaded_file($_FILES["main_img"]["tmp_name"], "./Views/image/".$_FILES["main_img"]["name"]);
                move_uploaded_file($_FILES["image1"]["tmp_name"], "./Views/image/".$_FILES["image1"]["name"]);
                move_uploaded_file($_FILES["image2"]["tmp_name"], "./Views/image/".$_FILES["image2"]["name"]);
                move_uploaded_file($_FILES["image3"]["tmp_name"], "./Views/image/".$_FILES["image3"]["name"]);
                
                $main_img = $_FILES["main_img"]["name"];
                $image1 = $_FILES["image1"]["name"];
                $image2 = $_FILES["image2"]["name"];
                $image3 = $_FILES["image3"]["name"];
            }else{
                $main_img = $news["main_img"];
                $image1 = $news["image1"];
                $image2 = $news["image2"];
                $image3 = $news["image3"];
            }

            $result = $this->home->editNews($news_id,$title, $main_img, $description, $image1,
            $content, $image2, $content2, $image3,
            $content3, $author_id, $status, $create_at);

            header("location: ?route=admin&type=news");
            if(!$result){
                $notify = "Sửa tin thất bại";
            }
            $notify = "Sửa tin thành công";
            $_SESSION["notify"] = $notify;
        }

        require_once "./Views/main/editNews.php";
    }
}
?>