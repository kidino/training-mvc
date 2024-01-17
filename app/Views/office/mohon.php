<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Borang Permohonan</h2>

                    <?php if(isset($_GET['success'])) :  ?>
                        <div class="alert alert-success">Permohonan telah berjaya dihantar</div>
                    <?php endif; ?>

                    <?php if(isset($errors)) : ?>
                    <div class="border rounded border-1 border-danger text-left text-danger">
                        <?php foreach($errors as $e) :?>
                        <div><?= $e?></div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="card mb-5 shadow">
                        <div class="card-body">
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="nama" placeholder="Nama Pemohon" value="<?=($data['nama'] ?? '')?>"></div>
                                <div class="mb-3"><input class="form-control" type="text" name="nokp" placeholder="No Kad Pengenalan" value="<?=($data['nokp'] ?? '')?>"></div>
                                <div class="mb-3"><input class="form-control" type="text" name="tapak" placeholder="Tapak Permohonan" value="<?=($data['tapak'] ?? '')?>"></div>
                                <div class="mb-3">
                                    <select name="jenis_perniagaan" id="jenis_perniagaan" class="form-select">
                                        <option selected>Jenis Perniagaan</option>
                                            <?php foreach( $jenis as $jenis) : ?>                                        
                                                <option value = "<?= $jenis['id']?>"><?= $jenis['jenis']?></option>
                                            <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Hantar</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->stop() ?>