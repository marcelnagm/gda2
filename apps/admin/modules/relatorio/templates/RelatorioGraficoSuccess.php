<?php use_helper('I18N') ?>

<!-- 1. Add these JavaScript inclusions in the head of your page -->
<script type="text/javascript" src="/admin/sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/admin/js/highcharts/js/highcharts.js"></script>


<!-- 1a) Optional: the exporting module -->
<script type="text/javascript" src="/admin/js/highcharts/js/modules/exporting.js"></script>


<!-- 2. Add the JavaScript to initialize the chart on document ready -->
<script type="text/javascript">

    /**
     * Visualize an HTML table using Highcharts. The top (horizontal) header
     * is used for series names, and the left (vertical) header is used
     * for category names. This function is based on jQuery.
     * @param {Object} table The reference to the HTML table to visualize
     * @param {Object} options Highcharts options
     */
    Highcharts.visualize = function(table, options) {

        // the categories
        options.xAxis.categories = [];
        $('tbody th', table).each( function(i) {
            options.xAxis.categories.push(this.innerHTML);
        });

        // the data series
        options.series = [];
        $('tr', table).each( function(i) {
            var tr = this;
            $('th, td', tr).each( function(j) {
                if (j > 0) { // skip first column
                    if (i == 0) { // get the name and init the series
                        options.series[j - 1] = {
                            //type: 'pie',
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

    // On document ready, call visualize on the datatable.
    $(document).ready(function() {
        var table = document.getElementById('datatable'),
        options = {
            chart: {
                renderTo: 'graph-container',
                defaultSeriesType: 'column',
                //defaultSeriesType: 'pie',
                inverted: true,
                margin: [ 50, 50, 70, 250]


            },
            title: {
                text: '<?php echo $form->getTitulo() ?>'
            },
            legend: {
            },
            xAxis: {
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.y +' '+ this.x;
                }
            }
        };


        Highcharts.visualize(table, options);
    });

</script>

<h1><?php echo $form->getTitulo() ?></h1>
<div class="info">

    <?php if(isset($ano)) : ?>
    <p>Ano: <?php echo $ano ?></p>
    <?php endif ?>

    <?php if(isset($semestre)) : ?>
    <p>Semestre: <?php echo $semestre ?></p>
    <?php endif ?>

    <?php if(isset($periodo)) : ?>
    <p>Período: <?php echo $periodo ?></p>
    <?php endif ?>

    <?php if(isset($periodos)) : ?>
    <p>
            <?php echo (count($periodos) > 1) ? 'Períodos': 'Período' ?>:
            <?php foreach ($periodos as $p): ?>
                <?php echo $p ?><?php echo ( current($periodos)>1 ) ? ', ' :'' ?>
            <?php endforeach ?>
    </p>
    <?php endif ?>

    <?php if(isset($cursos)) : ?>
    <p>
            <?php echo (count($cursos) > 1) ? 'Cursos': 'Curso' ?>:
            <?php foreach ($cursos as $curso): ?>
                <?php echo $curso->getDescricao() ?><?php echo ( current($cursos)>1 ) ? ', ' : '' ?>
            <?php endforeach ?>
    </p>
    <?php endif ?>


</div>





<?php if($list->count()): ?>

<table>
    <tr>
        <td>
            <div class="lista">
                <table id="datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>

                        <?php

                        foreach ($list as $object):
                            $even = @$i++ % 2;
                            ?>
                    <tbody>
                        <tr class="row-<?php echo $even ?>">
                            <th style="text-align:left">
                                        <?php echo $object['legenda'] ?>
                            </th>
                            <td>
                                        <?php echo $object['contador'] ?>
                            </td>
                        </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </td>
        <td>
            <div id="graph-container" style="float:right; width: 800px; height: 400px; margin: 0 auto"></div>
        </td>
    </tr>
</table>

<?php else: ?>
Nenhuma registro
<?php endif ?>



