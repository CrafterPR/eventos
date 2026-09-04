<div wire:poll.5s>
    <div id="ticketPurchasesChartDiv"></div>

    <script id="ticket-purchases-data" type="application/json">{!! json_encode($data) !!}</script>

    @push('scripts')
    <style>
        #ticketPurchasesChartDiv { width:100%; height:360px; min-height:220px; }
    </style>
    <script>
    (function(){
      var chartInit = false;
      var root, chart, xAxis, yAxis, paidSeries, unpaidSeries, legend;

      function initChart(data){
         if(chartInit){
            xAxis.data.setAll(data);
            paidSeries.data.setAll(data);
            unpaidSeries.data.setAll(data);
            return;
         }

         function ensureAm5(callback){
             if(typeof am5 !== 'undefined'){
                 am5.ready(callback);
                 return;
             }
             var wait = setInterval(function(){
                 if(typeof am5 !== 'undefined'){
                     clearInterval(wait);
                     am5.ready(callback);
                 }
             }, 200);
         }

         ensureAm5(function(){
            // clean previous root if exists to avoid duplicates when Livewire swaps DOM
            try{
                if(typeof am5 !== 'undefined' && typeof am5.Root !== 'undefined' && typeof am5.Root.get === 'function'){
                    var prev = am5.Root.get("ticketPurchasesChartDiv");
                    if(prev){ prev.dispose(); }
                }
            } catch(e) { /* ignore */ }

            root = am5.Root.new("ticketPurchasesChartDiv");
            root.setThemes([am5themes_Animated.new(root)]);

            chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "none",
                wheelY: "none",
                layout: root.verticalLayout
            }));

            xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                categoryField: "category",
                renderer: am5xy.AxisRendererX.new(root, {minGridDistance: 30})
            }));

            yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {})
            }));

            paidSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Paid",
                stacked: true,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "paid",
                categoryXField: "category"
            }));

            paidSeries.columns.template.setAll({cornerRadiusTL: 5, cornerRadiusTR: 5});
            paidSeries.set("fill", am5.color(0x28a745));
            paidSeries.set("stroke", am5.color(0x28a745));

            unpaidSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Unpaid",
                stacked: true,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "unpaid",
                categoryXField: "category"
            }));

            unpaidSeries.columns.template.setAll({cornerRadiusTL: 5, cornerRadiusTR: 5});
            unpaidSeries.set("fill", am5.color(0xffc107));
            unpaidSeries.set("stroke", am5.color(0xffc107));

            // Legend
            legend = chart.children.push(am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            }));
            legend.data.setAll([paidSeries, unpaidSeries]);

            xAxis.data.setAll(data);
            paidSeries.data.setAll(data);
            unpaidSeries.data.setAll(data);

            chartInit = true;
         });
      }

      document.addEventListener('livewire:load', function(){
         var el = document.getElementById('ticket-purchases-data');
         var data = el ? JSON.parse(el.textContent) : [];
         initChart(data);

         Livewire.hook('message.processed', function(){
            var el = document.getElementById('ticket-purchases-data');
            var newData = el ? JSON.parse(el.textContent) : [];
            if(chartInit){
               xAxis.data.setAll(newData);
               paidSeries.data.setAll(newData);
               unpaidSeries.data.setAll(newData);
            } else {
               initChart(newData);
            }
         });
      });
    })();
    </script>
    @endpush
</div>
