<div wire:poll.5s>
    <div id="purchaseOrdersDoughnutDiv"></div>

    <script id="purchase-orders-data" type="application/json">{!! json_encode(['paid' => $paid, 'notPaid' => $notPaid]) !!}</script>

    @push('scripts')
    <script>
    (function(){
      var chartInit = false;
      var series, label, root;

      function initChart(data){
         if(chartInit){
            series.data.setAll([{category:'Paid', total:data.paid},{category:'Not Paid', total:data.notPaid}]);
            label.set("text","[fontSize:18px]Total Paid[/]:\n[bold fontSize:30px]"+data.paid+"[/]");
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
            root = am5.Root.new("purchaseOrdersDoughnutDiv");
            root.setThemes([am5themes_Animated.new(root)]);
            var chart = root.container.children.push(am5percent.PieChart.new(root,{startAngle:160,endAngle:380}));
            series = chart.series.push(am5percent.PieSeries.new(root,{valueField:'total',categoryField:'category',startAngle:160,endAngle:380,radius:am5.percent(70),innerRadius:am5.percent(50)}));
            series.ticks.template.set("forceHidden", true);
            series.labels.template.set("forceHidden", true);
            label = chart.seriesContainer.children.push(am5.Label.new(root,{textAlign:'center', centerY: am5.p100, centerX: am5.p50, text: "[fontSize:18px]Total Paid[/]:\n[bold fontSize:30px]"+data.paid+"[/]"}));
            series.data.setAll([{category:'Paid', total:data.paid},{category:'Not Paid', total:data.notPaid}]);
            chartInit = true;
         });
      }

      document.addEventListener('livewire:load', function(){
         var el = document.getElementById('purchase-orders-data');
         var data = el ? JSON.parse(el.textContent) : {paid:0, notPaid:0};
         initChart(data);

         Livewire.hook('message.processed', function(){
            var el = document.getElementById('purchase-orders-data');
            var newData = el ? JSON.parse(el.textContent) : {paid:0, notPaid:0};
            if(chartInit){
               series.data.setAll([{category:'Paid', total:newData.paid},{category:'Not Paid', total:newData.notPaid}]);
               label.set("text","[fontSize:18px]Total Paid[/]:\n[bold fontSize:30px]"+newData.paid+"[/]");
            } else {
               initChart(newData);
            }
         });
      });
    })();
    </script>
    @endpush
</div>
