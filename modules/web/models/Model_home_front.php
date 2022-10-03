<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_home_front extends CI_Model
{
    public $db_bappeda;

    public function __construct()
    {
     
    }

public function dashboard_kriteria($id)
    {
        $query = $this->db->select("pemenuhan,count(*) as jumlah")
            ->from('audit_pemenuhan')
            ->like('id_kriteria',$id,'after')
            ->group_by('pemenuhan', 'asc')
            
            ->get();
        return $query->result_array();
    }
 
    public function dashboard_semua()
    {
        $query = $this->db->select("pemenuhan,count(*) as jumlah")
            ->from('audit_pemenuhan')
            ->group_by('pemenuhan', 'asc')
            
            ->get();
        return $query->result_array();
    }



}
