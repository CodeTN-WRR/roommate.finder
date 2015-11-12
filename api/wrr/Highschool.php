<?php
/**
 * Created by PhpStorm.
 * User: everettgreen
 * Date: 11/12/15
 * Time: 4:49 PM
 */

namespace Wrr;


class Highschool extends EntityAbstract
{

    const TABLE_NAME = 'highschool';

    function getName()
    {
        return $this->_data['name'];
    }

}