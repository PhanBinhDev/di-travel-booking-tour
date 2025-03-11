<?php
require_once "./Views/layout/header.php";
?>
<main>
  <div class="news-detail booktour">
    <form class="form-booktour user-info" action="" method="post" enctype="multipart/form-data">
      <h1>Thông tin đặt tour</h1>
      <?php $home = new Home();
                        $sql= "SELECT * from bookings WHERE bookings_id = ?";
                        $booking = $home->getByID($sql,$bookingId);
                    ?>
      <div>
        <label for="name">Họ và tên</label>
        <input type="text" name="name" value="<?= $booking["name"] ?>">
      </div>

      <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $user["email"] ?>">
      </div>
      <div>
        <label for="address">Địa chỉ</label>
        <input type="text" name="address" value="<?= $booking["address"] ?>">
      </div>
      <div>
        <label for="tour">Tour</label>
        <input type="text" name="tour" value="<?= $detail["tour_name"] ?>">
      </div>
      <div>
        <label for="start_location">Điểm xuất phát</label>
        <input type="text" name="start_location" value="<?= $booking["start_location"] ?>">
      </div>
      <div>
        <label for="number_of_people">Số lượng khách</label>
        <input type="number" name="number_of_people" value="<?= $booking["number_of_people"] ?>">
      </div>
      <hr>
      <br>
      <div class="total">
        <p>Tổng tiền: <span><?= number_format($booking["total_price"], 0, ',', '.') ?></span> đ</p>
      </div>

    </form>
    <hr>
    <div class="payment-method">
      <div class="booked-tour">
        <img src="./Views/image/<?= $detail["image"]?>" alt="">
        <p><strong>Tour:</strong> <?= $detail["tour_name"]?></p>

      </div>
      <form class="form-payment" method="post" action="?route=paymentmethod&bookingId=<?= $bookingId ?>"
        enctype="application/x-www-form-urlencoded">
        <h2>Chọn phương thức thanh toán</h2>

        <label class="payment-option">
          <input type="radio" name="method" value="direct">
          Thanh toán trực tiếp
        </label>

        <label class="payment-option">
          <input type="radio" name="method" value="QRmomo">
          Thanh toán với QRcode MoMo
        </label>
        <label class="payment-option">
          <input type="radio" name="method" value="ATM">
          Thanh toán với ATM
        </label>

        <button type="submit" name="payment" class="payment-button">Thanh toán</button>
      </form>

    </div>
  </div>
</main>
<?php
require_once "./Views/layout/footer.php";
?>