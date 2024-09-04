<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("pieChartDiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            startAngle: 160, endAngle: 380
        })
    );

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

    var series0 = chart.series.push(
        am5percent.PieSeries.new(root, {
            valueField: "total",
            categoryField: "category",
            startAngle: 160,
            endAngle: 380,
            radius: am5.percent(70),
            innerRadius: am5.percent(65)
        })
    );

    var colorSet = am5.ColorSet.new(root, {
        colors: [series0.get("colors").getIndex(0)],
        passOptions: {
            lightness: -0.05,
            hue: 0
        }
    });

    series0.set("colors", colorSet);

    series0.ticks.template.set("forceHidden", true);
    series0.labels.template.set("forceHidden", true);

    var series1 = chart.series.push(
        am5percent.PieSeries.new(root, {
            startAngle: 160,
            endAngle: 380,
            valueField: "printed",
            innerRadius: am5.percent(80),
            categoryField: "category"
        })
    );

    series1.ticks.template.set("forceHidden", true);
    series1.labels.template.set("forceHidden", true);

    var label = chart.seriesContainer.children.push(
        am5.Label.new(root, {
            textAlign: "center",
            centerY: am5.p100,
            centerX: am5.p50,
            text: "[fontSize:18px]Total passes printed[/]:\n[bold fontSize:30px]{!! $totalDelegates !!}[/]"
        })
    );

    var data = {!! $passPrintedStats !!};

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series0.data.setAll(data);
    series1.data.setAll(data);

});
</script>
