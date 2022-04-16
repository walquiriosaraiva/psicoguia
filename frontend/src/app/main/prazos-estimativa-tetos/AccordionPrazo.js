import React, {memo} from 'react';
import Accordion from '@material-ui/core/Accordion';
import AccordionDetails from '@material-ui/core/AccordionDetails';
import AccordionSummary from '@material-ui/core/AccordionSummary';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import {makeStyles, styled} from "@material-ui/core/styles";
import Typography from '@material-ui/core/Typography';
import {Grid} from "@material-ui/core";
import Button from "@material-ui/core/Button";
import FormGroup from '@material-ui/core/FormGroup';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import Checkbox from '@material-ui/core/Checkbox';
import CheckBoxOutlineBlankIcon from '@material-ui/icons/CheckBoxOutlineBlank';
import CheckBoxIcon from '@material-ui/icons/CheckBox';
import AddCircleOutlineRoundedIcon from '@material-ui/icons/AddCircleOutlineRounded';
import Paper from '@material-ui/core/Paper'
import Box from '@material-ui/core/Box';
import ModalTipoPrazo from './ModalTipoPrazo';

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
    cabecalhoAccordion: {
        backgroundColor: '#071D41',
        color: '#fff'
    },
    ExpandMoreIconColor: {
        color: '#fff'
    },
    cabecalhoCinzaAccordion: {
        display: 'flex',
        padding: '8px 16px 16px',
        backgroundColor: '#EDEDED'
    }
}));

function AccordionPrazo() {
    const classes = useStyles();
    const [expanded, setExpanded] = React.useState(false);

    const handleChange = (panel) => (event, isExpanded) => {
        setExpanded(isExpanded ? panel : false);
    };

    const [state, setState] = React.useState({
        checkedA: true,
        checkedB: true,
        checkedF: true,
        checkedG: true,
    });

    const handleChangeCheckBox = (event) => {
        setState({...state, [event.target.name]: event.target.checked});
    };

    const Item = styled(Paper)(({theme}) => ({
        ...theme.typography.body2,
        padding: theme.spacing(1),
        textAlign: 'center',
        color: theme.palette.text.secondary,
    }));

    return (
        <div className={classes.root}>
            <Accordion expanded={expanded === 'panel1'} onChange={handleChange('panel1')}>
                <AccordionSummary className={classes.cabecalhoAccordion}
                                  expandIcon={<ExpandMoreIcon className={classes.ExpandMoreIconColor}/>}
                                  aria-controls="panel1bh-content"
                                  id="panel1bh-header"
                >
                    <Typography className={classes.heading}>Formalização</Typography>
                </AccordionSummary>
                <AccordionDetails className={classes.cabecalhoCinzaAccordion}>

                    <Grid container spacing={2}>
                        <Grid item xs={1}>
                            <Checkbox
                                checked={state.checkedB}
                                onChange={handleChangeCheckBox}
                                name="checkedB"
                                color="primary"
                            />
                        </Grid>

                        <Grid item xs={4}>
                            <Box component="span" visibility="visible" p={1} m={1}>
                                <Typography variant='h6' component='span'>Tipo de teto</Typography>
                                <ModalTipoPrazo/>
                            </Box>
                        </Grid>

                        <Grid item xs={3}>
                            <Box component="span" visibility="visible" p={1} m={1}>
                                <Typography variant='h6' component='span'>Prazo</Typography>
                            </Box>
                        </Grid>

                        <Grid item xs={3}>
                            <Box component="span" visibility="visible" p={1} m={1}>
                                <Typography variant='h6' component='span'>Dias restantes</Typography>
                            </Box>
                        </Grid>

                        <Grid item xs={1}>
                            <Box component="span" visibility="visible" p={1} m={1}>
                                <Typography variant='h6' component='span'>Devolvido</Typography>
                            </Box>
                        </Grid>

                    </Grid>

                </AccordionDetails>

            </Accordion>
            <Accordion expanded={expanded === 'panel2'} onChange={handleChange('panel2')}>
                <AccordionSummary className={classes.cabecalhoAccordion}
                                  expandIcon={<ExpandMoreIcon className={classes.ExpandMoreIconColor}/>}
                                  aria-controls="panel2bh-content"
                                  id="panel2bh-header"
                >
                    <Typography className={classes.heading}>Janela 1</Typography>
                </AccordionSummary>
                <AccordionDetails>
                    <Typography>
                        Resultado janela 1
                    </Typography>
                </AccordionDetails>
            </Accordion>
            <Accordion expanded={expanded === 'panel3'} onChange={handleChange('panel3')}>
                <AccordionSummary className={classes.cabecalhoAccordion}
                                  expandIcon={<ExpandMoreIcon className={classes.ExpandMoreIconColor}/>}
                                  aria-controls="panel3bh-content"
                                  id="panel3bh-header"
                >
                    <Typography className={classes.heading}>Janela 2</Typography>
                </AccordionSummary>
                <AccordionDetails>
                    <Typography>
                        Resultado janela 2
                    </Typography>
                </AccordionDetails>
            </Accordion>
        </div>
    );
}

export default memo(AccordionPrazo);
