<?php use \App\Lib\Utils; ?>
<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">

        <h1>Senarai Permohonan</h1>


<ul class="nav nav-tabs mb-3">
  <li class="nav-item">
    <a class="nav-link <?= Utils::is_active('/office/permohonan') ?>" href="/office/permohonan">Baru</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= Utils::is_active('/office/permohonan/semak') ?>"  href="/office/permohonan/semak">Perlu disemak</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= Utils::is_active('/office/permohonan/lulus') ?>" href="/office/permohonan/lulus">Lulus</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= Utils::is_active('/office/permohonan/gagal') ?>" href="/office/permohonan/gagal">Gagal</a>
  </li>
</ul>

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
            <th>&nbsp;</th>
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
                <td><?= $mohon['nama_semak']?></td>
                <td><?= $mohon['tarikh_semak']?></td>
                <td><?= $mohon['tarikh_lulus']?></td>
                <td><?= $mohon['nama_lulus']?></td>
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
