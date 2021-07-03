<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Siswa extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_app');

        //For limit request
        $this->methods['index_get']['limit'] = 500; // 500 request per user
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
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
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
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
            ], RestController::HTTP_OK);
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

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nisn' => $this->put('nisn'),
            'nama' => $this->put('nama'),
            'jurusan_id' => $this->put('jurusan_id'),
            'kelas_id' => $this->put('kelas_id'),
            'jk_siswa' => $this->put('jk_siswa'),
            'tempt_lahir' => $this->put('tempt_lahir'),
            'tgl_lahir' => $this->put('tgl_lahir'),
            'no_telp' => $this->put('no_telp'),
            'agama' => $this->put('agama'),
            'alamat' => $this->put('alamat'),
        ];
        if ($this->M_app->update('siswa', $data, ['id_siswa' => $id]) > 0) {
            $this->response([
                'status' => true,
                'messages' => 'data siswa has been updated'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], 400);
        }
    }
}
