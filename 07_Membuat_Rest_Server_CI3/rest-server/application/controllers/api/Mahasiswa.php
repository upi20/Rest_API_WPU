<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mahasiswa extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("Mahasiswa_model", "mahasiswa");
        // $this->methods['index_get']['limit'] = 1;
    }

	public function index_get()
	{
		$id = $this->get("id");
		if ($id === null) {
			$mahasiswa = $this->mahasiswa->getMahasiswa();
		} else {
			$mahasiswa = $this->mahasiswa->getMahasiswa($id);
		}

        if (!empty($mahasiswa)) {
            $this->set_response([
            'data' => $mahasiswa, 
            'status'=> true
            ], REST_Controller::HTTP_OK); // (data, 'message')
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
	}

	public function index_delete()
	{
		$id = $this->delete('id');
		if ($id === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id!'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
				$this->response([
					'status' => true,
					'id' => $id,
					'message' => 'deleted'
				], REST_Controller::HTTP_OK);
			} else {
	            $this->set_response([
	                'status' => FALSE,
	                'message' => 'id not found'
	            ], REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}

	public function index_post()
	{
		$data = [
			'nama' => $this->post('nama'),
			'npm' => $this->post('npm'),
			'email' => $this->post('email'),
			'jurusan' => $this->post('jurusan'),
			'gambar' => 'default.png'
		];
		if ($this->mahasiswa->createMahasiswa($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new mahasiswa has been created'
			], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to create new data!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'nama' => $this->put('nama'),
			'npm' => $this->put('npm'),
			'email' => $this->put('email'),
			'jurusan' => $this->put('jurusan'),
			'gambar' => 'default.png'
		];
		if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'neu mahasiswa has been updated'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to update data!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}