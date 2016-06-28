<!doctype html>
<html lang="en">
<body>

<?php 
	$conn=mysql_connect('localhost','root','') or die("SQL SERVER 数据库连接失败！"); 
	//选择数据库
	mysql_select_db('danche',$conn); 
	
	mysql_query("set character set 'utf8'");//读库
	mysql_query("set names 'utf8'");//写库
	
	//sql语句
	$sql="SELECT nali FROM danche WHERE nali LIKE '图书馆'"; 
	$result=mysql_query($sql); 
	$tsg = mysql_num_rows($result); 
	
	$sql="SELECT nali FROM danche WHERE nali LIKE '新天地'"; 
	$result=mysql_query($sql); 
	$xtd = mysql_num_rows($result); 
	
	$sql="SELECT nali FROM danche WHERE nali LIKE '至善园4号'"; 
	$result=mysql_query($sql); 
	$z4 = mysql_num_rows($result); 
	
	$sql="SELECT nali FROM danche WHERE nali LIKE '慎思园9号'"; 
	$result=mysql_query($sql); 
	$s9 = mysql_num_rows($result); 
	
	$sql="SELECT sex FROM danche WHERE sex LIKE '男'"; 
	$result=mysql_query($sql); 
	$man = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex LIKE '女'"; 
	$result=mysql_query($sql); 
	$woman = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex LIKE '不明'"; 
	$result=mysql_query($sql); 
	$hehe = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='男' AND nali='图书馆'"; 
	$result=mysql_query($sql); 
	$m1 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='女' AND nali='图书馆'"; 
	$result=mysql_query($sql); 
	$w1 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='不明' AND nali='图书馆'"; 
	$result=mysql_query($sql); 
	$h1 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='男' AND nali='新天地'"; 
	$result=mysql_query($sql); 
	$m2 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='女' AND nali='新天地'"; 
	$result=mysql_query($sql); 
	$w2 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='不明' AND nali='新天地'"; 
	$result=mysql_query($sql); 
	$h2 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='男' AND nali='至善园4号'"; 
	$result=mysql_query($sql); 
	$m3 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='女' AND nali='至善园4号'"; 
	$result=mysql_query($sql); 
	$w3 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='不明' AND nali='至善园4号'"; 
	$result=mysql_query($sql); 
	$h3 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='男' AND nali='慎思园9号'"; 
	$result=mysql_query($sql); 
	$m4 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='女' AND nali='慎思园9号'"; 
	$result=mysql_query($sql); 
	$w4 = mysql_num_rows($result);
	
	$sql="SELECT sex FROM danche WHERE sex='不明' AND nali='慎思园9号'"; 
	$result=mysql_query($sql); 
	$h4 = mysql_num_rows($result);
	
	$sql="SELECT name,sex,num,nali,beiju,time FROM danche"; 
	$result=mysql_query($sql); 
	$num = mysql_num_rows($result); 
	
echo
"<html>
<head>
	<meta charset='utf-8'>
	<title>单车去哪儿</title>
	<link rel='stylesheet' href='bootstrap\css\bootstrap.css' type='text/css' />

  
</head>

<body>

 <script type=\"text/javascript\" src=\"js/jquery.min.js\"></script>
  <script type=\"text/javascript\" src=\"js/highcharts.js\"></script>
  <script type=\"text/javascript\" src=\"js/exporting.js\"></script>
  <script type=\"text/javascript\" src=\"js/highcharts-3d.js\"></script>


  <script>
  ﻿$(function () {
    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container1',
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: '【单车去哪儿】各地点丢车统计'
        },
        subtitle: {
            text: '各个地点丢车数量的统计与对比'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        
        xAxis: {
            categories: ['图书馆', '新天地', '至善园', '慎思园']
        },
        
		yAxis: {
            title: {
                text: '丢车次数'
            }
        },
		
        series: [{
            name: '丢车次数',
            data: [$tsg,$xtd,$z4,$s9
            ]
        }]
    });
    

    // Activate the sliders
    $('#R0').on('change', function(){
        chart.options.chart.options3d.alpha = this.value;
        showValues();
        chart.redraw(false);
    });
    $('#R1').on('change', function(){
        chart.options.chart.options3d.beta = this.value;
        showValues();
        chart.redraw(false);
    });

    function showValues() {
        $('#R0-value').html(chart.options.chart.options3d.alpha);
        $('#R1-value').html(chart.options.chart.options3d.beta);
    }
    showValues();
});				
  </script>


  
  <script>
    ﻿$(function () {
    $('#container2').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '【单车去哪儿】丢车性别比例'
        },
		subtitle: {
            text: '各性别丢车次数的统计与对比'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: '丢车次数',
            data: [
                ['男性',   $man],
                ['女性',   $woman],
                ['不明性别',   $hehe]
            ]
        }]
    });
});				
  </script>
  
  <script>
  $(function () {
    $('#container3').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: '丢车次数与地点、性别的综合统计'
        },

        xAxis: {
            categories: ['图书馆', '新天地', '至善园', '慎思园']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: '丢车次数'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style=\"color:{series.color}\">\u25CF</span> {series.name}: {point.y} '
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: '男性',
            data: [$m1, $m2, $m3, $m4],
            stack: 'male'
        }, {
            name: '女性',
            data: [$w1, $w2, $w3, $w4],
            stack: 'female'
        }, {
            name: '不明性别',
            data: [$h1, $h2, $h3, $h4],
            stack: 'hehe'
        }]
    });
});
	</script>
  

  
<div style='background:#009cff; width:100%; height:100%;'>
<center>
	<div class=\"btn-group\">
		<button type=\"button\" class=\"btn btn-primary\" onClick=\"location.href='index.php'\">单车去哪儿</button>
		<button type=\"button\" class=\"btn btn-success\" onClick=\"location.href='zuixin.php'\">最新丢车</button>
		<button type=\"button\" class=\"btn btn-info\" onClick=\"location.href='tongji.php'\">丢车统计</button>
		<button type=\"button\" class=\"btn btn-danger\" onClick=\"location.href='ditu.php'\">防偷地图</button>
        <button type=\"button\" class=\"btn btn-warning\" onClick=\"location.href='baogao.html'\">丢车报告</button>
	</div>
</center>
<div class=weibojuzhong>
<br>
<font color='#FFFFFF' size='+1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本站历史长河中有".$num."次单车被偷报告</font><br><br>
<table class=\"table table-bordered\">
<tr bgcolor=ffffff><td>
 <div id=\"container1\" style=\"min-width:300px;height:400px\"></div>
﻿	<div id=\"sliders\" style=\"min-width:200px;max-width: 400px;margin: 0 auto;\">
		<table>
			<tr><td>竖直移动</td><td><input id=\"R0\" type=\"range\" min=\"0\" max=\"45\" value=\"15\"/> <span id=\"R0-value\" class=\"value\"></span></td></tr>
			<tr><td>水平移动</td><td><input id=\"R1\" type=\"range\" min=\"0\" max=\"45\" value=\"15\"/> <span id=\"R1-value\" class=\"value\"></span></td></tr>
		</table>
	</div>
</td></tr>
</table><br>

<table class=\"table table-bordered\">
<tr bgcolor=ffffff><td>
<div id=\"container2\" style=\"min-width:300px;height:400px\"></div>
</td></tr>
</table><br>

<table class=\"table table-bordered\">
<tr bgcolor=ffffff><td>
<div id=\"container3\" style=\"min-width:300px;height:500px\"></div>
</td></tr>
</table>



</div>
	
	
	
	
	
  
 
</body>
</html>"; 

?>