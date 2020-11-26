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
                        <i class="material-icons">person</i> Admin
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
                <?= $this->include('crud_massage') ?>
                    <div class="header">
                        <h2>
                            TABEL CODE DIVISI
                        </h2>
                        <ul class="header-dropdown m-r-5">
                            <button type="button" onclick="window.location.href='<?= base_url('administator/divisi/create') ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Tambah Admin">
                                <i class="material-icons">person_add</i>
                                <span>Add Code Divisi</span>
                                <!-- </a> -->
                            </button>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Code Divisi</th>
                                        <th>Nama Divisi</th>
                                        <th>Keterangan</th>
                                        <th>Option</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Code Divisi</th>
                                        <th>Nama Divisi</th>
                                        <th>Keterangan</th>
                                        <th>Option</th>
                                    </tr>
                                </tfoot>
                                <?php $request = \Config\Services::request(); ?>
                                <tbody id="<?= $request->uri->getSegment(2); ?>">
                                    <?php
                                    foreach ($divisi as $dev) : ?>
                                        <tr id="<?php echo $dev['id_divisi']; ?>">
                                            <td><?= $dev["code_divisi"] ?></td>
                                            <td><?= $dev["nama_divisi"] ?></td>
                                            <td><?= $dev["keterangan"] ?></td>
                                            <td class="row">
                                                <div class="button-group js-sweetalert button">
                                                    
                                                    <button type="button" onclick="window.location.href='<?= base_url('administator/divisi/edit/' . $dev['id_divisi']) ?>';" class="btn btn-xs bg-default waves-effect" data-toggle="tooltip" data-placement="top" title="Edit" >
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <form action="/admin/delete/<?= $dev['id_divisi']; ?>" style="display: inline;" method="post" >
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" class="btn btn-xs bg-red waves-effect rm" data-toggle="tooltip" data-placement="top" title="Delete" >
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