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
      <h2>Sửa thông tin Tour</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="tour_name">Tên Tour</label>
          <input type="text" id="tour_name" name="tour_name" value="<?= $tour["tour_name"]?>" required>
        </div>

        <div class="form-group">
          <label for="location">Địa Điểm</label>
          <input type="text" id="location" name="location" value="<?= $tour["location"]?>" required>
        </div>

        <div class="form-group">
          <label for="vehicle">Phương Tiện</label>
          <input type="text" id="vehicle" name="vehicle" value="<?= $tour["vehicle"]?>" required>
        </div>

        <div class="form-group">
          <label for="region">Khu Vực</label>
          <select id="region" name="region" required>
            <option value="">Chọn Khu Vực</option>
            <option value="Miền Bắc" <?php echo ($tour['region'] === 'Miền Bắc') ? 'selected' : ''; ?>>Miền Bắc</option>
            <option value="Miền Trung" <?php echo ($tour['region'] === 'Miền Trung') ? 'selected' : ''; ?>>Miền Trung
            </option>
            <option value="Miền Nam" <?php echo ($tour['region'] === 'Miền Nam') ? 'selected' : ''; ?>>Miền Nam</option>
          </select>
        </div>

        <div class="form-group">
          <label for="start_location">Điểm Khởi Hành</label>
          <input type="text" id="start_location" name="start_location" value="<?= $tour["start_location"]?>" required>
        </div>

        <div class="form-group">
          <label for="description">Mô Tả Tour</label>
          <textarea id="description" name="description" rows="5" value="" required><?= $tour["description"]?></textarea>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="price">Giá Tour</label>
            <input type="money_format" id="price" name="price" value="<?= $tour["price"]?>" required min="0">
          </div>

          <div class="form-group">
            <label for="duration">Thời Gian</label>
            <input type="text" id="duration" name="duration" value="<?= $tour["duration"]?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="start_date">Ngày Bắt Đầu</label>
            <input type="date" id="start_date" name="start_date" value="<?= $tour["start_date"]?>" required>
          </div>

          <div class="form-group">
            <label for="end_date">Ngày Kết Thúc</label>
            <input type="date" id="end_date" name="end_date" value="<?= $tour["end_date"]?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="tour_status">Trạng Thái Tour</label>
          <input type="text" id="tour_status" name="tour_status" value="<?php echo $tour["tour_status"] ?? '' ?>"
            required>
        </div>

        <div class="image-upload">
          <div class="form-group">
            <label for="image">Ảnh Chính</label>
            <div class="file-input-wrapper">
              <input type="file" id="image" name="image" accept="image/*"
                onchange="document.getElementById('image-name').textContent = this.files[0].name;">
              <div class="file-name" id="image-name"><?= $tour["image"]?></div>
            </div>
          </div>

          <div class="form-group">
            <label for="image1">Ảnh Phụ 1</label>
            <div class="file-input-wrapper">
              <input type="file" id="image1" name="image1" accept="image/*"
                onchange="document.getElementById('image1-name').textContent = this.files[0].name;">
              <div class="file-name" id="image1-name"><?= $tour["image1"]?></div>
            </div>
          </div>

          <div class="form-group">
            <label for="image2">Ảnh Phụ 2</label>
            <div class="file-input-wrapper">
              <input type="file" id="image2" name="image2" accept="image/*"
                onchange="document.getElementById('image2-name').textContent = this.files[0].name;">
              <div class="file-name" id="image2-name"><?= $tour["image2"]?></div>
            </div>
          </div>

          <div class="form-group">
            <label for="image3">Ảnh Phụ 3</label>
            <div class="file-input-wrapper">
              <input type="file" id="image3" name="image3" accept="image/*"
                onchange="document.getElementById('image3-name').textContent = this.files[0].name;">
              <div class="file-name" id="image3-name"><?= $tour["image3"]?></div>
            </div>
          </div>

          <div class="form-group">
            <label for="image4">Ảnh Phụ 4</label>
            <div class="file-input-wrapper">
              <input type="file" id="image4" name="image4" accept="image/*"
                onchange="document.getElementById('image4-name').textContent = this.files[0].name;">
              <div class="file-name" id="image4-name"><?= $tour["image4"]?></div>
            </div>
          </div>
        </div>

        <button type="submit" name="editTour" class="submit-btn">Hoàn thành</button>
      </form>


    </div>
  </div>
</main>
<?php
require_once "./Views/layout/footer.php";
?>