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

    public function index_delete()
    {
        $id = $this->delete('id');
        if ($this->M_app->delete_data("siswa", ['id_siswa' => $id]) > 0) {
            $this->response([
                'status' => true,
                'id' => $id,
                'messages' => 'Deleted'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'provide on id'
            ], 400);
        }
    }

    public function index_post()
    {   
        //Sesuaikan dengan urutan field di table
        $data = [
            'nisn' => $this->post('nisn'),
            'nama' => $this->post('nama'),
            'jurusan_id' => $this->post('jurusan_id'),
            'kelas_id' => $this->post('kelas_id'),
            'jk_siswa' => $this->post('jk_siswa'),
            'tempt_lahir' => $this->post('tempt_lahir'),
            'tgl_lahir' => $this->post('tgl_lahir'),
            'no_telp' => $this->post('no_telp'),
            'agama' => $this->post('agama'),
            'alamat' => $this->post('alamat'),
        ];

        if ($this->M_app->insert("siswa", $data) > 0) {
            $this->response([
                'status' => true,
                'messages' => 'New data siswa created'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], 400);
        }
    }
}
