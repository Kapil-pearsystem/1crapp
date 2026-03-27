// PIE CHART

var pieData = [
	{
		value: 300,
		color:"#589FFA",
		highlight: "#589FFA",
		label: ""
	},
	{
		value: 50,
		color: "#816BFF",
		highlight: "#816BFF",
		label: ""
	},
	{
		value: 100,
		color: "#FF63A5",
		highlight: "#FF63A5",
		label: ""
	},
	{
		value: 40,
		color: "#F4BD0E",
		highlight: "#F4BD0E",
		label: ""
	}
];


options = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke : true,

    //String - The colour of each segment stroke
    segmentStrokeColor : "rgba(0,0,0,0)",

    //Number - The width of each segment stroke
    segmentStrokeWidth : 1,

    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout : 50, // This is 0 for Pie charts

    //Number - Amount of animation steps
    animationSteps : 30,

    //String - Animation easing effect
    animationEasing : "none",

    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate : true,

    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale : true,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

}
window.onload = function(){
	var ctx = document.getElementById("chart-area").getContext("2d");
	window.myPie = new Chart(ctx).Pie(pieData, options);
};

// TABLE CHART