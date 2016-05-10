<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ResourcesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('ResourceTypes');
        $this->hasMany('Reservations');
    }
}
