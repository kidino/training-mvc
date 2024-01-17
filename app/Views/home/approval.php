<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>

<div class="container mt-5 mb-5 ">
    <div class="row">
        <div class="col">

            <a href="/user" class="btn btn-sm btn-outline-secondary mb-5">&laquo; back</a>

            <h1>User Details</h1>

            <?php if (isset($_GET['saved'])) : ?>
                <div class="alert alert-success">Update has been saved</div>
            <?php endif; ?>

            <?php if (isset($errors)) : ?>
                <div class="border rounded border-1 border-danger text-left text-danger my-3 p-3">
                    <?php foreach ($errors as $e) : ?>
                        <div><?= $e ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>No KP</th>
                        <th>Tapak</th>
                        <th>Jenis Perniagaan</th>
                        <th>Status</th>
                        <th>Semak Oleh</th>
                        <th>Tarikh Semak</th>
                        <th>Tarikh Lulus</th>
                        <th>Dilulus Oleh</th>
                    </tr>
                </thead>
                <tbody> <form action="/office/permohonan/<?= $permohonan['id'] ?>/approval" method="post">
                    <tr>
                        <input type="hidden" name="id" value="$permohonan[id]">

                        <td>$permohonan['id']</td>
                        <td>$permohonan['nama']</td>
                        <td>$permohonan['nokp']</td>
                        <td>$permohonan['tapak']</td>
                        <td>$permohonan['jenis_perniagaan']</td>
                        <td>
                            <select name="status">
                                <option value="baru">Baru</option>
                                <option value="telah disemak">Telah Disemak</option>
                                <option value="lulus">Lulus</option>
                                <option value="gagal">Gagal</option>
                            </select>
                        </td>
                        <td>$permohonan['semak_oleh']</td>
                        <td>$permohonan['tarikh_semak']</td>
                        <td>$permohonan['tarikh_lulus']</td>
                        <td>$permohonan['dilulus_oleh']</td>
                    </tr>
                 
                </tbody>
            </table>

                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Save</button></div>

            </form>

        </div>
    </div>
</div>

<?php $this->stop() ?>