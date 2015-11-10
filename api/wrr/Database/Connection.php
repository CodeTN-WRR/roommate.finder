<?php
/**
 * Created by PhpStorm.
 * User: everettgreen
 * Date: 11/10/15
 * Time: 4:26 PM
 */

namespace Wrr\Database;


class Connection extends \PDO
{

    function __construct($user, $pass, $host, $dbname)
    {
        $engine = 'mysql';
        $host = 'localhost';
        $dns = $engine.':dbname='.$dbname.";host=".$host;

        parent::__construct( $dns, $user, $pass );;
    }

}