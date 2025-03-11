<?php
require_once "./Views/layout/header.php";
?>

<main>

  <div class="admin-dashboard">
    <?php
                $type = isset($_GET['type']) ? $_GET['type'] : 'tour'; 

                $adminContent = [
                    'tour' => $allTours,      
                    'news' => $allNews,        
                    'bookings' => $allBookings,
                    'reviews' => $allReviews,
                    'contact' => $allContact 

                ];
                $filteredContent = [];
                if (!empty($type)) {
                    $filteredContent = $adminContent[$type] ?? [];
                } else {
                    $filteredContent = $adminContent['tour']; 
                }
            ?>
    <div class="sidebar">
      <ul class="sidebar-menu">
        <li><i class="fas fa-home"></i> Xin chào Admin</li>
        <li><a href="index.php?route=admin&type=tour" <?php if($type == 'tour') echo 'class="active"'?>><i
              class="fas fa-map-marked-alt"></i> Quản lý Tour</a></li>
        <li><a href="index.php?route=admin&type=news" <?php if($type == 'news') echo 'class="active"'?>><i
              class="fas fa-newspaper"></i> Quản lý Tin tức</a></li>
        <li><a href="index.php?route=admin&type=bookings" <?php if($type == 'bookings') echo 'class="active"'?>><i
              class="fas fa-ticket-alt"></i> Quản lý Đặt tour</a></li>
        <li><a href="index.php?route=admin&type=reviews" <?php if($type == 'reviews') echo 'class="active"'?>><i
              class="fa-solid fa-comment"></i> Quản lý Bình luận</a></li>
        <li><a href="index.php?route=admin&type=contact" <?php if($type == 'contact') echo 'class="active"'?>><i
              class="fa-solid fa-address-book"></i> Quản lý Liên hệ khách hàng</a></li>

      </ul>
    </div>

    <div style="width: 95%;" class="main-content">
      <?php if($type === 'tour'){ echo "
                <div id='tour-management'>
                    <div class='content-header'>
                        <h1>Quản lý Tour</h1>
                        <button class='add-button'>
                            <i class='fas fa-plus'></i> <a style='text-decoration: none;color:white;' href='?route=newTour'  >Thêm Tour Mới</a>
                        </button>
                    </div>
                    <div class='table-container'>
                        <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Tour</th>
                                    <th>Điểm Đi</th>
                                    <th>Điểm Đến</th>
                                    <th>Giá</th>
                                    <th>Ngày đi - ngày về</th>
                                    <th>Phương tiện</th>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>
                ";}
                elseif($type === 'news'){ echo "
                    <div id='news-management'>
                        <div class='content-header'>
                            <h1>Quản lý Tin tức</h1>
                            <button class='add-button'>
                                <i class='fas fa-plus'></i><a style='text-decoration: none;color:white;' href='?route=addNews'  >Thêm Tin Mới</a>
                            </button>
                        </div>
                        <div class='table-container'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu Đề</th>
                                        <th>Tác Giả</th>
                                        <th>Ngày Đăng</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                ";}
                elseif($type === 'bookings'){ echo "
                    <div id='news-management'>
                        <div class='content-header'>
                            <h1>Quản lý Đặt Tours</h1>
                            
                        </div>
                        <div class='table-container'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Tour</th>
                                        <th>Ngày Đặt</th>
                                        <th>Số người</th>
                                        <th>Điểm xuất phát</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                ";}
                elseif($type === 'reviews'){ echo "
                    <div id='news-management'>
                        <div class='content-header'>
                            <h1>Quản lý Bình luận</h1>
                        </div>
                        <div class='table-container'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tác giả</th>
                                        <th>Tour</th>
                                        <th>Bình luận</th>
                                        <th>Ngày Đăng</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                ";}
                elseif($type === 'contact'){ echo "
                    <div id='news-management'>
                        <div class='content-header'>
                            <h1>Quản lý Liên hệ khách hàng</h1>
                        </div>
                        <div class='table-container'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>SĐT</th>
                                        <th>Tin nhắn</th>
                                        <th>Ngày Đăng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                ";}?>
      <tbody>
        <?php
                                    if (!empty($filteredContent)) {
                                    $stt=1; foreach($filteredContent as $value){
                                    switch($type) {
                                        case 'tour': 
                                ?>
        <tr>
          <td><?= $stt++?></td>
          <td><?= $value["tour_name"]?></td>
          <td><?= $value["start_location"]?></td>
          <td><?= $value["location"]?></td>
          <td><?= number_format($value["price"], 0, ',', '.')?>đ</td>
          <td><?php echo $value["start_date"]."<br>".$value["end_date"] ?></td>
          <td><?= $value["vehicle"]?></td>
          <td class="action-buttons">
            <button class="btn-edit">
              <a style="text-decoration: none;color:white;"
                href="?route=editTour&id=<?= $value['id']?>&type=tour">Sửa</a>
            </button>
            <button class="btn-delete">
              <a onclick="return confirm('Bạn có chắc chắn muốn xoá không??');"
                style="text-decoration: none;color:white;"
                href="?route=admin/tourDelete&id=<?= $value['id']?>&type=tour">Xóa</a>
            </button>
          </td>
        </tr>
        <?php
                                        break;
                                        case 'news':?>
        <tr>
          <td><?= $stt++?></td>
          <td><?= $value["title"]?></td>
          <td><?= $value["fullname"]?></td>
          <td><?= $value["create_at"]?></td>
          <td class="action-buttons">
            <button class="btn-edit">
              <a style="text-decoration: none;color:white;"
                href="?route=editNews&news_id=<?= $value['news_id']?>&type=news">Sửa</a>
            </button>
            <button class="btn-delete">
              <a onclick="return confirm('Bạn có chắc chắn muốn xoá không??');"
                style="text-decoration: none;color:white;"
                href="?route=admin/newsDelete&id=<?= $value['news_id']?>&type=news">Xóa</a>
            </button>

          </td>
        </tr>
        <?php
                                        break;
                                        case 'bookings':
                                            ?>
        <tr>
          <td><?= $stt++?></td>
          <td><?= $value["name"]?></td>
          <td><?= $value["sdt"]?></td>
          <td><?= $value["tour_name"]?></td>
          <td><?= $value["booking_date"]?></td>
          <td><?= $value["number_of_people"]?></td>
          <td><?= $value["start_location"]?></td>
          <td><?= number_format($value["total_price"], 0, ',', '.')?>đ</td>
          <td><?= $value["status"]?></td>
          <td class="action-buttons">
            <button class="btn-delete">
              <a onclick="return confirm('Bạn có chắc chắn muốn xoá không??');"
                style="text-decoration: none;color:white;"
                href="?route=admin/bookingsDelete&id=<?= $value['bookings_id']?>&type=bookings">Xóa</a>
            </button>
          </td>
        </tr>
        <?php
                                            break;
                                        case 'reviews':
                                            ?>
        <tr>
          <td><?= $stt++?></td>
          <td><?= $value["fullname"]?></td>
          <td><?= $value["tour_name"]?></td>
          <td><?= $value["comment"]?></td>
          <td><?= $value["review_create_at"]?></td>

          <td class="action-buttons">
            <button class="btn-edit">
              <a style="text-decoration: none;color:white;" href="?route=tourdetail&id=<?= $value['id']?>">Trả lời</a>
            </button>
            <button class="btn-delete">
              <a onclick="return confirm('Bạn có chắc chắn muốn xoá không??');"
                style="text-decoration: none;color:white;"
                href="?route=admin/reviewsDelete&id=<?= $value['reviews_id']?>&type=reviews">Xóa</a>
            </button>
          </td>
        </tr>
        <?php
                                            break;

                                        case 'contact':
                                            ?>
        <tr>
          <td><?= $stt++?></td>
          <td><?= $value["name"]?></td>
          <td><?= $value["email"]?></td>
          <td><?= $value["phone"]?></td>
          <td><?= $value["message"]?></td>
          <td><?= $value["create_at"]?></td>
          <td class="action-buttons">
            <button class="btn-delete">
              <a onclick="return confirm('Bạn có chắc chắn muốn xoá không??');"
                style="text-decoration: none;color:white;"
                href="?route=admin/contactDelete&id=<?= $value['id']?>&type=contact">Xóa</a>
            </button>
          </td>
        </tr>
        <?php
                                            break;
                                        
                                        }
                                    }
                                }?>
      </tbody>
      </table>
    </div>
  </div>
  </div>
  </div>


  <?php if (!empty($_SESSION["notify"])){ ?>
  <script>
  window.onload = function() {
    alert("<?= $_SESSION["notify"] ?>");
  }
  </script>
  <?php }unset($_SESSION['notify']); ?>

</main>
<?php
require_once "./Views/layout/footer.php";
?>