// === HELP FUNCTIONS ===
// Random id
function randomId() {
    return Math.floor(Math.random() * 100000);
}

// === KHAI BÁO BIẾN ===
const xhttp = new XMLHttpRequest();

function load() {
    xhttp.onload = function () {
        const result = JSON.parse(this.responseText).records;

        window.onload = renderUI(result);
    };

    xhttp.open("GET", "http://127.0.0.1:8000/api/cart");
    xhttp.send();
}

// === TRUY CẬP VÀO CÁC THÀNH PHẦN ===
let productsEle = document.querySelector(".products");
let subTotalEl = document.querySelector(".subtotal span");

// === MAIN FUNCTION ===
// Render và hiển thị dữ liệu
function renderUI(arr) {
    let countEle = document.querySelector(".count");
    productsEle.innerHTML = "";

    if (arr == null) {
        productsEle.insertAdjacentHTML(
            "afterbegin",
            "<li>Không có sản phẩm nào trong giỏ hàng</li>"
        );
        const option_container = document.querySelector(".option-container");
        option_container.remove();

        countEle.innerText = `0`;

        return;
    } else {
        // Cập nhật số lượng sản phẩm trong cart
        countEle.innerText = `${updateTotalItem(arr)}`;
        // Cập nhật tổng tiền
        updateTotalMoney(arr);

        for (let i = 0; i < arr.length; i++) {
            const p = arr[i];
            productsEle.innerHTML += `
                <li class="rows" id="li${p.infor.id}">
                    <div class="col left">
                        <div class="thumbnail">

                            <img src="../../../storage/image/Battery/${p.infor.image}.jpg" alt="${p.infor.name_battery}">

                        </div>
                        <div class="detail">
                            <div class="name"><a href="#">${p.infor.name_battery}</a></div>
                            <div class="description">
                                <ul>
                                    <li><b>Shape: </b>${p.infor.shape}</li>
                                    <li><b>Size: </b>${p.infor.size}</li>
                                </ul>
                            </div>
                            <div class="price"></div>
                        </div>
                    </div>
                    <div class="col right">
                        <div class="quantity">
                            <input
                                type="number"
                                class="quantity"
                                step="1"
                                value="${p.count}"
                                onchange="changeTotalProduct(${p.infor.id}, event)"
                            >
                        </div>
                        <div class="remove">
                            <span class="close" onclick="removeItem(${p.infor.id})">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </li>
            `;
        }
    }
}

// Cập nhật số lượng sản phẩm
function updateTotalItem(arr) {
    let total = 0;
    for (let i = 0; i < arr.length; i++) {
        const p = arr[i];
        total += Number(p.count);
    }
    return total;
}

// Remove item trong cart
function removeItem(id) {
    thttp = "http://127.0.0.1:8000/api/cart/delete/" + id;
    $.get(thttp);
    load();
}

// Thay đổi số lượng sản phẩm
function changeTotalProduct(id, e) {
    thttp = "http://127.0.0.1:8000/api/cart/edit/" + id + "-" + e.target.value;
    console.log(thttp);
    $.get(thttp);
    load();
}

// Cập nhật tổng tiền
function updateTotalMoney(arr) {
    // Tính tổng tiền cart
    let totalMoney = 0;

    for (let i = 0; i < arr.length; i++) {
        const p = arr[i];
        totalMoney += Number(p.count) * Number(p.infor.point);
    }

    // Cập nhật tiền lên trên giao diện
    subTotalEl.innerText = totalMoney + " Điểm";
}
window.onload = load();
