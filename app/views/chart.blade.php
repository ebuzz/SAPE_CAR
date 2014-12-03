<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
    
        <!-- Autores -->
        {{ HTML::style('humans.txt') }} 
        
        <!-- Librerias JavaScript -->
        {{ HTML::script('js/jquery/jquery.min.js') }}
        {{ HTML::script('js/jquery/jquery.widget.min.js') }}
        {{ HTML::script('https://www.google.com/jsapi'); }}
        
        <title>Gráfica - {{{ $test }}}</title>
    </head>
    <script type="text/javascript">
        google.load("visualization", "1.1", {packages:["bar"]});
        google.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var test = GetURLParameter("test");
    		var startDate = GetURLParameter("startDate");
    		var endDate = GetURLParameter("endDate");
    		var sport = GetURLParameter("sport");
    		var gender = GetURLParameter("gender");
            
              var jsonData = $.ajax(
              {
                  url: "{{ url('results/getChartData'); }}",
                  dataType:"json",
                  data: {
                            test      : test,
                            startDate : startDate,
                            endDate   : endDate,
                            sport     : sport,
                            gender    : gender
                        },
                  async: false
              }).responseText;
            
            jsonData = JSON.parse(jsonData);
            var data = new google.visualization.DataTable(jsonData.table);
            
            var options = 
            {
              chart: 
              {
                title:    jsonData.title,
                subtitle: jsonData.date + '\n' + jsonData.sport + '\n' + jsonData.gender,
              },
              width: getWidth(test)
            };

            var chart = new google.charts.Bar(document.getElementById("chart_div"));

            chart.draw(data, options);
        }

        function GetURLParameter(sParam)
        {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');

            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
            }
        }
        
        function getWidth(test)
        {
            if (test == 1)
            {
                return 1600;
            }
            else
            {
                return 900;
            }
        }
    </script>
    <body>
        <div id="chart_div" style="height: 500px;"></div>
    </body>
</html>