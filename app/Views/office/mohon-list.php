<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>
<a href="/office/permohonan">Baru</a> | <a href="/office/permohonan/semak">Perlu Kelulusan</a> | <a href="/office/permohonan/lulus">Lulus</a> | <a href="/office/permohonan/gagal">Gagal</a> | 
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>User List</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>nama</th>
            <th>nokp</th>
            <th>tapak</th>
            <th>jenis_perniagaan</th>
            <th>status</th>
            <th>created_at</th>
            <th>semak_oleh</th>
            <th>tarikh_semak</th>
            <th>tarikh_lulus</th>
            <th>dilulus_oleh</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $mohons as $mohon) : ?>
            <tr>
                <td><?= $mohon['id']?></td>
                <td><?= $mohon['nama']?></td>
                <td><?= $mohon['nokp']?></td>
                <td><?= $mohon['tapak']?></td>
                <td><?= $mohon['jenis']?></td>
                <td><?= $mohon['status']?></td>
                <td><?= $mohon['created_at']?></td>
                <td><?= $mohon['semak_oleh']?></td>
                <td><?= $mohon['tarikh_semak']?></td>
                <td><?= $mohon['tarikh_lulus']?></td>
                <td><?= $mohon['dilulus_oleh']?></td>
                <td>
                    <?php 
                    if($mohon['status'] == 'baru'){
                    ?>
                        <a class="btn btn-sm btn-secondary" href="/office/permohonan/<?= $mohon['id']?>/review">Edit</a>
                    <?php
                    }
                    elseif($mohon['status'] == 'semak'){
                    ?>
                        <a class="btn btn-sm btn-secondary" href="/office/permohonan/<?= $mohon['id']?>/approval">Edit</a>
                    <?php
                    }
                   elseif(($mohon['status'] == 'lulus')||($mohon['status'] == 'gagal')){
                    ?>
                       &nbsp;
                    <?php
                    }
                    ?>
                    </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        </div>
    </div>
</div>

<?php $this->stop() ?>
