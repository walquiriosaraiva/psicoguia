import React, {useEffect} from 'react';
import FusePageSimple from '@fuse/core/FusePageSimple';
import {makeStyles} from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import {Grid, Typography} from "@material-ui/core";
import api from "app/services/api";
import {DataGrid} from '@material-ui/data-grid';

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

function Usuarios() {
    const classes = useStyles();

    const [rows, setRows] = React.useState([])
    const [dadosUsuarios, setDadosUsuarios] = React.useState({
        dadosUsuarios: ''
    })

    useEffect(() => {
        api.get('usuario').then(function (response) {
            let usuarios = []
            response.data.data.forEach(function (item, key) {
                usuarios.push({
                    id: item.id,
                    name: item.name,
                    email: item.email,
                })
            })
            setRows(usuarios)
        })
    }, [dadosUsuarios]);

    const columns = [
        {field: 'id', headerName: 'ID', width: 90},
        {
            field: 'name',
            headerName: 'Nome',
            width: 300,
            editable: true,
        },
        {
            field: 'email',
            headerName: 'E-mail',
            width: 400,
            editable: true,
        }
    ];

    /*const rows = [
        { id: 1, lastName: 'Snow', firstName: 'Jon', age: 35 },
        { id: 2, lastName: 'Lannister', firstName: 'Cersei', age: 42 },
        { id: 3, lastName: 'Lannister', firstName: 'Jaime', age: 45 },
        { id: 4, lastName: 'Stark', firstName: 'Arya', age: 16 },
        { id: 5, lastName: 'Targaryen', firstName: 'Daenerys', age: null },
        { id: 6, lastName: 'Melisandre', firstName: null, age: 150 },
        { id: 7, lastName: 'Clifford', firstName: 'Ferrara', age: 44 },
        { id: 8, lastName: 'Frances', firstName: 'Rossini', age: 36 },
        { id: 9, lastName: 'Roxie', firstName: 'Harvey', age: 65 },
    ];*/

    return (
        <FusePageSimple
            classes={{
                root: classes.root
            }}
            header={
                <div className="p-24">
                    <h4>Usuários</h4>
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

export default Usuarios;
