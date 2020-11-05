<?php namespace App\Controllers;

class Administator extends BaseController
{
	public function index()
	{
		$data = [
            'title' => 'Dashboard',
            'content' => 'admin/dashboard'
        ];
        echo view('template_admin',$data);
	}

}
