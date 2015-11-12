<?php
namespace Wrr;

class Roommate extends EntityAbstract
{

    const TABLE_NAME = 'roommate';

    protected $likes;
    protected $dislikes;

    function loadById($id)
    {
        parent::loadById($id);
        $this->name = $this->_data['name'];
    }

    function initByJson($jsonString)
    {
        $obj = json_decode($jsonString);
        $this->name = $obj->name;
        $this->gender_code = $obj->gender_code;
        $this->high_school_id = $obj->high_school_id;
        $this->colleges = $obj->colleges;
        $this->likes = $obj->likes;
        $this->dislikes = $obj->dislikes;

    }
}