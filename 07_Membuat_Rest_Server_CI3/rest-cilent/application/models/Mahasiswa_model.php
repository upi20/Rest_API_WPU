<?php 
use GuzzleHttp\Client;
class Mahasiswa_model extends CI_model {
   
    private $_client;
    private $_key = 'mahasiswa123'; 

    public function __construct(){
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost/aplikasi/Rest_API_WPU/07_Membuat_Rest_Server_CI3/rest-server/api/',
            'auth' => ['admin', '1234']
        ]);
    }

    public function getAllMahasiswa()
    {
        $response = $this->_client->request('GET', 'mahasiswa' ,[
            'query' => [
                'key' => 'mahasiswa123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getMahasiswaById($id)
    {
        $response = $this->_client->request('GET', 'mahasiswa' ,[
            'query' => [
                'key' => $this->_key,
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "npm" => $this->input->post('npm', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            'key' => $this->_key
        ];

        $response = $this->_client->request('POST', 'mahasiswa' ,['form_params' => $data]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            "id" => $this->input->post('id', true),
            "nama" => $this->input->post('nama', true),
            "npm" => $this->input->post('npm', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            'key' => $this->_key
        ];

        $response = $this->_client->request('PUT', 'mahasiswa' ,['form_params' => $data]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataMahasiswa($id)
    {
        $response = $this->_client->request('DELETE', 'mahasiswa' ,[
            'form_params' => [
                'key' => $this->_key,
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('npm', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}