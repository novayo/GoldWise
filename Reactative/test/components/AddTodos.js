import React, {useState} from 'react';
import { StyleSheet, Text, View, Button, TextInput} from 'react-native';

export default function AddTodos({updateState}){
    const [text, setText] = useState('')

    const inputHandler = (val) => {
        setText(val);
    }

    return (
        <View>
            <TextInput
                style={styles.input}
                placeholder="Enter a Todo's."
                onChangeText={inputHandler}
            />
            <Button title="Submit" onPress={() => updateState(text)}/>
        </View>
    );
}

const styles = StyleSheet.create({
    input:{
        marginBottom: 10,
        paddingHorizontal: 8,
        paddingVertical: 6,
        borderBottomWidth: 1,
        borderBottomColor: '#ddd',
    }
});