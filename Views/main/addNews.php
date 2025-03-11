<?php
require_once "./Views/layout/header.php";
?>

<main>
  <div class="admin-dashboard ">
    <div class="sidebar">
      <ul class="sidebar-menu">
        <li><i class="fas fa-home"></i> Xin chào Admin</li>
        <li><a href="index.php?route=admin&type=tour"><i class="fas fa-map-marked-alt"></i> Quản lý Tour</a></li>
        <li><a href="index.php?route=admin&type=news"><i class="fas fa-newspaper"></i> Quản lý Tin tức</a></li>
        <li><a href="index.php?route=admin&type=bookings"><i class="fas fa-ticket-alt"></i> Quản lý Đặt tour</a></li>
        <li><a href="index.php?route=admin&type=reviews"><i class="fa-solid fa-comment"></i> Quản lý bình luận</a></li>
      </ul>
    </div>
    <div class="main-content new-tour addNews">
      <h2>Thêm Tin Mới</h2>
      <form action="?route=addNews" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Tên bài viết</label>
          <input type="text" name="title" required>
        </div>

        <div class="form-group">
          <label for="description">Mô tả</label>
          <textarea id="description" name="description" rows="5" required></textarea>
        </div>

        <div class="form-group">
          <label for="main_img">Ảnh đại diện của bài viết</label>
          <div class="file-input-wrapper">
            <input type="file" id="main_img" name="main_img" accept="image/*"
              onchange="document.getElementById('main_img-name').textContent = this.files[0].name;">
            <div class="file-name" id="main_img-name">Chưa chọn tệp</div>
          </div>
        </div>

        <div class="form-group">
          <label for="content">Mở đoạn</label>
          <textarea id="content" name="content" rows="5" required></textarea>
        </div>

        <div class="form-group">
          <label for="image1">Ảnh mở đoạn</label>
          <div class="file-input-wrapper">
            <input type="file" id="image1" name="image1" accept="image/*" required
              onchange="document.getElementById('image1-name').textContent = this.files[0].name;">
            <div class="file-name" id="image1-name">Chưa chọn tệp</div>
          </div>
        </div>

        <div class="form-group">
          <label for="content2">Thân đoạn</label>
          <textarea id="content2" name="content2" rows="5" required></textarea>
        </div>

        <div class="form-group">
          <label for="image2">Ảnh thân đoạn</label>
          <div class="file-input-wrapper">
            <input type="file" id="image2" name="image2" accept="image/*"
              onchange="document.getElementById('image2-name').textContent = this.files[0].name;">
            <div class="file-name" id="image2-name">Chưa chọn tệp</div>
          </div>
        </div>

        <div class="form-group">
          <label for="content3">Kết đoạn</label>
          <textarea id="content3" name="content3" rows="5"></textarea>
        </div>

        <div class="form-group">
          <label for="image3">Ảnh kết đoạn</label>
          <div class="file-input-wrapper">
            <input type="file" id="image3" name="image3" accept="image/*"
              onchange="document.getElementById('image3-name').textContent = this.files[0].name;">
            <div class="file-name" id="image3-name">Chưa chọn tệp</div>
          </div>
        </div>
        <button type="submit" name="addNews" class="submit-btn">Thêm Tin</button>
    </div>
  </div>
</main>

<?php
require_once "./Views/layout/footer.php";
?>