use Keycloak\Keycloak;

class plgSystemKeycloak extends JPlugin {

    public function __construct(&$subject, $config = array()) {
        parent::__construct($subject, $config);
        require_once JPATH_PLUGINS . '/system/keycloak/vendor/autoload.php';
    }

    public function onUserAuthenticate($credentials, $options, &$response) {
        $keycloak = new Keycloak([
            'realm' => 'joomla-realm',
            'auth-server-url' => 'http://34.68.138.108:32586/',
            'client_id' => 'joomla',
            'client_secret' => 'i00XlVwMlq32m6Fbgb9JIrXyvGQZ7Gz1',
            'username' => $credentials['username'],
            'password' => $credentials['password'],
        ]);

        $token = $keycloak->getToken();

        if (!$token) {
            $response->status = JAuthentication::STATUS_FAILURE;
            $response->error_message = 'Invalid credentials';
        } else {
            $response->email = $token->email;
            $response->fullname = $token->name;
            $response->status = JAuthentication::STATUS_SUCCESS;
        }
    }
}
