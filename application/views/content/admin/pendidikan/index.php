<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="pendidikan">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Tingkat Pendidikan</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pendidikan as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->tingkat_pendidikan ?></td>
                            <td><?= $value->keterangan ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('#pendidikan').DataTable();
    });
</script>