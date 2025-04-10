<?php
class filemanager_model extends ci_model
{
    function data()
    {
        $this->db->order_by('id_dokumen', 'DESC');
        return $query = $this->db->get('dokumen');
    }
    public function ambilId($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function detail_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function detail_join($where)
    {
        $this->db->select('*');
        $this->db->from('dokumen as d');
        $this->db->where('d.id_dokumen', $where);
        $this->db->join('kategori as k', 'k.id_kategori = d.id_kategori');

        $this->db->order_by('d.id_dokumen', 'DESC');
        return $query = $this->db->get();
    }
}
