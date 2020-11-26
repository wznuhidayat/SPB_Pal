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
                        <i class="material-icons">business_center</i> Divisi
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">archive</i> Add Code Divisi
                </li>
            </ol>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD CODE DIVISI</h2>
                        <ul class="header-dropdown m-r-5">
                            <button type="button" onclick="window.location.href='<?= base_url('administator/divisi') ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Back">
                                <i class="material-icons">keyboard_backspace</i>
                                <span>Back</span>
                                <!-- </a> -->
                            </button>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="/administator/divisi/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('code_divisi')) ? 'error' : '' ?>">
                                    <input type="text" class="form-control" name="code_divisi" aria-required="true">
                                    <label class="form-label">Code Divisi</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('code_divisi'); ?></label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('name_divisi')) ? 'error' : '' ?>">
                                    <input type="text" class="form-control" name="name_divisi" aria-required="true">
                                    <label class="form-label">Nama Divisi</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('name_divisi'); ?></label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="keterangan" ></textarea>
                                    <label class="form-label">Keterangan</label>
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