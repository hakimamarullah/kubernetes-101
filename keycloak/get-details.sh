KEYCLOAK_URL=http://34.29.51.255:$(kubectl get services/keycloak -o go-template='{{(index .spec.ports 0).nodePort}}') &&
echo "" &&
echo "Keycloak:                 $KEYCLOAK_URL" &&
echo "Keycloak Admin Console:   $KEYCLOAK_URL/admin" &&
echo "Keycloak Account Console: $KEYCLOAK_URL/realms/myrealm/account" &&
echo ""