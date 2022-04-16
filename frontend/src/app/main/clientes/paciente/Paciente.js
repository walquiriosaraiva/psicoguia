import React, {useEffect} from 'react';
import FusePageSimple from '@fuse/core/FusePageSimple';
import {makeStyles} from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import {Grid, Typography} from "@material-ui/core";
import api from "app/services/api";
import {DataGrid} from '@material-ui/data-grid';
import {useHistory} from "react-router-dom";

const useStyles = makeStyles((theme) => ({
    root: {
        width: '100%',
    },
    heading: {
        fontSize: theme.typography.pxToRem(15),
        flexBasis: '33.33%',
        flexShrink: 0,
    },
    secondaryHeading: {
        fontSize: theme.typography.pxToRem(15),
        color: theme.palette.text.secondary,
    },
}));

function Paciente() {
    const classes = useStyles();
    const history = useHistory();

    const [rows, setRows] = React.useState([])
    const [dados, setDados] = React.useState({
        dados: ''
    })

    useEffect(() => {
        api.get('paciente').then(function (response) {
            let pacientes = []
            response.data.data.forEach(function (item, key) {
                pacientes.push({
                    id: item.id,
                    nome: item.nome,
                    email: item.email,
                    telefone_celular: item.telefone_celular,
                    created_at: item.created_at,
                })
            })
            setRows(pacientes)
        })
    }, [dados]);

    const columns = [
        {
            field: 'id',
            headerName: 'ID',
            width: 10
        },
        {
            field: 'nome',
            headerName: 'Nome',
            width: 300,
            editable: true,
        },
        {
            field: 'email',
            headerName: 'E-mail',
            width: 300,
            editable: true,
        },
        {
            field: 'telefone_celular',
            headerName: 'Telefone',
            width: 200,
            editable: true,
        },
        {
            field: 'created_at',
            headerName: 'Data',
            width: 200,
            editable: true,
        }
    ];

    return (
        <FusePageSimple
            classes={{
                root: classes.root
            }}
            header={
                <div className="p-24">
                    <Button
                        variant="outlined"
                        color="secondary"
                        id='cadPaciente'
                        type="button"
                        href="/clientes/paciente/new"
                    >
                        Cadastrar paciente
                    </Button>
                </div>
            }
            content={
                <div style={{height: '90%', width: '100%'}}>
                    <DataGrid
                        rows={rows}
                        columns={columns}
                        pageSize={20}
                        checkboxSelection
                        disableSelectionOnClick
                    />
                </div>
            }
        />
    );
}

export default Paciente;
