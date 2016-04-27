<?php 
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class UsersFixture extends TestFixture
{

      public $connection = 'test';
    
      public $fields = [
          'id' => ['type' => 'integer'],
          'username' => ['type' => 'string', 'length' => 64, 'null' => false],
          'password' => ['type' => 'string', 'length' => 255, 'null' => false],
          'first_name' => ['type' => 'string', 'length' => 50, 'null' => false],
          'last_name' => ['type' => 'string', 'length' => 50, 'null' => false],
          'telephone_number' => ['type' => 'string', 'length' => 50, 'null' => true],
          'department' => ['type' => 'string', 'length' => 70, 'null' => true],
          'position' => ['type' => 'string', 'length' => 20, 'null' => true],
          'state' => ['type' => 'binary', 'null' => true],
          '_constraints' => [
              'primary' => ['type' => 'primary', 'columns' => ['id']],
          ]
      ];
      public $records = [
          [
              'username' => 'Usuario1',
              'password' => 'usuario1',
              'first_name' => 'Usuario1',
              'last_name' => 'Apellido1',
              'telephone_number' => '88990099',
              'department' => 'Educacion',
              'position' => 'Docente',
              'state' => '1'
          ],

      ];
 }
 ?>