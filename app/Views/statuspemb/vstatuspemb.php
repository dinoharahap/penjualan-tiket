<?= $this->extend('Template/template') ?>
<?= $this->section('konten') ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Status Pemesanan</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <?= session()->getFlashdata('pesan') ?>
                    <?php endif; ?>
                    <?php foreach ($pembelian as $pmb) { ?>
                        <div class="x_content">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table" border="2px solid" cellpadding="10px">
                                        <thead>
                                            <tr class="text-center">
                                                <td>ID PEMBELIAN</td>
                                                <td>ID PERTANDINGAN</td>
                                                <td>ID TIKET</td>
                                                <td>JUMLAH</td>
                                                <td>METODE PEMBAYARAN</td>
                                                <td>BUKTI PEMBAYARAN</td>
                                                <td>TOTAL HARGA</td>
                                                <td>TANGGAL PEMBELIAN</td>
                                                <td>STATUS</td>
                                                <td>ACTION</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $pmb['id_pembelian']; ?></td>
                                                <td><?= $pmb['id_pertandingan']; ?></td>
                                                <td><?= $pmb['id_tiket']; ?></td>
                                                <td><?= $pmb['jumlah']; ?></td>
                                                <td><?= $pmb['metode_pembayaran']; ?></td>
                                                <td>
                                                    <?php if ($pmb['bukti_pembayaran']) : ?>
                                                        <img src="<?= base_url('uploads/bukti/' . $pmb['bukti_pembayaran']); ?>" alt="Bukti Pembayaran" width="100">
                                                    <?php else : ?>
                                                        Tidak ada bukti pembayaran
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $pmb['total_harga']; ?></td>
                                                <td><?= $pmb['tanggal_pembelian']; ?></td>
                                                <td><?= $pmb['status']; ?></td>
                                                <td style="text-align: center;">
                                                    <button type="button" class="btn btn-sm btn-warning edit-data" data-toggle="modal" data-target="#edit" data-id_pembelian="<?= $pmb['id_pembelian'] ?>" data-id_pertandingan="<?= $pmb['id_pertandingan'] ?>" data-id_tiket="<?= $pmb['id_tiket'] ?>" data-jumlah="<?= $pmb['jumlah'] ?>" data-metode_pembayaran="<?= $pmb['metode_pembayaran'] ?>" data-bukti_pembayaran="<?= $pmb['bukti_pembayaran'] ?>" data-total_harga="<?= $pmb['total_harga'] ?>" data-tanggal_pembelian="<?= $pmb['tanggal_pembelian'] ?>" data-status="<?= $pmb['status'] ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger hapus-data" data-toggle="modal" data-target="#hapus" data-id_pembelian="<?= $pmb['id_pembelian'] ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>statuspembelian/updatedata" method="post">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="Id_pembelian" class="form-label">Id Pembelian</label>
                                <input type="text" class="form-control" id="Id_pembelian_e" name="Id_pembelian" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Id_pertandingan" class="form-label">Id Pertandingan</label>
                                <input type="text" class="form-control" id="Id_pertandingan" name="Id_pertandingan" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Id_tiket" class="form-label">Id tiket</label>
                                <input type="text" class="form-control" id="Id_tiket" name="Id_tiket" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Jumlah" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="Jumlah" name="Jumlah" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                <input type="text" class="form-control" id="Metode_pembayaran" name="Metode_pembayaran" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                                <input type="text" class="form-control" id="Bukti_pembayaran" name="Bukti_pembayaran" value="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Total_harga" class="form-label">Total Harga</label>
                                <input type="text" class="form-control" id="Total_harga" name="Total_harga" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                                <input type="text" class="form-control" id="Tanggal_pembelian" name="Tanggal_pembelian" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select id="Status" name="Status" class="form-control" required>
                                    <option value="PENDING">PENDING</option>
                                    <option value="DISETUJUI">DISETUJUI</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Simpan <i class="fas fa-edit"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal Hapus -->
    <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Status Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>statuspembelian/hapusdata" method="post">
                        <div class="form-group">
                            <div class="mb-3">
                                <b>Yakin ingin menghapus Status pembelian?</b>
                                <input type="hidden" class="form-control" id="Id_pembelian_h" name="Id_pembelian">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus Data <i class="fas fa-trash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
</div>

<?= $this->endSection('konten') ?>
<?= $this->section("scripts") ?>
<script>
    $(document).ready(function() {

        $(document).on("click", ".edit-data", function() {
            var Id_pembelian = $(this).data('id_pembelian');
            var Id_pertandingan = $(this).data('id_pertandingan');
            var Id_tiket = $(this).data('id_tiket');
            var Jumlah = $(this).data('jumlah');
            var Metode_pembayaran = $(this).data('metode_pembayaran');
            var Bukti_pembayaran = $(this).data('bukti_pembayaran');
            var Total_harga = $(this).data('total_harga');
            var Tanggal_pembelian = $(this).data('tanggal_pembelian');
            var Status = $(this).data('status');

            $(".modal-body #Id_pembelian_e").val(Id_pembelian);
            $(".modal-body #Id_pertandingan").val(Id_pertandingan);
            $(".modal-body #Id_tiket").val(Id_tiket);
            $(".modal-body #Jumlah").val(Jumlah);
            $(".modal-body #Metode_pembayaran").val(Metode_pembayaran);
            $(".modal-body #Bukti_pembayaran").val(Bukti_pembayaran);
            $(".modal-body #Total_harga").val(Total_harga);
            $(".modal-body #Tanggal_pembelian").val(Tanggal_pembelian);
            $(".modal-body #Status").val(Status);
        });

        $(document).on("click", ".hapus-data", function() {
            var Id_pembelian = $(this).data('id_pembelian');
            $(".modal-body #Id_pembelian_h").val(Id_pembelian);
            $(".modal-body #pesan").html("<code>Yakin hapus status pembelian dengan Id: " + Id_pembelian + "??</code>");
        });
    });
</script>
<?= $this->endSection() ?>