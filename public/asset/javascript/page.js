var pageRoot = document.querySelector("#page").value;

function setlink(page) {
    var link = location.href;
    link = link.slice(0, link.length - 1) + page;

    return link;
}

function setPage(event, count) {
    if (event.target.value > 0 && event.target.value <= count) {
        location.href = setlink(event.target.value);
    } else {
        document.querySelector("#page").value = pageRoot;
    }
}

const back = () => {
    page = Number(pageRoot) - 1;

    if (page >= 1) {
        location.href = setlink(page);
    }
};

const next = (count) => {
    page = Number(pageRoot) + 1;

    if (page <= count) {
        location.href = setlink(page);
    }
};
