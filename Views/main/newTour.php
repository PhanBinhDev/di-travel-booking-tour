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
    <div class="main-content new-tour">
      <h2>Thêm Tour Mới</h2>
      <form action="?route=newTour" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="tour_name">Tên Tour</label>
          <input type="text" id="tour_name" name="tour_name" required>
        </div>

        <div class="form-group">
          <label for="location">Địa Điểm</label>
          <input type="text" id="location" name="location" required>
        </div>

        <div class="form-group">
          <label for="vehicle">Phương Tiện</label>
          <input type="text" id="vehicle" name="vehicle" required>
        </div>

        <div class="form-group">
          <label for="region">Khu Vực</label>
          <select id="region" name="region" required>
            <option value="">Chọn Khu Vực</option>
            <option value="Miền Bắc">Miền Bắc</option>
            <option value="Miền Trung">Miền Trung</option>
            <option value="Miền Nam">Miền Nam</option>
          </select>
        </div>

        <div class="form-group">
          <label for="start_location">Điểm Khởi Hành</label>
          <input type="text" id="start_location" name="start_location" required>
        </div>

        <div class="form-group">
          <label for="description">Mô Tả Tour</label>
          <textarea id="description" name="description" rows="5" required></textarea>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="price">Giá Tour</label>
            <input type="money_format" id="price" name="price" required min="0">
          </div>

          <div class="form-group">
            <label for="duration">Thời Gian</label>
            <input type="text" id="duration" name="duration" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="start_date">Ngày Bắt Đầu</label>
            <input type="date" id="start_date" name="start_date" required>
          </div>

          <div class="form-group">
            <label for="end_date">Ngày Kết Thúc</label>
            <input type="date" id="end_date" name="end_date" required>
          </div>
        </div>

        <div class="form-group">
          <label for="tour_status">Trạng Thái Tour</label>
          <input type="text" id="tour_status" name="tour_status">
        </div>

        <div class="image-upload">
          <div class="form-group">
            <label for="image">Ảnh Chính</label>
            <div class="file-input-wrapper">
              <input type="file" id="image" name="image" accept="image/*" required
                onchange="document.getElementById('image-name').textContent = this.files[0].name;">
              <div class="file-name" id="image-name">Chưa chọn tệp</div>
            </div>
          </div>

          <div class="form-group">
            <label for="image1">Ảnh Phụ 1</label>
            <div class="file-input-wrapper">
              <input type="file" id="image1" name="image1" accept="image/*"
                onchange="document.getElementById('image1-name').textContent = this.files[0].name;">
              <div class="file-name" id="image1-name">Chưa chọn tệp</div>
            </div>
          </div>

          <div class="form-group">
            <label for="image2">Ảnh Phụ 2</label>
            <div class="file-input-wrapper">
              <input type="file" id="image2" name="image2" accept="image/*"
                onchange="document.getElementById('image2-name').textContent = this.files[0].name;">
              <div class="file-name" id="image2-name">Chưa chọn tệp</div>
            </div>
          </div>

          <div class="form-group">
            <label for="image3">Ảnh Phụ 3</label>
            <div class="file-input-wrapper">
              <input type="file" id="image3" name="image3" accept="image/*"
                onchange="document.getElementById('image3-name').textContent = this.files[0].name;">
              <div class="file-name" id="image3-name">Chưa chọn tệp</div>
            </div>
          </div>

          <div class="form-group">
            <label for="image4">Ảnh Phụ 4</label>
            <div class="file-input-wrapper">
              <input type="file" id="image4" name="image4" accept="image/*"
                onchange="document.getElementById('image4-name').textContent = this.files[0].name;">
              <div class="file-name" id="image4-name">Chưa chọn tệp</div>
            </div>
          </div>
        </div>

        <button type="submit" name="addTour" class="submit-btn">Thêm Tour</button>
      </form>


    </div>
  </div>
</main>
<?php
require_once "./Views/layout/footer.php";
?>