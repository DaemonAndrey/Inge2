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
          'telephone_number' => ['type' => 'string', 'length' => 50, 'null' => false],
          'department' => ['type' => 'string', 'length' => 70, 'null' => false],
          'position' => ['type' => 'string', 'length' => 20, 'null' => false],
          'state' => ['type' => 'binary', 'null' => false],
          'role_id' => ['type' => 'integer', 'default' => 1, 'null' => false],
          
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
          [
              'username' => 'Usuario2',
              'password' => 'usuario2',
              'first_name' => 'Usuario2',
              'last_name' => 'Apellido2',
              'telephone_number' => '88990099',
              'department' => 'Informatica',
              'position' => 'Investigador',
              'state' => '1'
          ],
          [
              'username' => 'Usuario3',
              'password' => 'usuario3',
              'first_name' => 'Usuario3',
              'last_name' => 'Apellido3',
              'telephone_number' => '88990099',
              'department' => 'Letras',
              'position' => 'Administrativo',
              'state' => '1'
          ]
      ];
 }
 ?>