import React from 'react';
import { StyleSheet, Text, View, TouchableOpacity} from 'react-native';
import { MaterialIcons } from '@expo/vector-icons'; 

export default function TodoListItem({item, deleteItem}){
    return (
        <TouchableOpacity onPress={() => deleteItem(item.id)}>
            <View style={styles.containter}>
                <MaterialIcons name="delete" size={24} color="black" />
                <Text style={styles.todoText}>{item.work}</Text>
            </View>
        </TouchableOpacity>
    );
}

const styles = StyleSheet.create({
    containter:{
        flexDirection: 'row',
        padding: 10,
        marginTop: 10,
        borderColor: '#bbb',
        borderWidth: 1,
        borderStyle: 'dashed',
        borderRadius: 10,
    },
    todoText: {
        fontSize: 24,
        fontWeight: 'bold',
        color:'black',
        textAlign: 'center',
        marginLeft: 10,
      },
});