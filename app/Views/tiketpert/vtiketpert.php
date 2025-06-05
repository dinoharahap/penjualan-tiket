<?= $this->extend('Template/template') ?>
<?= $this->section('konten') ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tiket Pertandingan</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="card-header">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                            Tambah Jadwal Pertandingan <i class="fa fa-plus"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Input TIket Pertandingan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url(); ?>tiketpert/simpandata" method="post">
                                            <div class="form-group">
                                                <div class="mb-3">
                                                    <label for="Idpertandingan" class="form-label">Id Pertandingan</label>
                                                    <input type="text" class="form-control" id="Idpertandingan" value="<?= $prt['id_pertandingan'] ?>" name="idpertandingan" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Idtiket" class="form-label">Id Tiket</label>
                                                    <input type="text" class="form-control" id="Idtiket" name="idtiket">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Tribun" class="form-label">Tribun</label>
                                                    <input type="text" class="form-control" id="Tribun" name="tribun">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Harga" class="form-label">Harga</label>
                                                    <input type="text" class="form-control" id="Harga" name="harga">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Jumlahtersedia" class="form-label">Jumlah tersedia</label>
                                                    <input type="text" class="form-control" id="Jumlahtersedia" name="jumlahtersedia">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table" border="2px solid " cellpadding="10px">
                            <thead>
                                <tr class="text-center">
                                    <td> ID PERTANDINGAN </td>
                                    <td> ID TIKET </td>
                                    <td> TRIBUN </td>
                                    <td> HARGA </td>
                                    <td> JUMLAH TERSEDIAN </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pertandingan as $prt) { ?>
                                    <tr>
                                        <td><?= $prt['id_pertandingan']; ?></td>
                                        <td><?= $prt['id_tiket']; ?></td>
                                        <td><?= $prt['tribun']; ?></td>
                                        <td><?= $prt['harga']; ?></td>
                                        <td><?= $prt['jumlah_tersedian']; ?></td>
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