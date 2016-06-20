<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {

        parent::initialize();
        
        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'Insufficient privileges to view requested resources. Please login to continue!',
            'authenticate' => [
                'Ldap' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'port' => Configure::read('Ldap.port'),
                    'host' => Configure::read('Ldap.host'),
                    'domain' => Configure::read('Ldap.domain'),
                    'baseDN' => Configure::read('Ldap.baseDN'),
                    'search' => Configure::read('Ldap.search'),
                    'errors' => Configure::read('Ldap.errors'),
                    'flash' => [
                        'key' => 'ldap',
                        'element' => 'Flash/error',
                    ]
                ]
            ]
        ]);

        /**
        $this->loadComponent('Auth',['authorize' => ['Controller'],
                                     'authenticate'=>['Form'=>['finder'=> 'auth']],
                                     'loginRedirect' => ['controller' => 'Pages',
                                                         'action' => 'home'
                                                        ],
                                     'logoutRedirect' => ['controller' => 'Pages',
                                                          'action' => 'home'
                                                         ]
                                    ]);

                                    **/
    }

    public function beforeFilter(Event $event)
    {
        //$this->set('user_username', $this->Auth->User('username'));
        $this->set('user_role_id', $this->Auth->User('role_id'));
        $this->Auth->allow([ 'display']);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user)
    {
        // El administrador puede acceder cada acción, siempre y cuando su registro esté confirmado

        if(isset($user['role_id']) && ($user['role_id'] == 2 || $user['role_id'] == 3))
            return true;

        
        return false;
    }
}

?>
