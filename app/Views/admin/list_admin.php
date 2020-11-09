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
                        <i class="material-icons">library_books</i> Library
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">archive</i> Data
                </li>
            </ol>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TABEL ADMIN
                        </h2>
                        <ul class="header-dropdown m-r-5">
                            <button type="button" onclick="window.location.href='<?= base_url('administator/addAdmin') ?>';" class="btn bg-light-green waves-effect" data-toggle="tooltip" data-placement="left" title="Tambah Admin">
                                <!-- <a href="<?= base_url() ?>/administator/addAdmin" > -->
                                <i class="material-icons">person_add</i>
                                <span>Add Admin</span>
                                <!-- </a> -->
                            </button>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Option</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Option</th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php
                                    foreach ($admin as $adm) : ?>
                                        <tr>
                                            <td><?= $adm["nama"] ?></td>
                                            <td><?= $adm["nip"] ?></td>
                                            <td><?= $adm["nama"] ?></td>
                                            <td><?= $adm["gender"] ?></td>
                                            <td class="row">
                                                <div class="button-group">
                                                    <button type="button" onclick="window.location.href='<?= base_url('admin/edit/' . $adm['id_admin']) ?>';" class="btn btn-xs bg-blue waves-effect">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" onclick="window.location.href='<?= base_url('admin/edit/' . $adm['id_admin']) ?>';" class="btn btn-xs bg-yellow waves-effect">
                                                        <i class="material-icons clearfix">remove_red_eye</i>
                                                    </button>
                                                    <form action="/admin/delete/<?= $adm['id_admin']; ?>" style="display: inline;" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-xs bg-red waves-effect">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->

    </div>
</section>
<?= $this->endSection() ?>