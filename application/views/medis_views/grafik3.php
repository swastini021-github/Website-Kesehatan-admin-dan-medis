<p></p>
<p></p>
<div class="conten" align="center">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><a href="<?= site_url('medis/data_kesehatan') ?>">
                    <i class="icon fa fa-thumbs-o-up fa-3x"></i>
                    <div class="info">
                        <h4>KESEHATAN</h4>
                    </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><a href="<?= site_url('medis/data_penduduk') ?>">
                    <i class="icon fa fa-files-o fa-3x"></i>
                    <div class="info">
                        <h4>PENDUDUK</h4>
                    </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><a href="<?= site_url('medis/data_kk') ?>">
                    <i class="icon fa fa-star fa-3x"></i>
                    <div class="info">
                        <h4>KK</h4>
                    </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><a href="<?= site_url('medis/index') ?>">
                    <i class="icon fa  fa-3x"></i>
                    <div class="info">
                        <h4>Tinggi Badan</h4>
                    </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><a href="<?= site_url('medis/grafik2') ?>">
                    <i class="icon fa  fa-3x"></i>
                    <div class="info">
                        <h4>Berat Badan</h4>
                    </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><a href="<?= site_url('medis/grafik3') ?>">
                    <i class="icon fa  fa-3x"></i>
                    <div class="info">
                        <h4>Tensi</h4>
                    </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><a href="<?= site_url('medis/grafik4') ?>">
                    <i class="icon fa  fa-3x"></i>
                    <div class="info">
                        <h4>Kadar Gula</h4>
                    </div>
            </div>
        </div>
    </div>
    <?php
    $this->db->select('bulan,tensi');
    $dataProdukChart = $this->db->get("tb_chart")->result();
    foreach ($dataProdukChart as $k => $v) {
        $arrProd[] = ['label' => $v->bulan, 'y' => $v->tensi];
    }
    // print_r(json_encode($arrProd, JSON_NUMERIC_CHECK));die();
    ?>

    <script type="text/javascript">
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light1", // "light2", "dark1", "dark2"
                animationEnabled: false, // change to true
                title: {
                    text: "Grafik Tensi"
                },
                data: [{
                    // Change type to "bar", "area", "spline", "pie",etc.
                    type: "area",
                    /*dataPoints: [
                        { label: "apple",  y: 10  },
                        { label: "orange", y: 15  },
                        { label: "banana", y: 25  },
                        { label: "mango",  y: 30  },
                        { label: "grape",  y: 28  }
                    ]*/
                    dataPoints: <?= json_encode($arrProd, JSON_NUMERIC_CHECK); ?>

                }]
            });
            chart.render();

        }
    </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</div>