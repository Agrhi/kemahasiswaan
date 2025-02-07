<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="struktur">
                <caption>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modaladd">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add
                    </button>
                </caption>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Judul</td>
                        <td>Lokasi</td>
                        <td>Tanggal</td>
                        <td>Foto</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($galeri as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->judul ?></td>
                            <td><?= $value->lokasi ?></td>
                            <td><?= $value->tanggal ?></td>
                            <td>
                                <?= $value->foto ?>
                                <a type="button" onclick="showimg('<?= $value->foto; ?>')" data-bs-toggle="modal" data-bs-target="#modalshow">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" onclick="detail('<?= $value->id ?>')" data-bs-target="#modaldetail">
                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" onclick="update('<?= $value->id ?>')" data-bs-target="#modaledit">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" onclick="btnhapus('galeriadm', '<?= $value->id ?>')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Tambah Data -->
<div class="modal fade" add="<?= $showModal == "add" ? "true" : "false" ?>" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="modaladdid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaladdid">Tambah Data</h5>
            </div>
            <form action="<?= base_url('galeriadm') ?>/add" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?= set_value('judul') ?>" required>
                                <?= form_error('judul', '<div id="judul" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" value="<?= set_value('deskripsi') ?>"></textarea>
                                <?= form_error('deskripsi', '<div id="deskripsi" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= set_value('tanggal') ?>" required>
                                <?= form_error('tanggal', '<div id="tanggal" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?= set_value('lokasi') ?>" required>
                                <?= form_error('lokasi', '<div id="lokasi" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="foto">Gambar</label>
                                <input type="file" class="form-control" name="foto" id="foto">
                                <?= form_error('foto', '<div id="ket" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="keterangan" value="<?= set_value('keterangan') ?>"></textarea>
                                <?= form_error('keterangan', '<div id="keterangan" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit Data -->
<div class="modal fade" edit="<?= $showModal == "edit" ? "true" : "false" ?>" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modaleditid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditid">Edit Data</h5>
            </div>
            <form action="<?= base_url('galeriadm') ?>/update" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edjudul">Judul</label>
                                <input type="hidden" class="form-control" name="id" id="edid" value="<?= set_value('id') ?>">
                                <input type="text" class="form-control" name="judul" id="edjudul" placeholder="Judul" value="<?= set_value('judul') ?>">
                                <?= form_error('judul', '<div id="judul" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="eddeskripsi">Deskripsi</label>
                                <textarea type="text" class="form-control" name="deskripsi" id="eddeskripsi" placeholder="Deskripsi" value="<?= set_value('deskripsi') ?>"></textarea>
                                <?= form_error('deskripsi', '<div id="deskripsi" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="edtanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="edtanggal" value="<?= set_value('tanggal') ?>">
                                <?= form_error('tanggal', '<div id="tanggal" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="edlokasi">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" id="edlokasi" placeholder="Lokasi" value="<?= set_value('lokasi') ?>">
                                <?= form_error('lokasi', '<div id="lokasi" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="edketerangan">Keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan" id="edketerangan" placeholder="Keterangan" value="<?= set_value('keterangan') ?>"></textarea>
                                <?= form_error('keterangan', '<div id="keterangan" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Show Struktur Data -->
<div class="modal fade" id="modalshow" tabindex="-1" role="dialog" aria-labelledby="modalshowid" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalshowid">Galeri Desa</h5>
            </div>
            <div class="modal-body">
                <div class="container" style="text-align: center;">
                    <img id="showgaleriimg" width="50%" alt="Galeri">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Detail Data -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="modaldetailid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">Judul</div>
                    <div class="col" id="djudul"></div>
                </div>
                <div class="row">
                    <div class="col">Tanggal</div>
                    <div class="col" id="dtanggal"></div>
                </div>
                <div class="row">
                    <div class="col">Lokasi</div>
                    <div class="col" id="dlokasi"></div>
                </div>
                <div class="row">
                    <div class="col">Deskripsi</div>
                    <div class="col" id="ddeskripsi"></div>
                </div>
                <div class="row">
                    <div class="col">Keterangan</div>
                    <div class="col" id="dketerangan"></div>
                </div>
                <div class="container" style="text-align: center;">
                    <img src="" id="dfoto" width="50%" alt="Foto Kegiatan">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#struktur').DataTable();
    });

    // ajax get data galeri for edit
    function update(id) {
        $.ajax({
            url: "<?= base_url('galeriadm/getOneData') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#edid').val(data.id);
                $('#edjudul').val(data.judul);
                $('#eddeskripsi').val(data.deskripsi);
                $('#edtanggal').val(data.tanggal);
                $('#edlokasi').val(data.lokasi);
                $('#edketerangan').val(data.keterangan);
            }
        });
    }

    function showimg(img) {
        $('#showgaleriimg').attr('src', '<?= base_url('assets/galeri/') ?>' + img);
    };

    // ajax get data galeri for detail
    function detail(id) {
        $.ajax({
            url: "<?= base_url('galeriadm/getOneData') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#djudul').text(': ' + data.judul);
                $('#dtanggal').text(': ' + data.tanggal);
                $('#dlokasi').text(': ' + data.lokasi);
                $('#ddeskripsi').text(': ' + data.deskripsi);
                $('#dketerangan').text(': ' + data.keterangan);
                $('#dfoto').attr('src', '<?= base_url('/assets/galeri/') ?>'+data.foto);
            }
        });
    }
</script>