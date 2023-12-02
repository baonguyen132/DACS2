@extends('User.format')

@section('head')
<link rel="stylesheet" href="{{asset("asset/css/User/Nav.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/Home/responsive.css")}}" />
<link rel="stylesheet" href="{{asset("asset/css/User/Blog/grid.css")}}">
<link rel="stylesheet" href="{{asset("asset/css/User/Blog/blog.css")}}">

<script src = "{{asset("asset/javascript/User/ckeditor/ckeditor.js")}}"></script>

@endsection


@section('content')
@include('User.layout.include.menu')
<div class="container-fluid containerBlogParent" style="">
    <div class="row" style="width:100% ;">
      <div class="col l-6 m-12 c-12 order2">
        <div
          class="blog__container"
          style="display: flex; flex-direction: column; align-items: center"
        >
          <h1 class="text-center">Hiển thị các bài Blog</h1>
          <p>Tổng hợp các bài blog chia sẽ về môi trường</p>
          <div class="d-md-none">
            <div id="blogFormToggle" class="text-center ">
              <button id="toggleBlogForm" class="btn btn-primary">+</button>
            </div>
          </div>
          <div id="blogList" class="card-deck flex-column"  style="min-width: 100%">



          </div>
          <nav id="paginationNav" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" data-page="prev">&lt;&lt;</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#" data-page="1">1</a>
              </li>
              <!-- Thêm các trang phân trang tùy thuộc vào số lượng bài viết -->
              <li class="page-item">
                <a class="page-link" href="#" data-page="next">&gt;&gt;</a>
              </li>
            </ul>
          </nav>

        </div>
      </div>
      <div class="col l-6 m-12 c-12 order1 mg-bottom100">
        <div class="d-none d-md-block" id="blogFormContainer">
          <div class="text-center">
            <h1>Viết Blog</h1>
          </div>
          <div class="card" style="">

            <form action="{{route("blog.store")}}" method="POST">
              <div class="card-body" style="padding: 1.25rem">
                <textarea id="ckeditor" class="ckeditor form-control" rows="5" style="height: 100%" name = "contentBlog" required ></textarea>
              </div>
              @csrf
              <div class="card-footer text-center">
                <button name="submitInsertBlog" id="submitBtn" class="btn">Đăng bài</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="blogContentContainer" class="d-none">
    <!-- Nội dung của phần hiển thị bài viết -->
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="{{asset("asset/javascript/User/appBlog.js")}}"></script>

  <script>
    // Xử lý sự kiện khi nhấp vào dấu cộng
    document
      .getElementById("toggleBlogForm")
      .addEventListener("click", function () {
        var blogFormContainer = document.getElementById("blogFormContainer");
        if (blogFormContainer.classList.contains("d-none")) {
          blogFormContainer.classList.remove("d-none");
        } else {
          blogFormContainer.classList.add("d-none");
        }
      });


  </script>


@endsection
