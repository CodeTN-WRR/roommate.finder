<?php
namespace Wrr;

class Roommate extends EntityAbstract
{

    const TABLE_NAME = 'roommate';

    protected $preferences;
    protected $likes;
    protected $dislikes;
    protected $highschool;

    function loadById($id)
    {
        //$this->join(\Wrr\Highschool::TABLE_NAME);
        parent::loadById($id);
        $this->name = $this->_data['name'];
        $this->highschool = $this->getHighschool();
        $this->likes = $this->getLikes();
        $this->dislikes = $this->getDislikes();
    }

    function getHighschoolId()
    {
        if (!isset($this->_data['highschool_id'])) {
            throw new \Exception("Highschool id not available");
        }
        return $this->_data['highschool_id'];
    }

    function getHighschool()
    {
        if (empty($this->highschool)) {
            $this->highschool = new Highschool($this->connection);
            $this->highschool->loadById($this->getHighschoolId());
        }
        return $this->highschool->getName();
    }

    function getPreferences()
    {
        if (empty($this->preferences)) {
            $sql = "select * from " . Preference::TABLE_NAME . "2" . Roommate::TABLE_NAME;
            $sql .= " join ".Preference::TABLE_NAME." p on preference_id = p.id ";
            $sql .= " where roommate_id = :id;";
            $statement = $this->connection->prepare($sql);
            $statement->execute(array(':id' => $this->id));
            //echo $statement->queryString; die();
            $this->preferences = $statement->fetchAll();
            foreach ($this->preferences as $preference) {
                if ($preference["preference_type"] == "LIKE") {
                    $this->likes[] = $preference;
                } else {
                    $this->dislikes[] = $preference;
                }
            }
        }
        return $this->preferences;
    }

    function getLikes()
    {
        $this->getPreferences();
        return $this->likes;
    }

    function getDislikes()
    {
        $this->getPreferences();
        return $this->dislikes;
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