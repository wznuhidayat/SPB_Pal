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
                    <i class="material-icons">archive</i> Add Barang
                </li>
            </ol>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD BARANG</h2>
                        <ul class="header-dropdown m-r-5">
                            <button type="button" onclick="window.location.href='<?= base_url('administator/itemperson') ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Back">
                                <i class="material-icons">keyboard_backspace</i>
                                <span>Back</span>
                                <!-- </a> -->
                            </button>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="/administator/saveItemPerson" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('name')) ? 'error' : '' ?>">
                                    <input type="text" class="form-control" name="name" aria-required="true">
                                    <label class="form-label">Name</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('name'); ?></label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('name_user')) ? 'error' : '' ?>">
                                    <input type="text" class="form-control" name="name_user" aria-required="true">
                                    <label class="form-label">Pemilik</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('name_user'); ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label">Detail barang</label>
                                    <textarea rows="1" class="form-control no-resize auto-growth" name="keterangan" style="overflow: hidden; overflow-wrap: break-word; height: 100px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="col-xs-6 col-md-3">
                                    <a href="javascript:void(0);" class="thumbnail">
                                        <label class="form-label custom-file-label">Foto Barang</label>
                                        <img src="/img/barang/default.png" class="img-responsive img-preview">
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