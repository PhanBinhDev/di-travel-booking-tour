<?php
require_once "./Views/layout/header.php";
?>
<main>
  <div class="news-detail">
    <section class="main-content">
      <h1 class="tour-title"><?= $detail["tour_name"]?></h1>

      <div class="slide-show">
        <i class="fa-solid fa-chevron-left back"></i>

        <img src="./Views/image/<?= $detail["image"]?>" class="tour-image">

        <i class="fa-solid fa-chevron-right next"></i>
        <script>
        var current = 0;
        var interval = 0;
        var back = document.querySelector('.back');
        var next = document.querySelector('.next');
        var next = document.querySelector('.next');
        var img = document.querySelector('.tour-image');

        var arrImg = ["./Views/image/<?= $detail["image"]?>",
          "./Views/image/<?= $detail["image1"]?>",
          "./Views/image/<?= $detail["image2"]?>",
          "./Views/image/<?= $detail["image3"]?>",
          "./Views/image/<?= $detail["image4"]?>"
        ];

        console.log(arrImg);

        back.addEventListener('click', () => {
          stop();
          current--
          if (current < 0) {
            current = arrImg.length - 1;
          }
          img.src = arrImg[current];
          play()
        })

        function nextImg() {
          stop();
          current++;
          if (current >= arrImg.length) {
            current = 0;
          }
          img.src = arrImg[current];
          play();
        }
        next.onclick = function() {
          nextImg();
        }

        function play() {
          if (interval == 0) {
            interval = setInterval(function() {
              nextImg()
            }, 5000);
          }
        }
        play();

        function stop() {
          if (interval) {
            clearInterval(interval);
          }
          interval = 0
        }
        </script>
      </div>

      <div class="tour-info">
        <div class="info-item">
          <span class="info-icon">💸</span>
          <span>Giá tour: <?= number_format($detail["price"], 0, ',', '.')?>đ</span>
        </div>
        <div class="info-item">
          <span class="info-icon">⏰</span>
          <span>Thời gian: <?= $detail["duration"]?></span>
        </div>
        <div class="info-item">
          <span class="info-icon">🚗</span>
          <span>Phương tiện: <?= $detail["vehicle"]?></span>
        </div>

        <div class="info-item">
          <span class="info-icon">📍</span>
          <span>Khởi hành: <?= $detail["start_location"]?></span>
        </div>
        <div class="info-item">
          <span class="info-icon">🗓️</span>
          <span>Ngày khởi hành: <?= $detail["start_date"]?></span>
        </div>
        <div class="info-item">
          <span class="info-icon">🗓️</span>
          <span>Ngày kết thúc: <?= $detail["end_date"]?></span>
        </div>
      </div>

      <div class="tour-description">
        <h2>Giới thiệu tour</h2>
        <p><?= $detail["description"]?></p>
      </div>

      <div class="tour-schedule">
        <div class="schedule-day">
          <h3 class="schedule-title">Ngày 1: Khởi Hành và Khám Phá</h3>
          <p>Sáng: Khởi hành từ điểm xuất phát. Dừng chân nghỉ ngơi và ăn sáng tại quán địa phương.</p>
          <p>Chiều: Tham quan điểm du lịch nổi bật (ví dụ: di tích lịch sử, danh lam thắng cảnh).</p>
          <p>Tối: Dạo phố, khám phá ẩm thực đường phố hoặc tham gia hoạt động văn hóa.</p>
        </div>

        <div class="schedule-day">
          <h3 class="schedule-title">Ngày 2: Khám Phá và Trải Nghiệm</h3>
          <p>Sáng: Ăn sáng tại khách sạn. Khởi hành đi tham quan các điểm du lịch khá</p>
          <p>Chiều: Tiếp tục tham quan, có thể tham gia các hoạt động thể thao nước, trekking hoặc khám phá văn hóa địa
            phương.</p>
          <p>Tối: Ăn tối tại nhà hàng.</p>
        </div>
        <div class="schedule-day">
          <h3 class="schedule-title">Ngày 3: Tạm Biệt và Khởi Hành</h3>
          <p>Sáng: Ăn sáng tại khách sạn, làm thủ tục trả phòng.</p>
          <p>Chiều: Khởi hành về điểm xuất phát. Dừng chân nghỉ ngơi và mua sắm quà lưu niệm.</p>
          <p>Tối: Về đến điểm xuất phát, kết thúc tour.</p>
        </div>
      </div>

      <div class="comment-container">
        <h1>Bình luận</h1>
        <form method="post" class="comment-input-section">
          <textarea class="comment-textarea" name="comment" placeholder="Nhập bình luận của bạn..."></textarea>
          <button name="clientComment" class="send-button">Gửi</button>
        </form>
        <?php 
                    if(isset($_SESSION['notification'])) {
                        echo "<p style='color:red' class='notification'>**" . $_SESSION['notification'] . "</p>";
                        unset($_SESSION['notification']);
                    }
                ?>


        <div class="comments-section">
          <?php if(!empty($comments)){ ?>
          <?php foreach($comments as $comment){ ?>
          <div class="single-comment">
            <div class="comment-author"><?= $comment['username'] ?></div>
            <div class="comment-date"><?= $comment['create_at'] ?></div>
            <div class="comment-text"><?= $comment['comment'] ?></div>
          </div>
          <?php } ?>
          <?php }else{ ?>
          <span style='font-weight:400;color:#888'>Chưa có bình luận</span>
          <?php } ?>
        </div>
      </div>
    </section>

    <section class="care-right comment-container">
      <form class="form-booktour" method="POST" action="?route=payment&id=<?= $detail["id"]?>">
        <h1>Thông tin đặt tour</h1>
        <div>
          <label for="name">Họ và tên</label>
          <input type="text" name="name">
        </div>

        <div>
          <label for="email">Email</label>
          <input type="email" name="email">
        </div>
        <div>
          <label for="sdt">Số điện thoại</label>
          <input type="number" name="sdt">
        </div>
        <div>
          <label for="address">Địa chỉ</label>
          <input type="text" name="address">
        </div>
        <div>
          <label for="number_of_people">Số lượng khách</label>
          <input type="number" name="number_of_people">
        </div>
        <div>
          <label for="start_location">Điểm xuất phát</label>
          <input type="text" name="start_location">
        </div>

        <div>
          <button type="submit" name="book">Tiếp tục đến thanh toán</button>

        </div>
      </form>

      <section class="tourDetail-news">
        <img src="./Views/image/news.jpg" alt="">
        <h3>Tin mới gần đây</h3>
        <hr>
        <?php foreach($news as $value){ ?>
        <div class="care-right-news">
          <img src="./Views/image/<?= $value["main_img"]?>" alt="">
          <div class="right-news-content">
            <h4><a href="?route=newsdetail&id=<?= $value["news_id"]?>"><?= $value["title"]?></a></h4>
            <p>Tác giả: <span class="author-name">Vtdiem</span></p>
          </div>
        </div>
        <?php }?>

      </section>
    </section>

  </div>

</main>
<?php
require_once "./Views/layout/footer.php";
?>