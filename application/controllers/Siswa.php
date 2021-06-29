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
        $id = $this->get('id');

        if (empty($id)) {
            $siswa = $this->M_app->view("siswa");
        } else {
            $siswa = $this->M_app->view_where("siswa", ['id_siswa' => $id]);
        }

        if ($siswa) {
            $this->response([
                'status' => true,
                'data' => $siswa,
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], 404);
        }
    }
}
