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
                        <i class="material-icons">person</i> Barang Material
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
                            TABEL BARANG MATERIAL
                        </h2>
                        <ul class="header-dropdown m-r-5">
                            <button type="button" onclick="window.location.href='<?= base_url('administator/material/create') ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Tambah Barang">
                                <i class="material-icons">person_add</i>
                                <span>Add Barang</span>
                            </button>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>QR Code</th>
                                        <th>Nama</th>
                                        <th>Nama Pemilik</th>
                                        <th>Deadline</th>
                                        <th>Tanggal diterima</th>
                                        <th>Option</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>QR Code</th>
                                        <th>Nama</th>
                                        <th>Nama Pemilik</th>
                                        <th>Deadline</th>
                                        <th>Tanggal diterima</th>
                                        <th>Option</th>
                                    </tr>
                                </tfoot>

                                <?php $request = \Config\Services::request(); ?>
                                <tbody id="<?= $request->uri->getSegment(2); ?>">
                                    <?php
                                    foreach ($barang as $brng) : ?>
                                        <tr id="<?php echo $brng['code_material']; ?>">
                                            <td><img src="/img/material/<?= $brng['img']; ?>" alt="" width="45"></td>
                                            <td><?= $brng["code_material"] ?></td>
                                            <td><?= $brng["nama"] ?></td>
                                            <td><?= $brng["vendor"] ?></td>
                                            <td><?= tanggal(date($brng['deadline_date'])) ?></td>
                                            <td><?= $brng['date_received'] == '0000-00-00 00:00:00' ? 'Belum di terima' : tanggal(date($brng['date_received'])) ?></td>
                                            <td class="row">
                                                <div class="button-group">
                                                    <button type="button" onclick="window.location.href='<?= base_url('administator/material/detail/' . $brng['code_material']) ?>';" class="btn btn-xs bg-light-blue waves-effect" data-toggle="tooltip" data-placement="top" title="Detail">
                                                        <i class="material-icons clearfix">remove_red_eye</i>
                                                    </button>
                                                    <button type="button" onclick="window.location.href='<?= base_url('/administator/material/edit/' . $brng['code_material']) ?>';" class="btn btn-xs bg-default waves-effect" data-toggle="tooltip" data-placement="top" title="Edit" >
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <form action="/material/delete/<?= $brng['code_material']; ?>" style="display: inline;" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" class="btn btn-xs bg-red waves-effect rm" data-toggle="tooltip" data-placement="top" title="Delete">
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