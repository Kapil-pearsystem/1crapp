const ctx = document.getElementById("myChart").getContext("2d");

const customTooltip = {
  mode: "index",
  enabled: false,
  custom: function (model) {
    const tooltip = document.getElementById("tooltip");

    if (model.opacity === 0) {
      tooltip.style.opacity = 0;
      return;
    }

    if (model.body) {
      const title = "<strong>" + tooltipTitleCallback(model.dataPoints) + "</strong>";
      const label =
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque eros non massa consequat, ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque eros non massa consequat, ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque eros non massa consequat, ac.";

      tooltip.innerHTML = title + "<br />" + label;
      
      tooltip.style.left = "auto";
      tooltip.style.right = "auto";
      
      const pos = this._chart.canvas.getBoundingClientRect();

      if (model.xAlign === "left") {
        tooltip.style.left = pos.left + model.caretX + "px";
      } else {
        tooltip.style.right = pos.right - model.caretX + "px";
      }

      tooltip.style.top = -50 + pos.top + model.caretY + "px";
      tooltip.style.opacity = 1;
    }
  }
};

const myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
      {
        label: "My First dataset",
        backgroundColor: "rgb(255, 99, 132)",
        borderColor: "rgb(255, 99, 132)",
        data: [0, 10, 5, 2, 20, 30, 45],
        fill: false
      }
    ]
  },
  options: {
    tooltips: customTooltip
  }
});

function tooltipTitleCallback(items) {
  if (items.length > 0) {
    const item = items[0];

    if (item.label) {
      return item.label;
    }

    return "No title";
  }
}