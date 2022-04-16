<?php

namespace App\Services;

use App\Models\Usuario;

/**
 * Class AutenticacaoService
 * @package App\Services
 */
class AutenticacaoService
{

    /**
     * @param $login
     * @param $senha
     * @return string
     */
    public function validaUsuario($login, $senha)
    {
        $resultLdap = $this->validaUsuarioLdap($login, $senha);

        if (isset($resultLdap) && count($resultLdap['data']) === 0) :
            return 'dados invalidos';
        endif;

        $usuario = Usuario::where(Usuario::USUCPF, '=', $resultLdap['data']['cpf'])->first();

        return $usuario;

    }

    /**
     * @param $login
     * @param $senha
     * @return array
     */
    private function validaUsuarioLdap($login, $senha)
    {
        return LdapService::autenticacao($login, $senha);
    }
}
