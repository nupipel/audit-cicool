<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_audit_tasks extends MY_Model
{

    private $primary_key    = 'id';
    private $table_name     = 'audit_tasks';
    public $field_search   = ['tanggal', 'tempat', 'tujuan', 'proses_produksi', 'penerapan_k3', 'lead', 'member1', 'member2'];
    public $sort_option = ['id', 'DESC'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
            'sort_option'   => $this->sort_option,
        );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "audit_tasks." . $field;

                if (strpos($field, '.')) {
                    $f_search = $field;
                }
                if ($iterasi == 1) {
                    $where .=  $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " .  $f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            // $where .= "(" . "audit_tasks." . $field . " LIKE '%" . $q . "%' )";
            $where .= "(" . "audit_tasks." . $field . " = " . $q . " )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "audit_tasks." . $field;
                if (strpos($field, '.')) {
                    $f_search = $field;
                }

                if ($iterasi == 1) {
                    $where .= $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . $f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            $where .= "(" . "audit_tasks." . $field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) and count($select_field)) {
            $this->db->select($select_field);
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);

        $this->sortable();

        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable()
    {

        $this->db->select('audit_tasks.*,master_perusahaan.nama_perusahaan, master_perusahaan.kantor_cabang,master_perusahaan.jenis_industri');
        $this->db->join('master_perusahaan', 'master_perusahaan.id = audit_tasks.id_perusahaan', 'left');

        return $this;
    }

    public function filter_avaiable()
    {

        if (!$this->aauth->is_admin()) {
        }

        return $this;
    }

    function detailAudit($id_task)
    {
        $query = $this->db->select('b.nama_perusahaan,b.kantor_cabang,b.jenis_industri,b.alamat ,a.*')->from('audit_tasks a')->join('master_perusahaan b', 'b.id = a.id_perusahaan', 'left')->where("a.id = $id_task");
        return $query->get()->row();
    }


    function getHasilAudit($id_task)
    {
        // select ka.no_kriteria, ka.kriteria, ap.pemenuhan  from audit_pemenuhan ap left join kriteria_audit ka on ka.id = ap.id_kriteria where ap.id_task = 2
        $query = $this->db->select('ka.kriteria_audit,ap.id_kriteria, ap.pemenuhan')->from('audit_pemenuhan ap')->join('master_kriteria_audit ka', 'ka.id = ap.id_kriteria', 'left')->where('ap.id_task', $id_task)->order_by("INET_ATON(ap.id_kriteria)");

        return $query->get()->result();
    }
    function auditTidakBerlaku($id_task)
    {
        // select ka.no_kriteria, ka.kriteria, ktb.penjelasan  from kriteria_tidak_berlaku ktb left join kriteria_audit ka on ka.id = ktb.id_kriteria where ktb.id_task = 3
        $query = $this->db->select('ktb.id_kriteria, ka.kriteria_audit, ktb.penjelasan')->from('kriteria_tidak_berlaku ktb')->join('master_kriteria_audit ka', 'ka.id = ktb.id_kriteria', 'left')->where('ktb.id_task', $id_task)->order_by("INET_ATON(ktb.id_kriteria)");

        return $query->get()->result();
    }
    function auditKetidakSesuaian($id_task)
    {
        $query = $this->db->select('kk.*, ka.kriteria_audit, ap.pemenuhan')->from('kriteria_ketidaksesuaian kk')->join("(select * from audit_pemenuhan where id_task = $id_task) ap", 'ap.id_kriteria = kk.id_kriteria', 'left')->join('master_kriteria_audit ka', 'ka.id = kk.id_kriteria', 'left')->where('kk.id_task', $id_task)->order_by("INET_ATON(kk.id_kriteria)");

        return $query->get()->result();
    }
    function auditObservasi($id_task)
    {
        // select ka.no_kriteria, ka.kriteria, ko.bukti_objektif from kriteria_observasi ko left join kriteria_audit ka on ka.id = ko.id_kriteria where ko.id_task = 3
        $query = $this->db->select('ko.*, ka.kriteria_audit')->from('kriteria_observasi ko')->join('master_kriteria_audit ka', 'ka.id = ko.id_kriteria', 'left')->where('ko.id_task', $id_task)->order_by("INET_ATON(ko.id_kriteria)");

        return $query->get()->result();
    }
}

/* End of file Model_audit_tasks.php */
/* Location: ./application/models/Model_audit_tasks.php */