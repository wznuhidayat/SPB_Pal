<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<div id="deleted" class="alert bg-danger alert-danger" role="alert" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    Data berhasil dihapus
</div>