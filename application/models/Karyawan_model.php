<?php
class Karyawan_model extends CI_Model
{
    public function getAllKaryawan()
    {
        // metode biasa
        // $query = $this->db->get('karyawan');
        // return $query->result_array();

        // metode chaining
        return $this->db->get('karyawan')->result_array();
    }
    public function tambahData()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'nik' => $this->input->post('nik', true),
            'email' => $this->input->post('email', true),
            'jabatan' => $this->input->post('jabatan', true)
        ];

        $this->db->insert('karyawan', $data);
        // Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
    }
    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('karyawan');
        // Produces:
        // DELETE FROM mytable
        // WHERE id = $id
    }
    public function getKaryawanById($id)
    {
        // mengambil satu data dari db untuk halaman detail karyawan
        return $this->db->get_where('karyawan', ['id' => $id])->row_array();
    }
    public function ubahData()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'nik' => $this->input->post('nik', true),
            'email' => $this->input->post('email', true),
            'jabatan' => $this->input->post('jabatan', true)
        ];
        // diambil dari form yang tipe hidden pada view karyawan ubah.php
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('karyawan', $data);

        // Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
    }
    public function cariDataKaryawan()
    {
        $keyword = $this->input->post('keyword', true);
        // pencarian berdasarkan nama, nik, email, jabatan
        $this->db->like('nama', $keyword);
        $this->db->or_like('nik', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('jabatan', $keyword);
        return $this->db->get('karyawan')->result_array();
    }
}
