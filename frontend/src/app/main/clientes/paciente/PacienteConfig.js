import i18next from 'i18next';
import Paciente from './Paciente';
import PacienteNew from './PacienteNew';
import en from './i18n/en';
import tr from './i18n/tr';
import ar from './i18n/ar';

i18next.addResourceBundle('en', 'examplePage', en);
i18next.addResourceBundle('tr', 'examplePage', tr);
i18next.addResourceBundle('ar', 'examplePage', ar);

const PacienteConfig = {
    settings: {
        layout: {
            config: {}
        }
    },
    routes: [
        {
            path: '/clientes',
            component: Paciente
        },
        {
            path: '/clientes/paciente/new',
            component: PacienteNew
        }
    ]
};

export default PacienteConfig;