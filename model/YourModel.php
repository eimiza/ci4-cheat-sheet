<?php 
namespace App\Modules\YourModule\Models;

use CodeIgniter\Model;

class YourModel extends Model{

    public function __construct(){
        $this->session = service('session');
    }

    public function getAllData($limit, $offset, $filter){
        $builder = $this->builder('yourTable');
        $builder->select();
        if($filter['field1']){$builder->like('field1', $filter['field1']);}
        $builder->where('field2', $this->session->get('yourSessionItem'));
        $builder->orderBy('field3', 'ASC');
        $builder->where('field4', 1);
        $builder->limit($limit, $offset);
        $data = $builder->get();
    }
  
    public function countAllData($filter){
        $builder = $this->builder('yourTable');
        if($filter['field1']){$builder->like('field1', $filter['field1']);}
        $builder->where('field2', $this->session->get('yourSessionItem'));
        $builder->where('field3', 1);
        return $count = $builder->countAllResults();

    }
  
}
