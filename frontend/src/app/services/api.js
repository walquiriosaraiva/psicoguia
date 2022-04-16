import axios from 'axios';
import _ from '@lodash';

/**
 *  Objeto usado para fazer o consumo padrão dos serviços
 */
const api = {
    /**
     * Token do usuário atual do sistema.
     */
    USER_TOKEN: window.localStorage.getItem('access_token') !== '' ? window.localStorage.getItem('access_token') : null,

    /**
     * Host padrão recuperado do arquivo de configuração.
     */
    HOST: process.env.REACT_APP_API_URL,

    /**
     * Cabeçalhos padrões enviados em todas as requisições.
     *
     * Sempre que o usuário efetuar login o token do mesmo será
     * enviado em todas as requisições.
     *
     * @return Object
     */
    HEADERS() {
        return {
            Accept: 'application/json',
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Origin': '/api/'
        };
    },

    /**
     * Função responsável por fazer requisições do tipo post.
     *
     * @param { String } route Caminho da requisição.
     * @param { Object } data (Opcional) Dados que serão enviados.
     * @param { Object } hearders (Opcional) Configurações ou informações adicionais
     */
    post(route, data = {}, hearders = {}) {
        return axios.post(
            this.HOST + route,
            _.merge(data, {
                headers: _.merge(this.HEADERS(), hearders)
            })
        );
    },

    /**
     * Função responsável por fazer requisições do tipo get.
     *
     * @param { String } route Caminho da requisição.
     * @param { Object } data (Opcional) Dados que serão enviados.
     * @param { Object } hearders (Opcional) Configurações ou informações adicionais
     */
    get(route, data = {}, hearders = {}) {
        if (typeof data === 'string') {
            return axios.get(this.HOST + route + data, {
                headers: _.merge(this.HEADERS(), hearders)
            });
        }
        return axios.get(
            this.HOST + route,
            {params: data},
            {
                headers: _.merge(this.HEADERS(), hearders)
            }
        );
    },

    /**
     * Função responsável por fazer requisições do tipo delete.
     *
     * @param { String } route Caminho da requisição.
     * @param { Object } data (Opcional) Dados que serão enviados.
     * @param { Object } hearders (Opcional) Configurações ou informações adicionais
     */
    delete(route, data = {}, hearders = {}) {
        return axios.delete(
            this.HOST + route,
            {data},
            {
                headers: _.merge(this.HEADERS(), hearders)
            }
        );
    },

    /**
     * Função responsável por fazer requisições do tipo put.
     *
     * @param { String } route Caminho da requisição.
     * @param { Object } data (Opcional) Dados que serão enviados.
     * @param { Object } hearders (Opcional) Configurações ou informações adicionais
     */
    put(route, data = {}, hearders = {}) {
        return axios.put(
            this.HOST + route,
            _.merge(data, {
                headers: _.merge(this.HEADERS(), hearders)
            })
        );
    },

    /**
     * Função responsável por fazer requisições do tipo patch.
     *
     * @param { String } route Caminho da requisição.
     * @param { Object } data Dados que serão enviados.
     * @param { Object } hearders (Opcional) Configurações ou informações adicionais
     */
    patch(route, data, hearders = {}) {
        return axios.patch(this.HOST + route, data, _.merge(this.HEADERS(), hearders));
    }
};

export default api;
