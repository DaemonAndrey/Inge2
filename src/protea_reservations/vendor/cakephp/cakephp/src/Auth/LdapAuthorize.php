namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Network\Request;

class LdapAuthorize extends BaseAuthorize
{
    public function authorize($user, Request $request)
    {
        // Do things for ldap here.
    }
}
