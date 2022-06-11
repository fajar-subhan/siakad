$(document).ready(function()
{
    /**
     * Chart Pie Dashboard Status Mahasiswa
     */
    $.ajax({
        url : 'dashboard/status_mahasiswa',
        type : 'get',
        dataType : 'json',
        success : function(xhr)
        {
                var optionspie1 = {
                    chart: {
                        type: 'pie'
                    },
                    series: [xhr.active, xhr.inactive],
                    labels: ['Aktif', 'Tidak Aktif'],
                    colors : ['rgb(0, 227, 150)','rgb(254, 58, 58)'],
                    dataLabels: {
                        enabled: true,
                        formatter: function (val, opts) {
                            return opts.w.config.series[opts.seriesIndex]
                        },
                    }
                }
                    
                var chart1 = new ApexCharts(document.querySelector('#chartPie1'), optionspie1);
                chart1.render();
        }
    });

    
    /**
     * Chart Pie Dashboard Status Dosen
     */
    $.ajax({
        url : 'dashboard/status_dosen',
        type : 'get',
        dataType : 'json',
        success : function(xhr)
        {
            var optionspie2 = {
                chart: {
                    type: 'pie'
                },
                series: [xhr.active, xhr.inactive],
                labels: ['Aktif', 'Tidak Aktif'],
                colors : ['rgb(0, 227, 150)','rgb(254, 58, 58)'],
                dataLabels: {
                    enabled: true,
                    formatter: function (val, opts) {
                        return opts.w.config.series[opts.seriesIndex]
                    },
                }
            }

            var chart2 = new ApexCharts(document.querySelector('#chartPie2'), optionspie2);
            chart2.render();
        }
    })

});

//  var optionspie2 = {
//     chart: {
//         type: 'pie'
//     },
//     series: [4, 5],
//     labels: ['Aktif', 'Tidak Aktif'],
//     colors : ['rgb(0, 227, 150)','rgb(254, 58, 58)'],
//     dataLabels: {
//         enabled: true,
//         formatter: function (val, opts) {
//             return opts.w.config.series[opts.seriesIndex]
//         },
//     }
// }

// var chart2 = new ApexCharts(document.querySelector('#chartPie2'), optionspie2);
// chart2.render();

