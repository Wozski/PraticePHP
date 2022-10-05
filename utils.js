function Today() {
  let date = new Date();
  let dd = date.getDate();
  let mm = date.getMonth() + 1;
  let yy = date.getFullYear();
  let today = yy + "-" + mm + "-" + dd;
  return today;
}

function Auto_Append(result, i) {
  return (
    "<tr>" +
    "<th class='id'>" +
    (i + 1) +
    "</th>" +
    "<th class='user_id'>" +
    result[i].user_id +
    "</th>" +
    "<td class='username'>" +
    result[i].username +
    "</td>" +
    "<td class='phone'>0" +
    result[i].phone +
    "</td>" +
    "<td class='gender'>" +
    (result[i].gender == 1
      ? "Male"
      : result[i].gender == 0
      ? "Female"
      : "Open") +
    "</td>" +
    "<td class='date'>" +
    result[i].create_at +
    "</td>" +
    "<td class='date'>" +
    result[i].membership +
    "</td>" +
    "</tr>;"
  );
}

function Doughnut(male, female, open) {
  const data = {
    labels: ["Male", "Female", "Open"],
    datasets: [
      {
        label: "Gender",
        data: [male, female, open],
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(54, 162, 235)",
          "rgb(255, 205, 86)",
        ],
        hoverOffset: 4,
      },
    ],
  };
  const config = {
    type: "doughnut",
    data: data,
    options: {},
  };
  new Chart($("#myChart2"), config);
}

function Makelabels(value) {
  let ans = [];
  for (let i = 0; i < value.length; i++) {
    switch (value[i].month) {
      case "January":
        ans.push(value[i].sum);
        break;
      case "February":
        ans.push(value[i].sum);
        break;
      case "March":
        ans.push(value[i].sum);
        break;
      case "April":
        ans.push(value[i].sum);
        break;
      case "May":
        ans.push(value[i].sum);
        break;
      case "June":
        ans.push(value[i].sum);
        break;
      case "July":
        ans.push(value[i].sum);
        break;
      case "August":
        ans.push(value[i].sum);
        break;
      case "September":
        ans.push(value[i].sum);
        break;
      case "October":
        ans.push(value[i].sum);
        break;
      case "November":
        ans.push(value[i].sum);
        break;
      case "December":
        ans.push(value[i].sum);
        break;
    }
  }
  const labels = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];
  const data = {
    labels: labels,
    datasets: [
      {
        label: "2022 新會員",
        backgroundColor: "rgb(255, 99, 132)",
        borderColor: "rgb(255, 99, 132)",
        data: ans,
      },
    ],
  };
  const config = {
    type: "line",
    data: data,
    options: {},
  };
  new Chart($("#myChart"), config);
}

function Percent(value, total) {
  let ans = (value / total) * 100;
  return ans;
}
