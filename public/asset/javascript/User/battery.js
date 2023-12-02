const xhttp = new XMLHttpRequest();
let parent_battery = document.querySelector(".row.parent-battery");

xhttp.onload = function () {
    const result = JSON.parse(this.responseText).records;

    for (let index = 0; index < result.length; index++) {
        const element = result[index];
        //1
        let battery = document.createElement("div");
        Object.assign(battery, {
            className: "battery",
        });

        let child_img_battery = document.createElement("div");
        Object.assign(child_img_battery, {
            className: "child-img-battery",
        });

        let span = document.createElement("span");
        span.append(element.point);
        child_img_battery.append(span);
        //2
        let img_battery = document.createElement("div");
        Object.assign(img_battery, {
            className: "img_battery",
        });

        let img = document.createElement("img");
        Object.assign(img, {
            src: "../../storage/image/Battery/" + element.image + ".jpg",
            alt: "",
        });
        img_battery.append(img);
        //3
        let infor_battery = document.createElement("div");
        Object.assign(infor_battery, {
            className: "infor_battery",
        });
        let infor_battery_content = document.createElement("div");
        Object.assign(infor_battery_content, {
            className: "infor_battery_content",
        });

        span = document.createElement("span");
        Object.assign(span, {
            className: "name-battery",
        });
        span.append(element.name_battery);
        infor_battery_content.append(span);

        let ul = document.createElement("ul");
        let li1 = document.createElement("li");
        let b1 = document.createElement("b");
        b1.append("Size: ");
        li1.append(b1, element.size);

        let li2 = document.createElement("li");
        let b2 = document.createElement("b");
        b2.append("Shape: ");
        li2.append(b2, element.shape);

        ul.append(li1, li2);
        infor_battery_content.append(ul);

        let number_battery = document.createElement("div");
        Object.assign(number_battery, {
            className: "number-battery",
        });

        let form = document.createElement("div");

        const label = document.createElement("label");
        Object.assign(label, {
            for: "count" + element.id,
        });
        label.innerHTML = "Số lượng:&nbsp;";
        form.append(label);

        input = document.createElement("input");
        Object.assign(input, {
            type: "number",
            id: "count" + element.id,
            name: "count",
            value: "0",
            min: "0",
            max: "100",
        });

        form.append(input);

        // input = document.createElement("input");
        // Object.assign(input, {
        //     type: "hidden",
        //     name: "_token",
        //     value: ,
        // });
        // form.append(input);

        let button = document.createElement("button");
        button.innerHTML = "Đăng kí";
        Object.assign(button, {
            type: "submit",
            name: "battery",
            value: element.id,
            className: "button BatteryMain",
        });

        button.onclick = () => {
            addCart(element.id);
        };
        form.append(button);

        number_battery.append(form);
        infor_battery_content.append(number_battery);

        infor_battery.append(infor_battery_content);

        battery.append(child_img_battery);
        battery.append(img_battery);
        battery.append(infor_battery);

        parent_battery.append(battery);
    }
};

xhttp.open("GET", "http://127.0.0.1:8000/api/battery");
xhttp.send();

function addCart(id) {
    count = Number(document.querySelector("#count" + id).value);
    console.log(count);
    if (count != 0) {
        $thttp = "http://127.0.0.1:8000/api/cart/add/" + id + "-" + count;
        $.get($thttp, function (data, status) {
            if (data == "fail") {
                alert("bạn cân đăng nhập");
            } else {
                alert(data);
            }
        });

        document.getElementById("count" + id).value = "0";
    }
}
