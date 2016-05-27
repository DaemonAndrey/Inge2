<?php
// in src/Auth/LdapAuthenticate.php

namespace App\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Network\Request;
use Cake\Network\Response;

class LdapAuthenticate extends BaseAuthenticate {

    protected $_host = '127.0.0.1' ;

    public function authenticate(Request $request, Response $response) {
        $username = $request->data['username'] ;
        $password = $request->data['password'] ;
        $ds = @ldap_connect('localhost') ;

        print_r($ds);
        if (!$ds) {
            throw \Cake\Error\FatalErrorException ('Unable to connect to LDAP host.') ;
        }
        $basedn = "dc=test,dc=com";
        $dn = "uid=$username, ".$basedn;
        debug($dn);
        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        $ldapbind = ldap_bind($ds, 'uid=usuario@ucr.ac.cr, cn=admin, dc=test, dc=com', 'usuariousuario');
        $r = ldap_search($ds,"ou=groups,dc=test,dc=com","(memberUid=rperez)");
        print_r($r);
        debug($ldapbind);

        if (!$ldapbind) {
            return false ;
        }
        // Do whatever you want with your LDAP connection...
        $data = ldap_get_entries($ds, $r);
        debug($data[0]['memberuid']);
               for ($i=0; $i<$data["count"]; $i++) {
            //echo "dn is: ". $data[$i]["dn"] ."<br />";
            echo "User: ". $data[$i]["cn"][0] ."<br />";
            if(isset($data[$i]["mail"][0])) {
                echo "Email: ". $data[$i]["mail"][0] ."<br /><br />";
            } else {
                echo "Email: None<br /><br />";
            }
        }
       // $entry = ldap_first_entry ($ldapbind) ;
        $attrs = ldap_get_attributes ($ds, $r) ;
        $user  = [] ;
        // Loop
        for ($i = 0 ; $i < $attrs["count"] ; $i++) {
            $user[$attrs[$i]] = ldap_values ($ldapbind, $entry, $attrs[$i])[0] ;
        }
        // Then close it and return the authenticated user
        ldap_unbind ($ldapbind) ;
        ldap_close ($ldapbind);
        return $user ;
    }

}

