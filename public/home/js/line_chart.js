anychart.onDocumentReady(function () {
  
  // add data
  var data = [
    ["0", 1, 0, 0],
    ["2", 4, 0, 0],
    ["4", 6, 0, 0],
    ["6", 9, 1, 0],
    ["8", 12, 2, 0],
    ["10", 13, 5, 1],
    ["12", 15, 6, 1],
    ["14", 16, 9, 1],
    ["16", 16, 10, 4],
    ["18", 17, 11, 5],
    ["20", 17, 13, 6],
    ["22", 17, 14, 7],
    ["24", 17, 14, 10],
    ["26", 17, 14, 12],
    ["28", 19, 16, 12],
    ["30", 20, 17, 14]
  ];


  var data1 = [
    ["0", 1, 0, 0],
    ["2", 4, 0, 0],
    ["4", 6, 0, 0],
    ["6", 9, 1, 0],
    ["8", 12, 2, 0],
    ["10", 13, 5, 1],
    ["12", 15, 6, 1],
    ["14", 16, 9, 1],
    ["16", 16, 10, 4],
    ["18", 17, 11, 5],
    ["20", 17, 13, 6],
    ["22", 17, 14, 7],
    ["24", 17, 14, 10],
    ["26", 17, 14, 12],
    ["28", 19, 16, 12],
    ["30", 20, 17, 14]
  ];
  
  // create a data set
  var dataSet = anychart.data.set(data);
  var dataSet1 = anychart.data.set(data1);

  // map the data for all series
  var firstSeriesData = dataSet.mapAs({x: 0, value: 1});
  var secondSeriesData = dataSet.mapAs({x: 0, value: 2});
  var thirdSeriesData = dataSet.mapAs({x: 0, value: 3});

  var firstSeriesData1 = dataSet1.mapAs({x: 0, value: 1});
  var secondSeriesData1 = dataSet1.mapAs({x: 0, value: 2});
  var thirdSeriesData1 = dataSet1.mapAs({x: 0, value: 3});

  // create a line chart
  var chart = anychart.line();
  var chart1 = anychart.line();

  // create the series and name them
  var firstSeries = chart.line(firstSeriesData);
  firstSeries.name("Operating Income");
  var secondSeries = chart.line(secondSeriesData);
  secondSeries.name("Operating Expenses");
  var thirdSeries = chart.line(thirdSeriesData);
  thirdSeries.name("Cash Flow");


  var firstSeries1 = chart1.line(firstSeriesData1);
  firstSeries1.name("Property Value");
  var secondSeries1 = chart1.line(secondSeriesData1);
  secondSeries1.name("Loan Balance");
  var thirdSeries1 = chart1.line(thirdSeriesData1);
  thirdSeries1.name("Total Equity");



  // add a legend and customize it
  chart.legend().enabled(true).fontSize(14).padding([10, 0, 10, 0]);
  chart1.legend().enabled(true).fontSize(14).padding([10, 0, 10, 0]);
  
  // add a title and customize it
  chart
    .title()
    .enabled(true)
    .useHtml(true)
    .text(
      '<span style="color: #006331; font-size: 20px;"></span>' +
        '<br/><span style="font-size: 16px;"></span>'
    );

	chart1
    .title()
    .enabled(true)
    .useHtml(true)
    .text(
      ''
    );
  
  // name the axes
  chart.yAxis().title("");
  chart.xAxis().title("Holding Period (Years)");

  chart1.yAxis().title("");
  chart1.xAxis().title("Holding Period (Years)");
  
  // customize the series markers
  firstSeries.hovered().markers().type("circle").size(4);
  secondSeries.hovered().markers().type("circle").size(4);
  thirdSeries.hovered().markers().type("circle").size(4);

  firstSeries1.hovered().markers().type("circle").size(4);
  secondSeries1.hovered().markers().type("circle").size(4);
  thirdSeries1.hovered().markers().type("circle").size(4);
  
  // turn on crosshairs and remove the y hair
  chart.crosshair().enabled(true).yStroke(null).yLabel(false);
  chart1.crosshair().enabled(true).yStroke(null).yLabel(false);
  
  
  chart.yAxis().labels().format("${%value}");
  chart1.yAxis().labels().format("${%value}");
  
  
  // change the tooltip position
  chart.tooltip().positionMode("point");
  chart.tooltip().position("right").anchor("left-center").offsetX(5).offsetY(5);
  
  chart1.tooltip().positionMode("point");
  chart1.tooltip().position("right").anchor("left-center").offsetX(5).offsetY(5);
  
  // customize the series stroke in the normal state
  firstSeries.normal().stroke("#2d75ce", 2.5);
  secondSeries.normal().stroke("#db7346", 2.5);
  thirdSeries.normal().stroke("#32a783", 2.5);

  firstSeries1.normal().stroke("#2d75ce", 2.5);
  secondSeries1.normal().stroke("#db7346", 2.5);
  thirdSeries1.normal().stroke("#32a783", 2.5);
  
  // specify where to display the chart
  chart.container("container_line");
  chart1.container("container_line1");
  
  // draw the resulting chart
  chart.draw();
  chart1.draw();
  
});