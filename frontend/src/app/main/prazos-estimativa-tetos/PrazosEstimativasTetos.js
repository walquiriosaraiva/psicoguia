import React from 'react';
import AccordionPrazo from './AccordionPrazo';
import FusePageSimple from '@fuse/core/FusePageSimple';
import {makeStyles} from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import {Grid} from "@material-ui/core";

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

function PrazosEstimativasTetos() {
    const classes = useStyles();

    return (
        <FusePageSimple
            classes={{
                root: classes.root
            }}
            header={
                <div className="p-24">
                    <h4>Prazos para estimativa de tetos</h4>
                </div>
            }
            contentToolbar={
                <div className="px-24">
                    <Grid container spacing={2}>
                        <Grid item xs={6}>
                            <Button variant="contained" color="primary">
                                2022
                            </Button>
                        </Grid>
                        <Grid item xs={6}>
                            <Button variant="contained" disabled>
                                2023
                            </Button>
                        </Grid>
                    </Grid>
                </div>
            }
            content={
                <div className="p-24">
                    <h4>Content</h4>
                    <br/>
                    <AccordionPrazo/>
                </div>
            }
        />
    );
}

export default PrazosEstimativasTetos;
