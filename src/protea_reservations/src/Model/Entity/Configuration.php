<?php

// src/Model/Entity/Configuration.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Confiration extends Entity
{
    // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        '*' => true
    ];
}

?>