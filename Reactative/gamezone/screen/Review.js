import React from 'react';
import {StyleSheet, Text, View, Image} from 'react-native'
import {globalStyles, images} from '../styles/global';
import Card from '../shared/card';

export default function Review({route, navigation}){
    const item = route.params;

    return (
        <View style={globalStyles.container}>
            <Card>
                <Text style={globalStyles.titleText}>{item.title}</Text>
                <Text style={globalStyles.titleText}>{item.body}</Text>
                <View style={styles.rate}>
                    <Text>GameZone Rating: </Text>
                    <Image source={images.ratings[item.rate]} />
                </View>
            </Card>
        </View>
    );
}

const styles = StyleSheet.create({
    rate: {
        flexDirection: 'row',
        justifyContent: 'center',
        paddingTop: 16,
        marginTop: 16,
        borderTopWidth: 1,
        borderTopColor: '#eee',
    }
});