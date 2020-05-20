<?php
$this->load->view("templates_topnav/header");
?>
<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->load->view("ut/sidebar"); ?>
            </div>
            <!-- / END col-md-3 -->
            <!-- COL 9 -->
            <div class="col-lg-9">
                <div class="card card-primary shadow ">
                    <div class="card-header bg-info">
                        <strong>Dashboard</strong>
                    </div>
                    <!-- START MENU 1 -->
                    <div class="card-body p-2" style="display: block;">
                        <canvas id="bar-chart"></canvas>
                    </div>
                    <!--START MENU 1-->
                </div>
            </div>
            <!-- END col -md 9 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view("templates_topnav/footer");  ?>
<script>
    // Bar chart
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["Semester 1", "Semester 2", "Semester 3", "Semester 4", "Semester 5", "Semester 6", "Semester 7", "Semester 8"],
            datasets: [{
                label: "Mata Kuliah",
                backgroundColor: ["#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd"],
                data: <?= $jml_matkul; ?>
            }, {
                label: "SKS",
                backgroundColor: ["#8e5ea2","#8e5ea2","#8e5ea2","#8e5ea2","#8e5ea2","#8e5ea2","#8e5ea2","#8e5ea2",],
                data: <?= $jml_sks; ?>
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Rencana Perkuliahan Anda'
            }
        }
    });
</script>