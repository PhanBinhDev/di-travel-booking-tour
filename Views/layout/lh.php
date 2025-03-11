<?php
require_once "./Views/layout/header.php";
?>
<main>
  <div class="contact-banner">
    <div class="banner-content">
      <h1>Liên Hệ DiTravel</h1>
      <p>Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn</p>
    </div>
  </div>

  <div class="contact-container">
    <div class="contact-wrapper">
      <div class="contact-info">
        <h2>Thông Tin Liên Hệ</h2>
        <div class="contact-details">
          <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <span>Địa chỉ: Tòa nhà FPT Polytechnic., Cổng số 2, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội,
              Việt Nam</span>
          </div>
          <div class="contact-item">
            <i class="fas fa-phone"></i>
            <span>Hotline: 0987 654 321</span>
          </div>
          <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <span>Email: support@ditravel.com</span>
          </div>
          <div class="contact-item">
            <i class="fas fa-clock"></i>
            <span>Giờ làm việc: 8:00 - 22:00 (Từ T2 - CN)</span>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <h2>Gửi Tin Nhắn Cho Chúng Tôi</h2>
        <?php if (!empty($notify)){ ?>
        <script>
        window.onload = function() {
          alert("<?= $notify ?>");
        }
        </script>
        <?php } ?>
        <form method="post" action="?route=lh">
          <div class="form-group">
            <label>Họ và Tên</label>
            <input type="text" name="name" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
          </div>
          <div class="form-group">
            <label>Số Điện Thoại</label>
            <input type="tel" name="phone">
          </div>

          <div class="form-group">
            <label>Nội Dung Tin Nhắn</label>
            <textarea name="message" rows="5" required></textarea>
          </div>
          <button type="submit" name="lh" class="btn-submit">Gửi Tin Nhắn</button>
        </form>
      </div>
    </div>

    <div class="contact-map">
      <h2>Vị Trí Của Chúng Tôi</h2>
      <div class="map-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105819.80003065214!2d105.59482649726561!3d21.038129800000032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e1!3m2!1svi!2s!4v1733975186117!5m2!1svi!2s"
          width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>

      </div>
    </div>
  </div>

  <style>
  main {
    margin-top: 100px;
  }

  .contact-banner {
    background-color: #f06a75;
    color: white;
    text-align: center;
    padding: 100px 0;
  }

  .contact-banner h1 {
    font-size: 3em;
    margin-bottom: 15px;
  }

  .contact-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
  }

  .contact-wrapper {
    display: flex;
    justify-content: space-between;
    margin-bottom: 50px;
  }

  .contact-info,
  .contact-form {
    width: 48%;
  }

  .contact-info h2,
  .contact-form h2,
  .contact-map h2 {
    color: #f06a75;
    margin-bottom: 30px;
  }

  .contact-details {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .contact-item i {
    color: #f06a75;
    font-size: 1.5em;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 10px;
    color: #333;
  }

  .form-group input,
  .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .btn-submit {
    background-color: #f06a75;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn-submit:hover {
    background-color: #61CE70;
  }

  .contact-map {
    margin-top: 50px;
  }

  @media (max-width: 768px) {
    .contact-wrapper {
      flex-direction: column;
    }

    .contact-info,
    .contact-form {
      width: 100%;
      margin-bottom: 30px;
    }
  }
  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</main>
<?php
require_once "./Views/layout/footer.php";
?>