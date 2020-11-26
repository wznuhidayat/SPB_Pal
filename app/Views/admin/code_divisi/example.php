<?php 
$request = \Config\Services::request();

echo $request->uri->getSegment(1);

?>