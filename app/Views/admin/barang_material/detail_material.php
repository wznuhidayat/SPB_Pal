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
                    <i class="material-icons">archive</i> Detail
                </li>
            </ol>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="header">
                        <h2>
                            DETAIL BARANG MATERIAL
                        </h2>
                        <ul class="header-dropdown m-r-5">
                            <button type="button" onclick="window.location.href='<?= base_url('administator/material') ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Tambah Barang">
                            <i class="material-icons">keyboard_backspace</i>
                            <span>Back</span>
                            </button>

                        </ul>
                    </div>
                    <div class="body">
                        <img src="/img/material/<?= $material['img'] ?>" class="img-responsive img-preview m-b-15 align-center" alt="" width="200">
                        <p><strong>Code material</strong> <span class="pull-right"><?= $material['code_material']; ?></span></p>
                        <p><strong>Nama Barang</strong> <span class="pull-right"><?= $material['nama']; ?></span></p>
                        <p><strong>Vendor</strong> <span class="pull-right"><?= $material['vendor']; ?></span></p>
                        <p><strong>Keterangan</strong> <span class="pull-right"><?= $material['keterangan']; ?></span></p>
                        <p><strong>Deadline</strong> <span class="pull-right"><?= $material['deadline_date']; ?></span></p>
                        <p><strong>Tanggal diterima</strong> <span class="pull-right"><?= $material['date_received']; ?></span></p>
                        <p><strong>Diubah terakhir</strong> <span class="pull-right"><?= $material['updated_at']; ?></span></p>
                        <p><strong>Dibuat pada</strong> <span class="pull-right"><?= $material['created_at']; ?></span></p>
                        <!-- <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                            <td class="align-rigth">USA, Europe</td>
                        </tr> -->
                        <button type="button" onclick="window.location.href='<?= base_url('/administator/material/edit/' . $material['code_material']) ?>';" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="Tambah Barang">
                        <i class="material-icons">mode_edit</i>
                        <span>Edit</span>
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="card">
                    <?php $qrCode = new CodeItNow\BarcodeBundle\Utils\QrCode(); ?>
                    <?php $qrCode
                        ->setText($material['code_material'])
                        ->setSize(180)
                        ->setPadding(10)
                        ->setErrorCorrection('high')
                        ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                        ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
                        ->setLabel('PT. PAL Indonesia')
                        ->setLabelFontSize(16)
                        ->setImageType(CodeItNow\BarcodeBundle\Utils\QrCode::IMAGE_TYPE_PNG); ?>
                    <img src="data:<?= $qrCode->getContentType() ?>;base64, <?= $qrCode->generate() ?>">
                    <button type="button" class="btn btn-block bg-cyan waves-effect">Print</button>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>