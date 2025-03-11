<?php
require_once "./Views/layout/header.php";
?>

<main>

  <div class="admin-dashboard">
    <div class="sidebar">
      <ul class="sidebar-menu">
        <li><i class="fas fa-home"></i> Xin chào Client</li>
        <li>
          <a href="index.php?route=client">
            <i class="fas fa-map-marked-alt"></i> Quản lý Đặt Tour</a>
        </li>
      </ul>
    </div>
    <div class="main-content">
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
                <th>Thanh toán</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
            <tbody>
              <?php $stt=1; foreach($allBookings as $value ){ ?>
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
                    <a onclick="return confirm('Bạn có chắc chắn muốn huỷ không??');"
                      style="text-decoration: none;color:white;"
                      href="?route=client/bookingsDelete&id=<?= $value['bookings_id']?>&type=bookings">Huỷ Tour</a>
                  </button>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</main>

<?php
require_once "./Views/layout/footer.php";
?>