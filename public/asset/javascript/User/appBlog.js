$(document).ready(function () {
    var pageSize = 2;
    var currentPage = 1;
    var numCards = 0;
    var totalPages = 0;

    var link = "http://localhost/duanBWD1/";

    var xmlhttp = new XMLHttpRequest();
    var url = "http://127.0.0.1:8000/api/dataBlog/";

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myArr = JSON.parse(this.responseText);
            ExportData(myArr);
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    function ExportData(arr) {
        var chays;
        for (chays = 0; chays < arr.length; chays++) {
            var blogContent = arr[chays].content;

            if (blogContent !== "") {
                var card = $("<div>").addClass("card");
                var cardBody = $("<div>").addClass("card-body");
                var cardAvatar = $("<div>").addClass("avatar");

                var avatarImg = $("<img>")
                    .addClass("avatar-img")
                    .attr("src", "../asset/image/60111.jpg")
                    .attr("alt", "");
                var avatarText = $("<span>")
                    .addClass("avatar-text")
                    .text(arr[chays].Fullname);
                var cardText = $("<div>")
                    .addClass("card-text")
                    .append(blogContent);

                var cardAvatar1 = $("<div>").addClass("cardAvatar1");
                cardAvatar1.append(avatarImg, avatarText);

                var cardAvatar2 = $("<div>").addClass("cardAvatar2");

                var formDelete = $("<form>")
                    .attr("method", "POST")
                    .attr(
                        "action",
                        link +
                            "Blog/deleteCard/" +
                            arr[chays].ID +
                            "/" +
                            arr[chays].IDClient
                    );
                var ButtonDeleteCard = $("<button>")
                    .addClass("btn btn-close")
                    .attr("name", "DeleteCard")
                    .attr("style", "padding: 0px");

                formDelete.append(ButtonDeleteCard);
                cardAvatar2.append(formDelete);

                cardAvatar.append(cardAvatar1, cardAvatar2);
                card.append(cardAvatar);

                cardBody.append(cardText);
                card.append(cardBody);

                var viewButton = $("<div>").addClass("viewButton");
                var viewMoreButton = $("<button>")
                    .addClass("view-more-button")
                    .text("Xem thêm");
                var viewEdiitButton = $("<button>")
                    .attr("type", "button")
                    .attr("data-bs-toggle", "modal")
                    .attr("class", "UpdateCard")
                    .attr("data-bs-target", "#uploadCard" + chays)
                    .text("Edit");

                viewButton.append(viewEdiitButton, viewMoreButton);

                cardBody.append(viewButton);

                card.data("avatar-img", "../asset/image/60111.jpg");
                card.data("avatar-text", arr[chays].Fullname);
                card.data("content", blogContent);

                $("#blogList").prepend(card);

                numCards++;

                if (numCards > pageSize) {
                    var startIndex = (currentPage - 1) * pageSize;
                    var endIndex = startIndex + pageSize;

                    $("#blogList .card").hide();
                    $("#blogList .card").slice(startIndex, endIndex).show();
                }

                totalPages = Math.ceil(numCards / pageSize);
                if (totalPages > 1) {
                    var paginationNav = $("#paginationNav ul");
                    paginationNav.empty();

                    var prevButton = $("<li>").addClass("page-item");
                    var prevLink = $("<a>")
                        .addClass("page-link")
                        .attr("href", "#")
                        .attr("data-page", "prev")
                        .text("<<");
                    prevButton.append(prevLink);
                    paginationNav.append(prevButton);

                    for (var i = 1; i <= totalPages; i++) {
                        var pageButton = $("<li>").addClass("page-item");
                        var pageLink = $("<a>")
                            .addClass("page-link")
                            .attr("href", "#")
                            .attr("data-page", i)
                            .text(i);
                        pageButton.append(pageLink);
                        paginationNav.append(pageButton);
                    }

                    var nextButton = $("<li>").addClass("page-item");
                    var nextLink = $("<a>")
                        .addClass("page-link")
                        .attr("href", "#")
                        .attr("data-page", "next")
                        .text(">>");
                    nextButton.append(nextLink);
                    paginationNav.append(nextButton);
                }

                // Đếm số dòng trong card-text
                var cardText = card.find(".card-text");
                var lineCount =
                    cardText[0].scrollHeight /
                    parseFloat(cardText.css("line-height"));

                // Ẩn nội dung của card-text nếu có nhiều hơn 3 dòng
                if (lineCount > 3) {
                    cardText.addClass("collapsed");
                }
            }
        }
    }

    $(document).on("click", ".view-more-button", function () {
        var card = $(this).closest(".card");
        var cardText = card.data("content");
        var avatarImg = card.data("avatar-img");
        var avatarText = card.data("avatar-text");

        // Tạo phần tử ẩn tạm thời để tính toán chiều cao thực tế
        var hiddenElement = $("<pre>")
            .addClass("form-text-temp")
            .text(cardText)
            .css("visibility", "hidden")
            .appendTo("body");

        var formContainer = $("<div>").addClass("form-container");
        var formOverlay = $("<div>").addClass("form-overlay");
        var formContent = $("<div>").addClass("form-content");

        var CloseAndAvata = $("<div>").addClass("CloseAndAvata");
        var closeButton = $("<button>").addClass("close-button btn btn-close");
        var formAvatar = $("<div>").addClass("form-avatar");

        var formAvatarImg = $("<img>")
            .addClass("form-avatar-img")
            .attr("src", avatarImg)
            .attr("alt", "");
        var formAvatarText = $("<span>")
            .addClass("form-avatar-text")
            .text(avatarText);
        var formText = $("<div>").addClass("form-text").append(cardText);
        // .css("height", hiddenElement.innerHeight() + "px");

        // Xóa phần tử ẩn tạm thời
        hiddenElement.remove();

        formAvatar.append(formAvatarImg, formAvatarText);
        CloseAndAvata.append(formAvatar, closeButton);
        formContent.append(CloseAndAvata, formText);

        formContainer.append(formOverlay, formContent);
        $("body").append(formContainer);

        $("body").addClass("dark-overlay");
    });

    $(document).on("click", ".UpdateCard", function () {
        var card = $(this).closest(".card");
        var cardText = card.data("content");

        $(".modal-body-content").remove();

        texts.append(cardText);
    });

    $(document).on("click", ".close-button", function () {
        $(".form-container").remove();
        $("body").removeClass("dark-overlay");
    });

    $(document).on("click", ".form-overlay", function () {
        $(".form-container").remove();
        $("body").removeClass("dark-overlay");
    });

    $(document).on("click", "#paginationNav a", function () {
        var page = $(this).attr("data-page");

        if (page === "prev") {
            if (currentPage > 1) {
                currentPage--;
            }
        } else if (page === "next") {
            if (currentPage < totalPages) {
                currentPage++;
            }
        } else {
            currentPage = parseInt(page);
        }

        var startIndex = (currentPage - 1) * pageSize;
        var endIndex = startIndex + pageSize;

        $("#blogList .card").hide();
        $("#blogList .card").slice(startIndex, endIndex).show();
    });
});
