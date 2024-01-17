<?php $this->layout('layout::main') ?>
<?php $this->start('main-area') ?>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Papar Permohonan</h2>

                    <?php if(isset($_GET['saved'])) : ?>
                        <div class="alert alert-success">Update has been saved</div>
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
            <div class="row d-flex">
                <div class="col-md-12 col-xl-12">
                    <form method="post">
                    <div class="row mb-3">
                        <div class="col-md-3">Nama</div>
                        <div class="col-md-9"><input class="form-control" type="text" name="nama" placeholder="Nama" value="<?=($data['nama'] ?? '')?>"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">No Kad Pengenalan</div>
                        <div class="col-md-9"><input class="form-control" type="text" name="nokp" placeholder="No Kad Pengenalan" value="<?=($data['nokp'] ?? '')?>"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">Tapak</div>
                        <div class="col-md-9"><input class="form-control" type="text" name="tapak" placeholder="Tapak" value="<?=($data['tapak'] ?? '')?>"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">Jenis Perniagaan</div>
                        <div class="col-md-9">
                            <select name="jenisperniagaan" class="form-control">
                                <?php foreach($jenisperniagaan as $jenis) : ?>
                                    <option value="<?=$jenis["id"];?>" <?=($data["jenis_perniagaan"] == $jenis["id"]) ? "selected" : ""; ?>><?=$jenis["jenis"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">Paparan</div>
                        <div class="col-md-9"><?=($user['username'] ?? '')?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">Status</div>
                        <div class="col-md-9"><?=($data['status'] ?? '')?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">Tarikh Permohonan</div>
                        <div class="col-md-9"><?=$data['created_at']?></div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col-md-3">Tukar Status</div>
                        <div class="col-md-9"><select name="status" class="form-control">
                            <option>baru</option>
                            <option value="semak">telah disemak</option>
                        </select>
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-9"><button class="btn btn-primary d-block w-100" type="submit">Kemaskini</button></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $this->stop() ?>