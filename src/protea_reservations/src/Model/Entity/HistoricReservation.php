<?php

// src/Model/Entity/Resource.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class HistoricReservation extends Entity
{
    // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        '*' => true
    ];
}

?>