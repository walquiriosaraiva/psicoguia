import i18next from 'i18next';
import ar from './navigation-i18n/ar';
import en from './navigation-i18n/en';
import tr from './navigation-i18n/tr';

i18next.addResourceBundle('en', 'navigation', en);
i18next.addResourceBundle('tr', 'navigation', tr);
i18next.addResourceBundle('ar', 'navigation', ar);

const navigationConfig = [
    {
        id: 'administrativo',
        title: 'Administrativo',
        translate: 'Administrativo',
        type: 'collapse',
        icon: 'apps',
        children: [
            {
                id: 'lista-usuarios-sistema',
                title: 'Lista usuários do sistema',
                translate: 'Lista usuários do sistema',
                type: 'item',
                icon: 'whatshot',
                url: '/administrativo/usuarios'
            }
        ],
    },
    {
        id: 'clientes',
        title: 'Clientes',
        translate: 'Clientes',
        type: 'collapse',
        icon: 'description',
        children: [
            {
                id: 'cadastro-paciente',
                title: 'Cadastro de paciente',
                translate: 'Cadastro de paciente',
                type: 'item',
                icon: 'whatshot',
                url: '/clientes/paciente'
            },
            {
                id: 'avaliacoes',
                title: 'Avaliações',
                translate: 'Avaliações',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'tratamento',
                title: 'Tratamento',
                translate: 'Tratamento',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'lista-dificuldades-metas',
                title: 'Lita de Dificuldades e Metas',
                translate: 'Lita de Dificuldades e Metas',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'evolucao',
                title: 'Evolução',
                translate: 'Evolução',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'conceituacao',
                title: 'Conceituação',
                translate: 'Conceituação',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'anexo-documentos',
                title: 'Anexo de documentos',
                translate: 'Anexo de documentos',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            }
        ],
    },
    {
        id: 'controle-financeiro',
        title: 'Controle Financeiro',
        translate: 'Controle Financeiro',
        type: 'collapse',
        icon: 'description',
        children: [
            {
                id: 'faturamento',
                title: 'Faturamento',
                translate: 'Faturamento',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'transacoes',
                title: 'Transações',
                translate: 'Transações',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'relatorios',
                title: 'Relatórios',
                translate: 'Relatórios',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            }
        ],
    },
    {
        id: 'agenda-online',
        title: 'Agenda Online',
        translate: 'Agenda Online',
        type: 'collapse',
        icon: 'description',
        children: [
            {
                id: 'integrada-com-celular',
                title: 'Integrada com celular',
                translate: 'Integrada com celular',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'receba-envie-lembrete',
                title: 'Recebe e envie lembretes',
                translate: 'Recebe e envie lembretes',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'integre-google-agenda',
                title: 'Integre com Google Agenda',
                translate: 'Integre com Google Agenda',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'agenda-salas',
                title: 'Agenda de Salas',
                translate: 'Agenda de Salas',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            }
        ],
    },
    {
        id: 'documentos-personalizados',
        title: 'Documentos Personalizados',
        translate: 'Documentos Personalizados',
        type: 'collapse',
        icon: 'description',
        children: [
            {
                id: 'documentos',
                title: 'Documentos',
                translate: 'Documentos',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'atestados',
                title: 'Atestados',
                translate: 'Atestados',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'contratos',
                title: 'Contratos',
                translate: 'Contratos',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'recibos',
                title: 'Recibos',
                translate: 'Recibos',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'upload-download',
                title: 'Upload e download',
                translate: 'Upload e download',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            }
        ],
    },
    {
        id: 'minha-clinica',
        title: 'Minha Clínica',
        translate: 'Minha Clínica',
        type: 'collapse',
        icon: 'description',
        children: [
            {
                id: 'dados-conta',
                title: 'Dados da conta',
                translate: 'Dados da conta',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            },
            {
                id: 'meu-plano',
                title: 'Meu Plano',
                translate: 'Meu Plano',
                type: 'item',
                icon: 'local_atm',
                url: '/tetos-orcamentarios'
            }
        ],
    }
];

export default navigationConfig;
