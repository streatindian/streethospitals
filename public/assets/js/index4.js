$(function(e){
  'use strict'


  var chartdata = [
    {
      name: 'Profit',
      type: 'bar',
      data: [10, 15, 9, 18, 10, 15, 22]
    },
    {
      name: 'growth',
      type: 'bar',
      data: [10, 14, 10, 15, 9, 25, 16]
    }
  ];

  var chart = document.getElementById('echart1');
  var barChart = echarts.init(chart);

  var option = {
    grid: {
      top: '6',
      right: '0',
      bottom: '17',
      left: '25',
    },
    xAxis: {
      data: [ 'Mon', 'Tues' , 'Wed', 'Thurs' , 'Fri' , 'Sat' , 'Sun'],
      axisLine: {
        lineStyle: {
          color: 'rgba(227, 237, 252,0.5)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#a7b4c9'
      }
    },
	tooltip: {
		show: true,
		showContent: true,
		alwaysShowContent: true,
		triggerOn: 'mousemove',
		trigger: 'axis',
		axisPointer:
		{
			label: {
				show: false,
			}
		}

	},
    yAxis: {
      splitLine: {
        lineStyle: {
          color: 'rgba(227, 237, 252,0.5)'
        }
      },
      axisLine: {
        lineStyle: {
          color: 'rgba(227, 237, 252,0.5)'
        }
      },
      axisLabel: {
        fontSize: 10,
        color: '#a7b4c9'
      }
    },
    series: chartdata,
    color:[ '#4a56a3', '#e67605 ',],
	barMaxWidth: 10
	
  };

  barChart.setOption(option);


});


