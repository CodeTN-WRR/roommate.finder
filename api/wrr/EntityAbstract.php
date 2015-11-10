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
    protected $_data;

    function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    function loadById($id)
    {
        $sql = "select * from ".$this::TABLE_NAME." where id = :id;";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array(':id' => $id));
        if ($statement->rowCount() != 1) {
            throw new \Exception("Unable to find ".get_class($this)." with id ".intval($id));
        }
        $this->_data = $statement->fetchAll();
    }
}