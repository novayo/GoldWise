import React from 'react';
import {StyleSheet, View, Text, TextInput} from 'react-native';
import {globalStyles} from '../styles/global';
import {Formik} from 'formik';
import * as yup from 'yup';
import FlatButton from '../shared/button';

export default function HomeModal({addNewReview}){
    const reviewSchema = yup.object({
        title: yup.string()
            .required()
            .min(1),
        body: yup.string()
            .required()
            .min(5),
        rate: yup.string()
            .required()
            .test('nameOfTesting', 'Pls rate a number 1-5', (value)=>{
                return parseInt(value) < 6 && parseInt(value) > 0;
            })
    });

    return (
        <View style={globalStyles.container}>
            <Formik
                initialValues={{title: '', rate: '', body: ''}}
                validationSchema={reviewSchema}
                onSubmit={(value, action) => {
                    action.resetForm();
                    addNewReview(value);
                }}
            >
            {(props) => (
                <View>
                    <TextInput 
                        style={globalStyles.input}
                        placeholder='Review Title'
                        onChangeText={props.handleChange('title')}
                        value={props.values.title}
                        onBlur={props.handleBlur('title')}
                    />
                    <Text style={globalStyles.errorMsg}>{props.touched.title && props.errors.title}</Text>

                    <TextInput 
                        multiline minHeight={100}
                        style={globalStyles.input}
                        placeholder='Review body'
                        onChangeText={props.handleChange('body')}
                        value={props.values.body}
                        onBlur={props.handleBlur('body')}
                    />
                    <Text style={globalStyles.errorMsg}>{props.touched.body && props.errors.body}</Text>

                    <TextInput 
                        style={globalStyles.input}
                        placeholder='Review rate'
                        onChangeText={props.handleChange('rate')}
                        value={props.values.rate}
                        keyboardType='numeric'
                        onBlur={props.handleBlur('rate')}
                    />
                    <Text style={globalStyles.errorMsg}>{props.touched.rate && props.errors.rate}</Text>

                    <FlatButton title='Submit' onPress={props.handleSubmit} />
                </View>
            )}
            </Formik>
        </View>
    );
}

const styles = StyleSheet.create({

});