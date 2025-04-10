<?php
class dokumen_model extends ci_model
{

    function data()
    {
        $this->db->order_by('id_dokumen', 'DESC');
        return $query = $this->db->get('dokumen');
    }
    public function dataJoin()
    {
        $this->db->select('*');
        $this->db->from('dokumen as dm');
        $this->db->join('kategori as k', 'k.id_kategori = dm.id_kategori');

        $this->db->order_by('dm.id_dokumen', 'DESC');
        return $query = $this->db->get();
    }

    public function dataJoinLike($tahun)
    {
        $this->db->select('*');
        $this->db->from('dokumen as dm');

        $this->db->like('dm.tgl_upload', $tahun);
        $this->db->order_by('dm.id_dokumen', 'DESC');
        return $query = $this->db->get();
    }

    public function detailJoin($where)
    {
        $this->db->select('*');
        $this->db->from('dokumen as dm');
        $this->db->join('kategori as k', 'k.id_dokumen = dm.id_kategori');
        $this->db->where('dm.id_dokumen', $where);
        $this->db->order_by('dm.id_dokumen', 'DESC');
        return $query = $this->db->get();
    }

    public function ambilFile($where)
    {
        $this->db->order_by('id_dokumen', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get_where('dokumen', $where);

        $data = $query->row();
        $file = $data->file;

        return $file;
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
        $this->db->select('RIGHT(dokumen.id_dokumen,4) as kode', FALSE);
        $this->db->order_by('id_dokumen', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('dokumen');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "DKM-" . $kodemax;
        return $kodejadi;
    }
}
