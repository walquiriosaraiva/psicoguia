<?php

namespace App\Services;

/**
 * Class LdapService
 * @package App\Services
 */
class LdapService
{

    const LDAP_SERVER = 'SEDE-VP-AD1.ebserhnet.ebserh.gov.br';
    const LDAP_DOMINIO = "ebserhnet\\";
    const LDAP_BASE_DN = "DC=ebserhnet,DC=ebserh,DC=gov,DC=br";

    /**
     * @param $usuario
     * @param $senha
     * @return array
     */
    public static function autenticacao($usuario, $senha)
    {
        try {

            $conexaoAD = ldap_connect(self::LDAP_SERVER);
            ldap_set_option($conexaoAD, LDAP_OPT_REFERRALS, 0);
            ldap_set_option($conexaoAD, LDAP_OPT_PROTOCOL_VERSION, 3);

            $atributos = array("sAMAccountName", "employeeid", "siape");
            ldap_bind($conexaoAD, self::LDAP_DOMINIO . $usuario, $senha);

            $resultUsuario = [];
            if (ldap_bind($conexaoAD, self::LDAP_DOMINIO . $usuario, $senha)) :
                $pesquisa = ldap_search($conexaoAD, self::LDAP_BASE_DN,
                    "(&(objectClass=user)(objectCategory=person)(sAMAccountName={$usuario}))", $atributos);
                $dadosUsuarioLdap = ldap_get_entries($conexaoAD, $pesquisa)[0];
                $resultUsuario['data']['cpf'] = $dadosUsuarioLdap["employeeid"][0];
                $resultUsuario['data']['nome'] = $dadosUsuarioLdap["samaccountname"][0];

                if (isset($dadosUsuarioLdap["siape"]) && $dadosUsuarioLdap["siape"]):
                    $resultUsuario['data']['siape'] = $dadosUsuarioLdap["siape"][0];
                endif;
            endif;

        } catch (\Exception $e) {
            $resultUsuario['data'] = [];
            $resultUsuario['message'] = $e->getMessage();
            return $resultUsuario;
        }

        return $resultUsuario;
    }

}
