import {Redirect} from 'react-router-dom';
import FuseUtils from '@fuse/utils';
import ExampleConfig from 'app/main/example/ExampleConfig';
import PrazosEstimativasTetosConfig from "../main/prazos-estimativa-tetos/PrazosEstimativasTetosConfig";
import UsuariosConfig from "../main/administrativo/usuarios/UsuariosConfig";
import PacienteFonfig from "../main/clientes/paciente/PacienteConfig";

const routeConfigs = [ExampleConfig, PrazosEstimativasTetosConfig, UsuariosConfig, PacienteFonfig];

const routes = [
    ...FuseUtils.generateRoutesFromConfigs(routeConfigs),
    {
        path: '/',
        component: () => <Redirect to="/example"/>
    }
];

export default routes;
