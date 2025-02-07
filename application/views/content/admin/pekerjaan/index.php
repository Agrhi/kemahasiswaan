<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="pekerjaan">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Pekerjaan</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pekerjaan as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->pekerjaan ?></td>
                            <td><?= $value->ket ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('#pekerjaan').DataTable();
    });
</script>