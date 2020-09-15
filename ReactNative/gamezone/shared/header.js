import React from 'react';
import {StyleSheet, Text, View, Image} from 'react-native';
import { Ionicons } from '@expo/vector-icons';

export default function({navigation, title}){
    const pressHandler = () => {
        navigation.openDrawer();
    }
    // console.log(title);
    return (

        <View style={styles.header}>
            <Ionicons name="ios-menu" onPress={pressHandler} size={24} color="black" style={styles.icon} />
            <View style={styles.headerTitle}>
                <Image source={require('../assets/heart_logo.png')} style={styles.headerImage} />
                <Text style={styles.headerText}>{title}</Text>
            </View>
        </View>
        
    );
}

const styles = StyleSheet.create({
    header:{
        width: '100%',
        height: '100%',
        flexDirection: 'row',
        alignItems: 'center',
        justifyContent: 'center',
        // backgroundColor: 'yellow',
    },
    headerText:{
        fontWeight: 'bold',
        fontSize: 20,
        color: '#333',
        letterSpacing: 1,
    },
    icon:{
        position: 'absolute',
        left: -30,
    },
    headerTitle:{
        flexDirection: 'row',
    },
    headerImage:{
        width: 26,
        height: 26,
        marginHorizontal: 10,
    }
});
