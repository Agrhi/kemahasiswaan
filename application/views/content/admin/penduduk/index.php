<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table caption-top" id="penduduk">
                    <caption>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modaladd">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </button>
                    </caption>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>NIK</td>
                            <td>No KK</td>
                            <td>Nama</td>
                            <td>Jenis Kelamin</td>
                            <!-- <td>Tanggal Lahir</td> -->
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($penduduk as $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nik ?></td>
                                <td>7210151108750001</td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->jk == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                <!-- <td><?= date('d-m-Y', strtotime($value->tgl_lahir)) ?></td> -->
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" onclick="detail('<?= $value->id ?>')" data-bs-target="#modaldetail">
                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" onclick="update('<?= $value->id ?>')" data-bs-target="#modaledit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" onclick="btnhapus('penduduk', '<?= $value->id ?>')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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
            <form action="<?= base_url('penduduk') ?>/add" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nik">N I K</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="N I K" value="<?= set_value('nik') ?>" required>
                                <?= form_error('nik', '<div id="nik" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nokk">Nomor Kartu Keluarga</label>
                                <input type="text" class="form-control" name="nokk" id="nokk" placeholder="Nomor Kartu Keluarga" value="<?= set_value('nokk') ?>" required>
                                <?= form_error('nokk', '<div id="nokk" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= set_value('nama') ?>" required>
                                <?= form_error('nama', '<div id="nama" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-select" name="jk" id="jk" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" <?= set_value('jk') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="P" <?= set_value('jk') == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <?= form_error('jk', '<div id="jk" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-select" name="agama" id="agama" required>
                                    <option value="">Pilih Agama</option>
                                    <?php foreach ($agama as $value) { ?>
                                        <option value="<?= $value->id; ?>" <?= set_value('agama') == $value->id ? 'selected' : '' ?>><?= $value->agama ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('agama', '<div id="agama" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= set_value('tgl_lahir') ?>" required>
                                <?= form_error('tgl_lahir', '<div id="tgl_lahir" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan Terakhir</label>
                                <select class="form-select" name="pendidikan" id="pendidikan" required>
                                    <option value="">Pilih Pendidikan Terakhir</option>
                                    <?php foreach ($pendidikan as $value) { ?>
                                        <option value="<?= $value->id; ?>" <?= set_value('pendidikan') == $value->id ? 'selected' : '' ?>><?= $value->tingkat_pendidikan . " - " . $value->keterangan ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('pendidikan', '<div id="pendidikan" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <select class="form-select" name="pekerjaan" id="pekerjaan" required>
                                    <option value="">Pilih Pekerjaan</option>
                                    <?php foreach ($pekerjaan as $value) { ?>
                                        <option value="<?= $value->id; ?>" <?= set_value('pekerjaan') == $value->id ? 'selected' : '' ?>><?= $value->pekerjaan . " - " . $value->ket ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('pekerjaan', '<div id="pekerjaan" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="status_kawin">Status Kawin</label>
                                <select class="form-select" name="status_kawin" id="status_kawin" required>
                                    <option value="">Pilih Status Kawin</option>
                                    <?php foreach ($statuskawin as $value) { ?>
                                        <option value="<?= $value->id; ?>" <?= set_value('status_kawin') == $value->id ? 'selected' : '' ?>><?= $value->status_kawin ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('status_kawin', '<div id="status_kawin" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="status_keluarga">Status Keluarga</label>
                                <select class="form-select" name="status_keluarga" id="status_keluarga" required>
                                    <option value="">Pilih Status Keluarga</option>
                                    <?php foreach ($statuskeluarga as $value) { ?>
                                        <option value="<?= $value->id; ?>" <?= set_value('status_keluarga') == $value->id ? 'selected' : '' ?>><?= $value->status_keluarga ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('status_keluarga', '<div id="status_keluarga" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="kk">Kepala Keluarga</label>
                                <select class="form-select" name="kk" id="kk" required>
                                    <option value="">Pilih Status Kepala Keluarga</option>
                                    <option value="Y" <?= set_value('kk') == 'Y' ? 'selected' : '' ?>>Kepala Keluarga</option>
                                    <option value="N" <?= set_value('kk') == 'N' ? 'selected' : '' ?>>Bukan Kepala Keluarga</option>
                                </select>
                                <?= form_error('kk', '<div id="kk" class="form-text text-danger text-left">', '</div>'); ?>
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
                <h5 class="modal-title">Edit Data</h5>
            </div>
            <form action="<?= base_url('penduduk') ?>/update" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ednama">Nama</label>
                                <input type="hidden" class="form-control" name="id" id="edid" value="<?= set_value('id') ?>">
                                <input type="text" class="form-control" name="nama" id="ednama" value="<?= set_value('nama') ?>">
                                <?= form_error('nama', '<div id="nama" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ednik">N I K</label>
                                <input type="text" class="form-control" name="nik" id="ednik" value="<?= set_value('nik') ?>">
                                <?= form_error('nik', '<div id="nik" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ednokk">Nomor Kartu Keluarga</label>
                                <input type="text" class="form-control" name="nokk" id="ednokk" value="<?= set_value('nokk') ?>">
                                <?= form_error('nokk', '<div id="nokk" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="edjk">Jenis Kelamin</label>
                                <select class="form-select" name="jk" id="edjk" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <?= form_error('jk', '<div id="jk" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="edagama">Agama</label>
                                <select class="form-select" name="agama" id="edagama" required>
                                    <?php foreach ($agama as $value) { ?>
                                        <option value="<?= $value->id; ?>"><?= $value->agama ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('agama', '<div id="agama" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="edtgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="edtgl_lahir" value="<?= set_value('tgl_lahir') ?>">
                                <?= form_error('tgl_lahir', '<div id="tgl_lahir" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="edpendidikan">Pendidikan terakhir</label>
                                <select class="form-select" name="pendidikan" id="edpendidikan" required>
                                    <?php foreach ($pendidikan as $value) { ?>
                                        <option value="<?= $value->id; ?>"><?= $value->tingkat_pendidikan . " - " . $value->keterangan ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('pendidikan', '<div id="pendidikan" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="edpekerjaan">Pekerjaan</label>
                                <select class="form-select" name="pekerjaan" id="edpekerjaan" required>
                                    <?php foreach ($pekerjaan as $value) { ?>
                                        <option value="<?= $value->id; ?>"><?= $value->pekerjaan . " - " . $value->ket ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('pekerjaan', '<div id="pekerjaan" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="edstatus_kawin">Status Kawin</label>
                                <select class="form-select" name="status_kawin" id="edstatus_kawin" required>
                                    <?php foreach ($statuskawin as $value) { ?>
                                        <option value="<?= $value->id; ?>"><?= $value->status_kawin ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('status_kawin', '<div id="status_kawin" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="edstatus_keluarga">Status Keluarga</label>
                                <select class="form-select" name="status_keluarga" id="edstatus_keluarga" required>
                                    <?php foreach ($statuskeluarga as $value) { ?>
                                        <option value="<?= $value->id; ?>"><?= $value->status_keluarga ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('status_keluarga', '<div id="status_keluarga" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="edkk">Status Kepala Keluarga</label>
                                <select class="form-select" name="kk" id="edkk" required>
                                    <option value="Y">Kepala Keluarga</option>
                                    <option value="N">Bukan Kepala Keluarga</option>
                                </select>
                                <?= form_error('kk', '<div id="kk" class="form-text text-danger text-left">', '</div>'); ?>
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

<!-- Modal Detail Data -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="modaldetailid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">Nama</div>
                    <div class="col" id="dnama"></div>
                </div>
                <div class="row">
                    <div class="col">N I K</div>
                    <div class="col" id="dnik"></div>
                </div>
                <div class="row">
                    <div class="col">Nomor Kartu Keluarga</div>
                    <div class="col" id="dnokk"></div>
                </div>
                <div class="row">
                    <div class="col">Jenis Kelamin</div>
                    <div class="col" id="djk"></div>
                </div>
                <div class="row">
                    <div class="col">Agama</div>
                    <div class="col" id="dagama"></div>
                </div>
                <div class="row">
                    <div class="col">Tanggal Lahir</div>
                    <div class="col" id="dtgl_lahir"></div>
                </div>
                <div class="row">
                    <div class="col">Pendidikan terakhir</div>
                    <div class="col" id="dpendidikan"></div>
                </div>
                <div class="row">
                    <div class="col">Pekerjaan</div>
                    <div class="col" id="dpekerjaan"></div>
                </div>
                <div class="row">
                    <div class="col">Status Kawin</div>
                    <div class="col" id="dstkawin"></div>
                </div>
                <div class="row">
                    <div class="col">Status Keluarga</div>
                    <div class="col" id="dstkeluarga"></div>
                </div>
                <div class="row">
                    <div class="col">Status Kepala Keluarga</div>
                    <div class="col" id="dstkepkeluarga"></div>
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
        $('#penduduk').DataTable();
    });

    // ajax get data penduduk for edit
    function update(id) {
        $.ajax({
            url: "<?= base_url('penduduk/getOneData') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#edid').val(data.id);
                $('#ednama').val(data.nama);
                $('#ednik').val(data.nik);
                $('#ednokk').val(data.nokk);
                $('#edjk').val(data.jk);
                $('#edagama').val(data.id_agama);
                $('#edtgl_lahir').val(data.tgl_lahir);
                $('#edpendidikan').val(data.id_pendidikan);
                $('#edpekerjaan').val(data.id_pekerjaan);
                $('#edstatus_kawin').val(data.id_status_kawin);
                $('#edstatus_keluarga').val(data.id_status_keluarga);
                $('#edkk').val(data.kk);
            }
        });
    }

    // ajax get data penduduk for detail
    function detail(id) {
        $.ajax({
            url: "<?= base_url('penduduk/getOneData') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#dnama').text(': ' + data.nama);
                $('#dnik').text(': ' + data.nik);
                $('#dnokk').text(': ' + data.nokk);
                $('#djk').text(': ' + (data.jk == 'L' ? 'Laki-laki' : 'Perempuan'));
                $('#dtgl_lahir').text(': ' + (moment(data.tgl_lahir).format('DD-MM-YYYY')));
                $('#dagama').text(': ' + data.agama);
                $('#dpendidikan').text(': ' + data.tingkat_pendidikan);
                $('#dpekerjaan').text(': ' + data.pekerjaan);
                $('#dstkawin').text(': ' + data.status_kawin);
                $('#dstkeluarga').text(': ' + data.status_keluarga);
                $('#dstkepkeluarga').text(': ' + (data.kk == 'Y' ? 'Kepala Keluarga' : 'Bukan Kepala Keluarga'));
            }
        });
    }
</script>