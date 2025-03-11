<?php
require_once "./Views/layout/header.php";
?>
<main>
  <div class="about-banner">
    <div class="banner-content">
      <h1>DiTravel</h1>
      <p>Đồng hành cùng bạn khám phá Việt Nam</p>
    </div>
  </div>

  <div class="about-container">
    <section class="about-intro">
      <div class="intro-content">
        <h2>Câu chuyện của chúng tôi</h2>
        <div style="display: flex; gap:20px">
          <div>
            <p>Sinh ra từ những chuyến đi đầu đời, DiTravel mang trong mình niềm đam mê cháy bỏng với việc khám phá
              những miền đất mới và kết nối con người với nhau. Mỗi chuyến đi đều là một câu chuyện, một trải nghiệm độc
              đáo mà chúng tôi muốn chia sẻ với bạn.</p>
            <p>Có lẽ bạn đã từng lạc bước trên những con phố cổ kính, ngỡ ngàng trước vẻ đẹp hùng vĩ của thiên nhiên,
              hay đơn giản chỉ là tận hưởng cảm giác bình yên bên bờ biển. Đó chính là những khoảnh khắc tuyệt vời mà du
              lịch mang lại. Chúng tôi tin rằng, mỗi chuyến đi không chỉ là hành trình địa lý mà còn là cuộc hành trình
              khám phá bản thân.</p>
            <p>Tại DiTravel, chúng tôi không chỉ đơn thuần là một công ty du lịch. Chúng tôi là những người bạn đồng
              hành, cùng bạn viết nên những câu chuyện riêng. Chúng tôi cam kết mang đến cho bạn những trải nghiệm du
              lịch độc đáo, những dịch vụ chất lượng và những thông tin hữu ích để bạn có thể lên kế hoạch cho chuyến đi
              hoàn hảo.</p>
            <p>Chúng tôi tin vào du lịch bền vững, tôn trọng văn hóa địa phương và bảo vệ môi trường. Bằng cách lựa chọn
              DiTravel, bạn không chỉ đang khám phá thế giới mà còn đang góp phần xây dựng một tương lai tốt đẹp hơn.
            </p>
          </div>
          <img src="./Views/image/bandogt.jpg" alt="">
        </div>
      </div>
    </section>

    <section class="about-values">
      <h2>Giá Trị Cốt Lõi</h2>
      <div class="values-grid">
        <div class="value-item">
          <div class="value-icon">
            <i class="fas fa-heart"></i>
          </div>
          <h3>Đam Mê</h3>
          <p>Chúng tôi luôn nhiệt huyết và sáng tạo trong mọi trải nghiệm du lịch</p>
        </div>
        <div class="value-item">
          <div class="value-icon">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h3>An Toàn</h3>
          <p>An toàn là ưu tiên hàng đầu trong mọi hành trình của chúng tôi</p>
        </div>
        <div class="value-item">
          <div class="value-icon">
            <i class="fas fa-globe"></i>
          </div>
          <h3>Trải Nghiệm</h3>
          <p>Mang đến những trải nghiệm độc đáo, khác biệt và đáng nhớ</p>
        </div>
      </div>
    </section>

    <section class="about-team">
      <h2>Đội Ngũ DiTravel</h2>
      <div class="team-description">
        <p>Chúng tôi là một đội ngũ đam mê du lịch, luôn sẵn sàng đồng hành và mang đến những trải nghiệm tuyệt vời nhất
          cho khách hàng. Với kinh nghiệm và sự am hiểu sâu sắc về du lịch, chúng tôi cam kết mang đến những dịch vụ
          chất lượng và chuyên nghiệp.</p>
      </div>
    </section>
  </div>

  <style>
  main {
    margin-top: 100px;
  }

  .about-banner {
    background-color: #f06a75;
    color: white;
    text-align: center;
    padding: 100px 0;
  }

  .about-banner h1 {
    font-size: 3em;
    margin-bottom: 15px;
  }

  .about-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
  }

  .about-intro,
  .about-values,
  .about-team {
    margin-bottom: 50px;
  }

  .about-intro h2,
  .about-values h2,
  .about-team h2 {
    color: #f06a75;
    text-align: center;
    margin-bottom: 30px;
    font-size: 30px;
  }

  .intro-content p {
    margin-bottom: 20px;
    text-indent: 20px;
    line-height: 30px;
  }

  .intro-content img {
    width: 400px;
    height: 450px;
    border-radius: 20px;
  }

  .values-grid {
    display: flex;
    justify-content: space-between;
  }

  .value-item {
    text-align: center;
    flex: 1;
    padding: 20px;
    margin: 0 15px;
    border: 1px solid #f06a75;
    border-radius: 10px;
  }

  .value-icon {
    font-size: 3em;
    color: #f06a75;
    margin-bottom: 15px;
  }

  .team-description {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
  }
  </style>
</main>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<?php
require_once "./Views/layout/footer.php";
?>