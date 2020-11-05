<?php

// if($content){
//     echo view($content);
// }
echo view('partials/head');
echo view('partials/navbar');
echo view('partials/sidebar');
if($content){
    echo view($content);
}
echo view('partials/js');