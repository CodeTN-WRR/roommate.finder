<?php
/**
 * Created by PhpStorm.
 * User: everettgreen
 * Date: 11/10/15
 * Time: 4:23 PM
 */

namespace Wrr;

use Wrr\Database\Connection;


class EntityAbstract
{
    const TABLE_NAME = 'UNDEFINED';

    protected $connection;
    protected $id;
    protected $_data;
    protected $_joinedTables = array();

    function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    function loadById($id)
    {
        $this->id = $id;
        $sql = "select * from ".$this::TABLE_NAME;/*
        if (count($this->_joinedTables)) {
            foreach ($this->_joinedTables as $table) {
                $sql .= " join ".$table." ".$table." on ".$table.".id = ".$this::TABLE_NAME.".".$table."_id ";
            }
        }*/
        $sql .= " where ".$this::TABLE_NAME.".id = :id;";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array(':id' => $id));
        //echo $statement->queryString; die();
        if ($statement->rowCount() != 1) {
            throw new \Exception("Unable to find ".get_class($this)." with id ".intval($id));
        }
        $data = $statement->fetchAll();
        $this->_data = $data[0];
    }

    function join($tableName)
    {
        $this->_joinedTables[] = $tableName;
    }
}