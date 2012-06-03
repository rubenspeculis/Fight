jQuery(function () {
    // On document ready, call visualize on the datatable.
    jQuery(document).ready(function () {

        Highcharts.visualize = function (table, options) {
            // the categories
            options.xAxis.categories = [];
            jQuery('tbody th', table).each(function (i) {
                options.xAxis.categories.push(this.innerHTML);
            });
            // the data series
            options.series = [];
            jQuery('tr', table).each(function (i) {
                var tr = this;
                jQuery('th, td', tr).each(function (j) {
                    if (j > 0) { // skip first column
                        if (i == 0) { // get the name and init the series
                            options.series[j - 1] = {
                                name: this.innerHTML,
                                data: []
                            };
                        } else { // add values
                            options.series[j - 1].data.push(parseFloat(this.innerHTML));
                        }
                    }
                });
            });
            var chart = new Highcharts.Chart(options);
        }

////////////////////////////////////////////////
        var result = document.getElementById('result'),
            options1 = {
                chart: {
                    renderTo: 'rendertable',
                    type: 'line'
                },
                title: {
                    text: ''
                },
                xAxis: {
                },
                yAxis: {
                    title: {
                        text: ''
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                        this.y + ' ' + this.x.toLowerCase();
                    }
                },
		width: 600
            };			

	//Enable Graphs
		Highcharts.visualize(result, options1);

    });


});
