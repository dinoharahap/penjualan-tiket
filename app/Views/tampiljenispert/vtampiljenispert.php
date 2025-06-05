<?= $this->extend('Template/template') ?>
<?= $this->section('konten') ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Plain Page</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table" border="2px solid " cellpadding="10px">
                            <thead>
                                <tr class="text-center">
                                    <td> TIM TUAN RUMAH </td>
                                    <td></td>
                                    <td> TIM TAMU </td>
                                    <td> JENIS PERTANDINGAN </td>
                                    <td> ID </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pertandingan as $jns) { ?>
                                    <tr>
                                        <td><?= $jns['tim_tuan_rumah']; ?></td>
                                        <td>VS</td>
                                        <td><?= $jns['tim_tamu']; ?></td>
                                        <td><?= $jns['jenis_pertandingan'] ?></td>
                                        <td><?= $jns['id_jenis_pertandingan'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('konten') ?>