import { StatusBar } from 'expo-status-bar';
import React, {useState} from 'react';
import { StyleSheet, Text, View} from 'react-native';

export default function Header() {
    return (
        <View style={styles.header}>
            <Text style={styles.text}>Todo's List</Text>
        </View>
    );
}

const styles = StyleSheet.create({
    header:{
        height: 100,
        paddingTop: 20,
        backgroundColor: 'coral',
        // width:'100%',
    },
    text:{
        padding: 20,
        fontSize: 24,
        fontWeight: 'bold',
        color:'white',
        textAlign: 'center',
    },
})