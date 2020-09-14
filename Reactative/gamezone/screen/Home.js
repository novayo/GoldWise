import React, {useState} from 'react';
import {StyleSheet, Text, View, FlatList, TouchableOpacity, Modal,  TouchableWithoutFeedback, Keyboard} from 'react-native';
import {globalStyles} from '../styles/global';
import Card from '../shared/card';
import { Octicons } from '@expo/vector-icons';
import HomeModal from './HomeModal';

export default function Home({navigation}){

    const [showModal, setShowModal] = useState(false);

    const [reviews, setReviews] = useState([
        {title: 'title1', rate: 1, body:'body1', id:1},
        {title: 'title2', rate: 2, body:'body2', id:2},
        {title: 'title3', rate: 3, body:'body3', id:3},
        {title: 'title4', rate: 5, body:'body4', id:4},
    ]);

    const addNewReview = (values) => {
        values.id = Math.random();
        setReviews((preReviews) => [values, ...preReviews]);
        setShowModal(false);
    }

    return (
        <View style={globalStyles.container}>
            <Modal visible={showModal} animationType='slide'>
                <TouchableWithoutFeedback onPress={() => {Keyboard.dismiss()}}>
                    <View style={styles.modalContent}>
                        <Octicons 
                            name="diff-removed" 
                            onPress={() => setShowModal(false)} 
                            size={30} 
                            color="black"
                            style={styles.modalCloseToggle} />
                        <HomeModal addNewReview={addNewReview} />
                    </View>
                </TouchableWithoutFeedback>
            </Modal>

            <Octicons 
                name="diff-added" 
                onPress={() => setShowModal(true)} 
                size={30} 
                color="black" 
                style={{...styles.modalCloseToggle, ...styles.modalAddToggle}} />

            <FlatList
                keyExtractor={(item) => (item.id.toString())}
                data={reviews}
                renderItem={({item}) => (
                    <TouchableOpacity onPress={() => navigation.navigate('Review', item)}>
                        <Card>
                            <Text style={globalStyles.titleText}>{item.title}</Text>
                        </Card>
                    </TouchableOpacity>
                )}
            />
        </View>
    );
} 

const styles = StyleSheet.create({
    modalContent:{
        flex: 1,
    },
    modalCloseToggle:{
        marginTop: 50,
        marginBottom: 10,
        padding: 10,
        alignSelf: 'center',
    },
    modalAddToggle:{
        marginTop: 0,
    }
});