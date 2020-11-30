<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php $qrCode = new CodeItNow\BarcodeBundle\Utils\QrCode(); ?>
<?php $qrCode
            ->setText('1111')
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('PT. PAL Indonesia (persero)')
            ->setLabelFontSize(16)
            ->setImageType(CodeItNow\BarcodeBundle\Utils\QrCode::IMAGE_TYPE_PNG); ?>
<img src="data:<?= $qrCode->getContentType() ?>;base64, <?= $qrCode->generate() ?>">
</body>
</html>