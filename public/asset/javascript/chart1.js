const xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
var yValues = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

const xhttp = new XMLHttpRequest();

xhttp.onload = function () {
    const result = JSON.parse(this.responseText);

    for (let index = 0; index < result.length; index++) {
        yValues[result[index].month - 1] = result[index].count;
    }

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [
                {
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#10a95a",
                    borderColor: "#10a95a",
                    data: yValues,
                },
            ],
        },
        options: {
            legend: { display: false },
            scales: {
                yAxes: [{ ticks: { min: 0 } }],
            },
        },
    });
};

xhttp.open("GET", "http://127.0.0.1:8000/api/chart-1");
xhttp.send();
