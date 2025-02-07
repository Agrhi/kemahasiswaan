<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="agama">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Agama</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($agama as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->agama ?></td>
                            <td><?= $value->status == 'Y' ? "Aktif" : "Tidak Aktif";  ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('#agama').DataTable();
    });
</script>