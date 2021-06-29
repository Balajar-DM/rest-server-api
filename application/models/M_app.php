<?php
class M_app extends CI_Model
{

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function view($table)
    {
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function delete_data($table, $data)
    {
        $this->db->delete($table, $data);
        return $this->db->affected_rows();
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
