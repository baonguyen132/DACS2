<div id="main">
    <!-- Header -->


    @include('User.layout.include.menu')
    <!-- Slider -->
    <div id="slider">
      <video autoplay muted loop id="#video">
        <source
          src="{{asset("asset/video/cay-44749.mp4")}}"
          type="video/mp4
        "
        />
      </video>

      <div class="content">
        <!-- Slider text -->
        <div class="slider__info">
          <p class="slider-phara">Thu hồi pin cũ</p>
          <p class="slider-phara">Bảo vệ Trái Đất xanh</p>
          <span class="slider-message"
            >- Hãy cùng chúng tôi làm những điều này nhé! -
          </span>
          <a href="#protect" class="slider__btn slider__btn-info">
            BẮT ĐẦU
            <i class="fa-solid fa-chevron-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript for Scroll Reveal -->
  <script>
    ScrollReveal({
      distance: "60%",
      duration: 2500,
      delay: 400,
    });

    ScrollReveal().reveal(".slider__info", {
      delay: 300,
      origin: "bottom",
    });
  </script>
