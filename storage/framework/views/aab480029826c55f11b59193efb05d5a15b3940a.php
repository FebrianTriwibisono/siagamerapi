<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row">


    <div id="page-content">
        <div class="block">
            <!-- Example Title -->
            <div class="block-title">
                <h2>Grafik</h2>
            </div>
            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                option
            </a>
            <div class="collapse" id="collapseExample">
                <div class="well">
                    <div class="row">
                        <div class="col-xs-10">
                            <div class="form-inline">
                                <div class="form-group" >
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                            <select name="option" id="option" class="form-control  select2-multi "  multiple="multiple" style="width: 300px">
                                                <?php $__currentLoopData = $option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($option); ?>"><?php echo e($option); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button  id="submit" class="btn btn-primary">Apply</button>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Type Chart">
                                <input type="checkbox" id="typechart" name="typechart"  >
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Example Title -->
            <!-- Example Content -->
            <div id="container" style="width: 100%;">
                <div class="block-options pull-right">
                    <button  id="save" class="btn btn-sm btn-info dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Download"><span class="caret"></span></button>
                </div>
                <canvas id="a">
                
                </canvas>
            </div>
        </div>
        <script>
            var opsi = <?php echo json_encode($opsi); ?>;
            var color = Chart.helpers.color;
            var tipe = "line";
            var barChartData = {
                labels: <?php echo $label; ?>,
                datasets: [{
                    label: 'suhu',
                    backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                    borderColor: window.chartColors.red,
                    borderWidth: 1,
                    data:<?php echo $data; ?>

                }]
            };
            window.onload = function() {
                var ctx = document.getElementById("a").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: tipe,
                    data: barChartData,
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: '<?php echo $title; ?>'
                        }
                    }
                });
            };
            var colorNames = Object.keys(window.chartColors);
            document.getElementById('typechart').addEventListener('change',function(){
                if(this.checked) {
                    window.myBar.destroy()
                    tipe = 'bar';
                    var ctx = document.getElementById("a").getContext("2d");
                    window.myBar = new Chart(ctx, {
                        type: tipe,
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: '<?php echo $title; ?>'
                            }
                        }
                    });
                } else {
                    window.myBar.destroy()
                    tipe = 'bar';
                    var ctx = document.getElementById("a").getContext("2d");
                    window.myBar = new Chart(ctx, {
                        type: tipe,
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: '<?php echo $title; ?>'
                            }
                        }
                    });
                }
            });
            document.getElementById('save').addEventListener('click', function() {
                $("#a").get(0).toBlob(function(blob) {
                    saveAs(blob, "chart_1.png");
                });
            });
            document.getElementById('submit').addEventListener('click', function() {
                var substr = $("#option").val();
                
                barChartData.datasets.splice(0, 100);
                window.myBar.update();
                if (substr == null) {
                    var colorName = colorNames[barChartData.datasets.length % colorNames.length];;
                    var dsColor = window.chartColors[colorName];
                    var newDataset = {
                        label: "data",
                        backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                        borderColor: dsColor,
                        borderWidth: 1,
                        data: <?php echo $data; ?>

                    };
                    barChartData.datasets.push(newDataset);
                    window.myBar.update();
                    
                }else{
                    
                    $.each(substr , function(i, val) {
                        var colorName = colorNames[barChartData.datasets.length % colorNames.length];
                        var dsColor = window.chartColors[colorName];
                        var newDataset = {
                            label: substr[i],
                            backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                            borderColor: dsColor,
                            borderWidth: 1,
                            data: opsi[substr[i]]
                        };
                        barChartData.datasets.push(newDataset);
                        window.myBar.update();
                    });
                }
            });
        </script>
        <!-- END Example Content -->
    </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>