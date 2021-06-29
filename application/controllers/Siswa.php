<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Siswa extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_app');
    }

    public function index_get()
    {
        $siswa = $this->M_app->view("siswa");
        if ($siswa) {
            $this->response( [
                'status' => true,
                'data' => $siswa
            ], 200 );
        }
    }
}
