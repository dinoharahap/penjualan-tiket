<?= $this->extend('Template/template') ?>
<?= $this->section('konten') ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Input Pertandingan</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
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
                      <h5 class="modal-title" id="exampleModalLabel">Input Jadwal Pertandingan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url(); ?>inputpertandingan/simpandata" method="post">
                        <div class="form-group">
                          <div class="mb-3">
                            <label for="Idpertandingan" class="form-label">Id Pertandingan</label>
                            <input type="text" class="form-control" id="Idpertandingan" name="idpertandingan">
                          </div>
                          <div class="mb-3">
                            <label for="Idjenispertandingan" class="form-label">Jenis Pertandingan</label>
                            <select class="form-control" id="jenispertandingan" name="jenispertandingan" required>
                              <option value="">..::PILIH JENIS PERTANDINGAN::..</option>
                              <?php foreach ($jenispertandingan as $jns) { ?>
                                <option value="<?php echo $jns['id_jenis_pertandingan'] . '-' . $jns['jenis_pertandingan'] ?>">
                                  <?php echo $jns['id_jenis_pertandingan'] . '-' . $jns['jenis_pertandingan'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="Timtuanrumah" class="form-label">Tim Tuan Rumah</label>
                            <input type="text" class="form-control" id="Timtuanrumah" name="timtuanrumah">
                          </div>
                          <div class="mb-3">
                            <label for="Timtamu" class="form-label">Tim Tamu</label>
                            <input type="text" class="form-control" id="Timtamu" name="timtamu">
                          </div>
                          <div class="mb-3">
                            <label for="Tanggal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control" id="Tanggal" name="tanggal">
                          </div>
                          <div class="mb-3">
                            <label for="Stadion" class="form-label">Stadion</label>
                            <input type="text" class="form-control" id="Stadion" name="stadion">
                          </div>
                          <!-- <div class="mb-3">
                                      <label for="jk" class="form-label">Jenis Kelamin</label>
                                      <select name="jk" id="jk" class="form-control">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                      </select>
                                    </div> -->
                          <!-- <div class="mb-3">
                                      <label for="id_jurusan" class="form-label">Jurusan</label>
                                      <input type="text" class="form-control" id="id_jurusan" name="id_jurusan">
                                    </div> -->
                          <!-- ini tempat join -->
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
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <?php if (session()->getFlashdata('pesan')) : ?>
            <?= session()->getFlashdata('pesan') ?>
          <?php endif; ?>
          <?php foreach ($pertandingan as $prt) { ?>
            <div class="x_content">
              <div class="card">
                <div class="card-body">
                  <table class="table" border="2px solid " cellpadding="10px">
                    <thead>
                      <tr class="text-center">
                        <td> ID PERTANDINGAN </td>
                        <td> TIM TUAN RUMAH </td>
                        <td> TIM TAMU </td>
                        <td> TANGGAL </td>
                        <td> STADION </td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="<?= base_url('/tiketpert/' . $prt["id_pertandingan"]) ?>" style="text-decoration: underline;"><?= $prt['id_pertandingan']; ?></a> </td>
                        <td><?= $prt['tim_tuan_rumah']; ?> </td>
                        <td><?= $prt['tim_tamu']; ?> </td>
                        <td><?= $prt['tanggal']; ?> </td>
                        <td><?= $prt['stadion']; ?> </td>
                        <td style="text-align: center;">
                          <button type="button" class="btn btn-sm btn-warning edit-data" data-toggle="modal" data-target="#edit" data-idpertandingan="<?= $prt['id_pertandingan'] ?>" data-timtuanrumah="<?= $prt['tim_tuan_rumah'] ?>" data-timtamu="<?= $prt['tim_tamu'] ?>" data-tanggal="<?= $prt['tanggal'] ?>" data-stadion="<?= $prt['stadion'] ?>">
                            <i class="fa fa-edit"></i></button>

                          <button type="button" class="btn btn-sm btn-danger hapus-data" data-toggle="modal" data-target="#hapus" data-idpertandingan="<?= $prt['id_pertandingan'] ?>">
                            <i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer-->
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal Pertandingan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url(); ?>inputpertandingan/updatedata" method="post">
            <div class="form-group">
              <div class="mb-3">
                <label for="idpertandingan_e" class="form-label">Id Pertandingan</label>
                <input type="text" class="form-control" id="idpertandingan_e" name="idpertandingan" readonly>
              </div>
              <div class="mb-3">
                <label for="jenispertandingan_e" class="form-label">Jenis Pertandingan</label>
                <select class="form-control" id="jenispertandingan_e" name="jenispertandingan" required>
                  <option value="">..::PILIH JENIS PERTANDINGAN::..</option>
                  <?php foreach ($jenispertandingan as $jns) { ?>
                    <option value="<?php echo $jns['id_jenis_pertandingan'] . '-' . $jns['jenis_pertandingan'] ?>">
                      <?php echo $jns['id_jenis_pertandingan'] . '-' . $jns['jenis_pertandingan'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="timtuanrumah" class="form-label">Tim Tuan Rumah</label>
                <input type="text" class="form-control" id="timtuanrumah" name="timtuanrumah">
              </div>
              <div class="mb-3">
                <label for="timtamu" class="form-label">Tim Tamu</label>
                <input type="text" class="form-control" id="timtamu" name="timtamu">
              </div>
              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal">
              </div>
              <div class="mb-3">
                <label for="stadion" class="form-label">Stadion</label>
                <input type="text" class="form-control" id="stadion" name="stadion">
              </div>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Edit Jadwal Pertandingan <i class="fas fa-edit"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal Pertandingan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url(); ?>inputpertandingan/hapusdata" method="post">
            <div class="form-group">
              <div class="mb-3">
                <b>Yakin ingin menghapus Jadwal Pertandingan ?</b>
                <input type="hidden" class="form-control" id="idpertandingan_h" name="idpertandingan">
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
      var IdPertandingan = $(this).data('idpertandingan');
      var IdJenisPertandingan = $(this).data('jenispertandingan');
      var TimTuanRumah = $(this).data('timtuanrumah');
      var TimTamu = $(this).data('timtamu');
      var Tanggal = $(this).data('tanggal');
      var Stadion = $(this).data('stadion');

      $(".modal-body #idpertandingan_e").val(IdPertandingan);
      $(".modal-body #jenispertandingan_e").val(IdJenisPertandingan); // tambahkan "_e" agar sesuai dengan elemen input di modal edit
      $(".modal-body #timtuanrumah").val(TimTuanRumah);
      $(".modal-body #timtamu").val(TimTamu);
      $(".modal-body #tanggal").val(Tanggal);
      $(".modal-body #stadion").val(Stadion);
    });

    $(document).on("click", ".hapus-data", function() {
      var IdPertandingan = $(this).data('idpertandingan');
      $(".modal-body #idpertandingan_h").val(IdPertandingan);
      $(".modal-body #pesan").html("<code>Yakin hapus jadwal pertandingan dengan Id : " + IdPertandingan + "??</code>");
    });
  });
</script>
<?= $this->endSection() ?>