var conditionExchange = true;

const handle = () => {
    const body = document.querySelector("body");
    let handle = document.createElement("div");

    Object.assign(handle, {
        className: "handle",
    });

    handle.innerHTML = "Vui lòng đợi hệ thống đang xử lí";

    body.append(handle);
};

const exchange = (id) => {
    if (conditionExchange) {
        conditionExchange = false;

        setTimeout(() => {
            http = "http://127.0.0.1:8000/exchange/voucher" + id;
            $.get(http, function (data, status) {
                conditionExchange = true;

                const hanldes = document.querySelector(".handle");
                hanldes.remove();

                alert(data);

                location.reload();
            });
        }, 500);

        handle();
    } else {
        alert("dg sử lí");
    }
};
