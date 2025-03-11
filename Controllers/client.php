<?php
// require_once("./Models/home.php");
class clientControllers {
    private $user;
    public function __construct(){
        require_once("./Models/user.php");
        $this->user = new User() ;
    }
    public function bookedTour(){
        $id = $_GET["id"];
        $sql = "SELECT * from tour WHERE id = ?";
        $detail = $this->user->getByID($sql,$id);
        
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
        $sql = "SELECT id,email,fullname FROM user WHERE email = :email";
        $user = $this->user->getUser($sql,$email);

        if (!$this->checkClientPermission($user["id"])) {
            header("Location: ?route=login");
            exit();
        }
        if(isset($_POST["book"])){
            
            $tourId = $detail["id"];
            $userId = $user["id"];
            $numberOfPeople = $_POST["number_of_people"] ?? '';
            $totalPrice = (int)$_POST["number_of_people"]*(int)$detail["price"];
            $address = $_POST["address"] ?? '';
            $name = $_POST["name"] ?? '';
            $startLocation = $_POST["start_location"] ?? '';
            $bookingDate = date('Y-m-d');
            $status = "Chưa thanh toán";
            
            $this->user->insert($name,$tourId, $userId, $numberOfPeople, $totalPrice, $address, $startLocation, $bookingDate,$status);
            $bookingId = $this->user->conn->lastInsertId();
        }
        require_once "./Views/main/payment.php";
        
    }
    
    public function payment(){
        if(isset($_POST['payment'])) {
            $method = $_POST['method'] ?? '';
            if($method == 'direct') {
                $status = "Thanh toán trực tiếp";
                $bookingId = $_GET["bookingId"];
                $this->user->paymentStatus($status,$bookingId);
                header("location: ?route=client");

            } elseif($method == 'QRmomo') {
                header('Content-type: text/html; charset=utf-8');

                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán Tour ";

                // $id = $_GET["bookingId"];
                // $sql = "SELECT bookings_id,total_price from bookings WHERE bookings_id = ?";
                // $booking_price = $this->user->getByID($sql,$id);
                $amount = '10000';
                
                $orderId = time() ."";
                $redirectUrl = "http://localhost/vtdiem_ph56894_asm/src/index.php?route=client";
                $ipnUrl = "http://localhost/vtdiem_ph56894_asm/src/index.php?route=client";
                $extraData = "";

                $requestId = time() . "";
                $requestType = "captureWallet";
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json
                $status = "Đã thanh toán với QRcode MoMo";
                $bookingId = $_GET["bookingId"];
                $this->user->paymentStatus($status,$bookingId);

                header('Location: ' . $jsonResult['payUrl']);

            }elseif($method == 'ATM'){
                header('Content-type: text/html; charset=utf-8');

                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua ATM";
                
                $id = $_GET["bookingId"];
                $sql = "SELECT bookings_id,total_price from bookings WHERE bookings_id = ?";
                $booking_price = $this->user->getByID($sql,$id);
                $amount = "10000";

                $orderId = time() ."";
                $redirectUrl = "http://localhost/vtdiem_ph56894_asm/src/index.php?route=client";
                $ipnUrl = "http://localhost/vtdiem_ph56894_asm/src/index.php?route=client";
                $extraData = "";

                $requestId = time() . "";
                $requestType = "payWithATM";
                $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true); 
                $status = "Thanh toán thất bại";
                $bookingId = $_GET["bookingId"];
                $this->user->paymentStatus($status,$bookingId);

                header('Location: ' . $jsonResult['payUrl']);
                
            }else{
                header("location: ?route=client");
                
            }
        }
    }
    
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function deleteItem(){
        require_once "./Controllers/admin.php";
        $detete = new adminControllers();
        $detete->deleteItem();
        
    }


    private function checkClientPermission() {
        if (!isset($_SESSION['role']) || !isset($_SESSION['user_id'])) {
            return false;
        }
    
        if ($_SESSION['role'] !== 'client') {
            return false;
        }

        return true;
    }



}