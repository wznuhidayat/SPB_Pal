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
                        <i class="material-icons">person</i> Petugas
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">archive</i> Add Petugas
                </li>
            </ol>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD PETUGAS</h2>
                        <ul class="header-dropdown m-r-5">
                            <button type="button" onclick="window.location.href='<?= base_url('administator/petugas') ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Tambah Admin">
                                <!-- <a href="<?= base_url() ?>/administator/addAdmin" > -->
                                <i class="material-icons">keyboard_backspace</i>
                                <span>Back</span>
                                <!-- </a> -->
                            </button>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="/administator/savePetugas" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('nip')) ? 'error' : '' ?>">
                                    <input type="number" class="form-control" name="nip" pattern="[0-9]{8,12}" required>
                                    <label class="form-label">NIP</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('nip'); ?></label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('name')) ? 'error' : '' ?>">
                                    <input type="text" class="form-control" name="name" required aria-required="true">
                                    <label class="form-label">Name</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('name'); ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="gender" id="male" value="L" class="with-gap">
                                <label for="male">Laki-laki</label>

                                <input type="radio" name="gender" id="female" value="P" class="with-gap">
                                <label for="female" class="m-l-20">Perempuan</label>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('password')) ? 'error' : '' ?>">
                                    <input type="password" class="form-control" name="password" required="" aria-required="true">
                                    <label class="form-label">Password</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('password'); ?></label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line <?= ($validation->hasError('passconf')) ? 'error' : '' ?>">
                                    <input type="password" class="form-control" name="passconf" required="" aria-required="true">
                                    <label class="form-label">Password Confirmation</label>
                                    <label id="minmaxlength-error" class="error" for="minmaxlength"><?= $validation->getError('passconf'); ?></label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="file" name="file" class="form-control">
                                    <!-- <label class="form-label">Password Confirmation</label> -->
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