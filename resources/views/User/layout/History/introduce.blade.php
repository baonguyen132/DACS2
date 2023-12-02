<div id = "mainCategory">
    <div class="grid wide">
        <div class="benefit-top row">
          <div class="benefit-top-content col l-7 m-12 c-12">
            <h1 class="animated left-animation-delay300">
              Bạn Đã Thay Đổi <br /><i
                class="fa-solid fa-arrow-right"
                style="color: rgb(250, 250, 250)"
              ></i>
              <span
                id="typed"
                style="
                  background-color: #ffe53b;
                  background-image: linear-gradient(
                    147deg,
                    #ffe53b 0%,
                    #ff2525 74%
                  );
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;
                "
              >
              </span>
            </h1>
            <p class="animated left-animation-delay400">
              Chúng ta nên và cần thay đổi thói quen về việc sử dụng các nguồn
              năng lượng có thể tái tạo. Bất cứ khi nào con người cũng có thể sử
              dụng các năng lượng từ gió, ánh nắng mặt trời…
            </p>
            <div class="button_container left-animation-delay400">
              <button class="btn"><span>Xem Thêm !</span></button>
            </div>
          </div>
          <div class="benefit-top-img right-animation col l-5 m-12 c-12">
            <img
              class="benefit-top-img-child"
              src="{{asset("asset/image/History/history1.png")}}"
              alt=""
            />
          </div>
        </div>

        <div class="benefit-bottom row">
          <div class="benefit-bottom-img bottom-animation col l-5 m-12 c-12">
            <img src="{{asset("asset/image/History/history2.png")}}" alt="" />
          </div>
          <div class="benefit-bottom-content col l-7 m-12 c-12">
            <h1 class="right-animation">Việt Nam Tái Chế</h1>
            <p class="right-animation">
              Hãy đối mặt với thực tế là chúng ta tiêu thụ nhiều hơn cái mà
              thiên nhiên có thể cung cấp cho chúng ta và mọi thứ đang dần cạn
              kiệt! Vì vậy, trước hết hãy giảm thiểu nhu cầu tiêu dùng của bản
              thân. Sau đó là tái sử dụng và tái chế các sản phẩm để hạn chế rác
              thải và tiết kiệm tài nguyên.
            </p>
            <div class="button_container right-animation-delay400">
              <button class="btn"><span>Xem Thêm !</span></button>
            </div>
          </div>
        </div>
    </div>

    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    <script>
    var typingE = new Typed("#typed", {
        strings: ["Thế Giới", "Hiện Tại", "Tương Lai"],
        typeSpeed: 80,
        backSpeed: 40,
        loop: true,
    });
    </script>
    <!-- End Benefit -->
</div>


<!-- Javascript for Scroll Reveal -->
<script>
        ScrollReveal({
          // reset: true,
          distance: "100%",
          duration: 1200,
          delay: 100,
        });

        // ScrollReveal().reveal(".bottom-animation", {
        //   delay: 200,
        //   origin: "bottom",
        // });
        ScrollReveal().reveal(".left-animation", {
          delay: 200,
          origin: "left",
        });
        ScrollReveal().reveal(".left-animation-delay300", {
          delay: 300,
          origin: "left",
        });
        ScrollReveal().reveal(".left-animation-delay400", {
          delay: 400,
          origin: "left",
        });
        ScrollReveal().reveal(".top-animation", {
          delay: 300,
          origin: "top",
        });
        // ScrollReveal().reveal(".right-animation", {
        //   delay: 300,
        //   origin: "right",
        // });
        ScrollReveal().reveal(".right-animation-delay400", {
          delay: 400,
          origin: "right",
        });
</script>
