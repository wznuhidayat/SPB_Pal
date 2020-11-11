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
                            <button type="button" onclick="window.location.href='<?= base_url('administator/addPetugas') ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Tambah Admin">
                                <i class="material-icons">person_add</i>
                                <span>Add Petugas</span>
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
                                    foreach ($petugas as $ptgs) : ?>
                                        <tr id="<?php echo $ptgs['id_petugas']; ?>">
                                            <td><?= $ptgs["nama"] ?></td>
                                            <td><?= $ptgs["nip"] ?></td>
                                            <td><?= $ptgs["nama"] ?></td>
                                            <td><?= $ptgs["gender"] ?></td>
                                            <td class="row">
                                                <div class="button-group">
                                                    <button type="button" onclick="window.location.href='<?= base_url('petugas/edit/' . $ptgs['id_petugas']) ?>';" class="btn btn-xs bg-light-blue waves-effect" data-toggle="tooltip" data-placement="top" title="Detail">
                                                        <i class="material-icons clearfix">remove_red_eye</i>
                                                    </button>
                                                    <button type="button" onclick="window.location.href='<?= base_url('petugas/edit/' . $ptgs['id_petugas']) ?>';" class="btn btn-xs bg-default waves-effect" data-toggle="tooltip" data-placement="top" title="Edit" >
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <form action="/admin/delete/<?= $ptgs['id_petugas']; ?>" style="display: inline;" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" class="btn btn-xs bg-red waves-effect remove-ptgs" data-toggle="tooltip" data-placement="top" title="Delete">
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