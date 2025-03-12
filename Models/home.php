<?php
class Home{
    private $conn;
    public function __construct(){
        include('Connect.php');
        $this->conn = $conn;
    }
    
    public function getAll($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getByID($sql,$id){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }
    public function getUserBy($column, $value) {
        $sql = "SELECT * FROM user WHERE $column = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$value]);
        return $stmt->fetch();
    }

    public function insertComment($tour_id, $user_id, $comment, $created_at){
        $sql = "INSERT INTO reviews (tour_id, user_id, comment, created_at)
                VALUES('$tour_id', '$user_id', '$comment', '$created_at')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function insertContact($name, $email, $phone, $message, $created_at){
        $sql = "INSERT INTO contact (name,email,phone,message, created_at)
                VALUES('$name', '$email', '$phone', '$message', '$created_at')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function getReviewsByTourId($tour_id) {
        $sql = "SELECT reviews.*, user.username
                FROM reviews 
                JOIN user ON reviews.user_id = user.id 
                WHERE reviews.tour_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$tour_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getTour($search_input = '') {
        if (empty($search_input)) {
            return [];
        }
        $sql = "SELECT * FROM tour WHERE tour_name LIKE ? OR location LIKE ? ";
        $search_param = "%$search_input%";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$search_param, $search_param]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getAllTours($region = null) {
        $sql = "SELECT * FROM tour ORDER BY created_at DESC";
        $sql1 = "SELECT * FROM tour";
        
        if (!empty($region)) {
            $sql1 .= " WHERE region = ? ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($sql1);
            $stmt->execute([$region]);
        } else {
            $stmt = $this->conn->query($sql);
        }
        
        return $stmt->fetchAll();
    }
    
    public function delete($id, $type) {
        try {
            $this->conn->beginTransaction();
    
            switch ($type) {
                case 'tour':
                    $sqlDeleteBookings = "DELETE FROM bookings WHERE tour_id = ?";
                    $stmtBookings = $this->conn->prepare($sqlDeleteBookings);
                    $stmtBookings->execute([$id]);
    
                    $sqlDeleteReviews = "DELETE FROM reviews WHERE tour_id = ?";
                    $stmtReviews = $this->conn->prepare($sqlDeleteReviews);
                    $stmtReviews->execute([$id]);
    
                    $sqlDeleteTour = "DELETE FROM tour WHERE id = ?";
                    $stmtTour = $this->conn->prepare($sqlDeleteTour);
                    $stmtTour->execute([$id]);
                    break;
    
                case 'news':
                    $sqlDeleteNews = "DELETE FROM news WHERE news_id = ?";
                    $stmtNews = $this->conn->prepare($sqlDeleteNews);
                    $stmtNews->execute([$id]);
                    break;
    
                case 'bookings':
                    $sqlDeleteBooking = "DELETE FROM bookings WHERE bookings_id = ?";
                    $stmtBooking = $this->conn->prepare($sqlDeleteBooking);
                    $stmtBooking->execute([$id]);
                    break;
    
                case 'reviews':  
                    $sqlDeleteReview = "DELETE FROM reviews WHERE reviews_id = ?";
                    $stmtReview = $this->conn->prepare($sqlDeleteReview);
                    $stmtReview->execute([$id]);
                    break;

                case 'contact':  
                    $sqlDeleteContact = "DELETE FROM contact WHERE id = ?";
                    $stmtContact = $this->conn->prepare($sqlDeleteContact);
                    $stmtContact->execute([$id]);
                    break;
    
                default:
                    throw new Exception("Loại danh mục không hợp lệ");
            }
    
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    public function insertTour($tour_name,$location,$vehicle,$region,$start_location,
                                $description,$price,$duration,$image,
                                $start_date,$end_date,$created_at,$tour_status,
                                $image1,$image2,$image3,$image4){
        $sql = "INSERT INTO tour( tour_name, location, vehicle, region, start_location,
                                    description,price, duration, image,
                                    start_date,end_date,created_at, tour_status,
                                    image1, image2, image3, image4)
                VALUES('$tour_name','$location','$vehicle','$region','$start_location',
                        '$description','$price','$duration','$image',
                        '$start_date','$end_date','$created_at','$tour_status',
                       ' $image1','$image2','$image3','$image4')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function insertNews($title, $main_img, $description, $image1,
                                $content, $image2, $content2, $image3,
                                $content3, $author_id, $status, $created_at){
        $sql = "INSERT INTO news(title, main_img, description, image1, content, image2, content2,
                                image3, content3, author_id, status, created_at)
                VALUES('$title', '$main_img', '$description', '$image1',
                        '$content', '$image2', '$content2', '$image3',
                        '$content3', '$author_id', '$status', '$created_at')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function editTour($id,$tour_name,$location,$vehicle,$region,$start_location,
                            $description,$price,$duration,$image,
                            $start_date,$end_date,$created_at,$tour_status,
                            $image1,$image2,$image3,$image4){

        $sql = "UPDATE tour SET tour_name = '$tour_name',
                                    location = '$location',
                                    vehicle = '$vehicle',
                                    region = '$region',
                                    start_location = '$start_location',
                                    description = '$description',
                                    price = '$price',
                                    duration = '$duration',
                                    image = '$image',
                                    start_date = '$start_date',
                                    end_date = '$end_date',
                                    created_at = '$created_at',
                                    tour_status = '$tour_status',
                                    image1 = '$image1', image2 = '$image2', image3 = '$image3', image4 = '$image4'
                                    WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function editNews($news_id,$title, $main_img, $description, $image1,
                            $content, $image2, $content2, $image3,
                            $content3, $author_id, $status, $created_at){

        $sql = "UPDATE news SET title = '$title',
                                    main_img = '$main_img',
                                    description = '$description',
                                    image1 = '$image1',
                                    content = '$content',
                                    description = '$description',
                                    image2 = '$image2',
                                    content2 = '$content2',
                                    image3 = '$image3',
                                    content3 = '$content3',
                                    author_id = '$author_id',
                                    status = '$status',
                                    created_at = '$created_at'
                                    WHERE news_id = $news_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    
    
}
?>