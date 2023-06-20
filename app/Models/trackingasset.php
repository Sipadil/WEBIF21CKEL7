<?php
namespace App\Models;

use CodeIgniter\Model;

class trackingasset extends Model
{
    protected $table = 'trackingasset';
    protected $primaryKey = '';
    protected $allowedFields = [];

    public function __construct()
    {
        parent::__construct();
        $this->allowedFields = $this->getFieldNames();
        $this->primaryKey = $this->getPrimaryKey();
        $this->updateNoColumn();

    }
    public function setTable($tableName)
    {
        $this->table = $tableName;
    }

    public function getData()
    {
        return $this->orderBy('no', 'ASC')->findAll();
    }

    public function getFieldNames()
    {
        $db = db_connect();
        $fields = $db->getFieldNames($this->table);
        return $fields;
    }
    public function getPrimaryKey()
    {
        $db = db_connect();
        $metadata = $db->getFieldData($this->table);
        $PK = '';
        foreach($metadata as $column){
            if($column->primary_key){
                $PK = $column->name;
                $primaryKey = $PK;
            }
        }
        return $PK;
    }
    public function getTableName(){
        return $this->table;
    }

    public function updateNoColumn()
    {
        $data = $this->findAll();

        $updateCounter = 1;

        foreach ($data as $row) {
            $row['no'] = $updateCounter++;
            $this->save($row);
        }
    }
}

?>
