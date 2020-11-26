<?= $this->extend('template_admin') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <ol class="breadcrumb">
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons">home</i> Home
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons">business_center</i> Barang
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">archive</i> Edit barang material
                </li>
            </ol>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD BARANG MATERIAL</h2>
                        <ul class="header-dropdown m-r-5">
                            <button type="button" onclick="window.location.href='<?= base_url('administator/material') ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Back">
                                <i class="material-icons">keyboard_backspace</i>
                                <span>Back</span>
                                <!-- </a> -->
                            </button>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="/administator/material/update/<?= $barang['code_material']?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="code_material" value="<?= $barang['code_material']; ?>">
                            <input type="hidden" name="oldimg" value="<?= $barang['img']; ?>">
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('name')) ? 'error' : '' ?>">
                                    <input type="text" class="form-control" name="name" aria-required="true" value="<?= $barang['nama']; ?>">
                                    <label class="form-label">Nama Barang</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('name'); ?></label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('vendor')) ? 'error' : '' ?>">
                                    <input type="text" class="form-control" name="vendor" aria-required="true" value="<?= $barang['vendor']; ?>">
                                    <label class="form-label">Pengirim/Vendor</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('vendor'); ?></label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="1" class="form-control no-resize auto-growth" name="keterangan" style="overflow: hidden; overflow-wrap: break-word; height: 100px;"><?= $barang['keterangan']; ?></textarea>
                                    <label class="form-label">Keterangan</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Deadline</label>
                                    <input type="text" class="datepicker form-control" name="deadline" value="<?= $barang['deadline_date']; ?>">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Barang Diterima</label>
                                    <input type="text" class="datepicker form-control" name="received" value="<?= $barang['date_received'] == '0000-00-00 00:00:00' ? '' : $barang['date_received']  ?>">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="col-xs-6 col-md-3">
                                    <a href="javascript:void(0);" class="thumbnail">
                                        <label class="form-label custom-file-label">Foto Barang</label>
                                        <img src="/img/material/<?= $barang['img']; ?>" class="img-responsive img-preview">
                                    </a>
                                </div>
                                <div class="form-line <?= ($validation->hasError('gambar')) ? 'error' : '' ?>">
                                    <input type="file" name="gambar" class="form-control" id="gambar" onchange="previewImg()">
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('gambar'); ?></label>
                                </div>
                            </div>
                            <button class="btn bg-light-blue waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->

    </div>
</section>
<?= $this->endSection() ?>