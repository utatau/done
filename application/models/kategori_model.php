<?php
class kategori_model extends ci_model
{

    function data()
    {
        $this->db->order_by('id_kategori', 'DESC');
        return $query = $this->db->get('kategori');
    }
    public function dataJoin()
    {
        $this->db->select('*');
        $this->db->from('kategori as k');

        $this->db->order_by('k.id_kategori', 'DESC');
        return $query = $this->db->get();
    }

    public function dataJoinLike($tahun)
    {
        $this->db->select('*');
        $this->db->from('kategori as k');

        $this->db->like('k.head_kategori', $tahun);
        $this->db->order_by('k.id_kategori', 'DESC');
        return $query = $this->db->get();
    }



    public function detailJoin($where)
    {
        $this->db->select('*');
        $this->db->from('kategori as k');
        $this->db->join('dokumen as dm', 'dm.id_dokumen = k.id_dokumen');
        $this->db->where('k.id_kategori', $where);
        $this->db->order_by('k.id_kategori', 'DESC');
        return $query = $this->db->get();
    }


    public function ambilId($table, $where)
    {
        return $this->db->get_where($table, $where);
    }



    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;
    }
    public function get_kategori()
    {
        $this->db->order_by('id_kategori', 'DESC');
        $this->db->order_by('head_kategori', 'ASC');
        $this->db->order_by('sub_kategori', 'ASC');
        $this->db->order_by('kode_kategori', 'ASC');
        $query = $this->db->get('kategori');

        $result = [];
        foreach ($query->result() as $row) {
            $result[$row->head_kategori][] = $row;
        }
        return $result;
    }




    public function detail_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function ubah_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(kategori.id_kategori,4) as kode', FALSE);
        $this->db->order_by('id_kategori', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('kategori');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "KTG-" . $kodemax;
        return $kodejadi;
    }
}
