<?php
class User{
    public $conn;
    public function __construct(){
        include('Connect.php');
        $this->conn = $conn;
    }
    public function checkUser($username){
        $sql = "SELECT id,username, password, role FROM user WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function getUser($sql,$email){
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    public function getByID($sql,$id){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }
    
    public function insert($name,$tourId, $userId, $numberOfPeople, $totalPrice, $address, $startLocation, $bookingDate,$status) {
        $sql = "INSERT INTO bookings (name,tour_id, user_id, number_of_people, total_price, address, start_location, booking_date, status) 
                VALUES ('$name','$tourId', '$userId', '$numberOfPeople', '$totalPrice', '$address', '$startLocation', '$bookingDate','$status')";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function paymentStatus($status,$bookings_id){
        $sql = "UPDATE bookings SET status = ? WHERE bookings_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$status,$bookings_id]);
    }
    

    

   

}