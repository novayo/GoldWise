import React, { useState } from 'react';
import { View, Text, TextInput } from 'react-native';
import { Styles } from '../share/globalStyle';
import FlatButton from '../share/button';
import { postBlogs } from '../actions';
import { connect } from 'react-redux';

function Post(props) {
    const [dialog, setDialog] = useState({
        title: '',
        content: '',
    });

    const changeTitleHandler = (value) => {
        setDialog({ ...dialog, title: value });
    }

    const changeContentHandler = (value) => {
        setDialog({ ...dialog, content: value });
    }

    const submit = () => {
        // console.log(dialog);
        props.postBlogs(dialog.title, dialog.content);
        setDialog({ title: '', content: '' });
        props.navigation.pop();
    }

    return (
        <View style={Styles.container} >
            <Text>Post</Text>
            <TextInput style={Styles.TextTitleInput} placeholder="Title" onChangeText={changeTitleHandler} value={dialog.title} />
            <TextInput multiline style={Styles.TextContentInput} placeholder="Content" onChangeText={changeContentHandler} value={dialog.content} />
            <FlatButton title="submit" onPress={submit} />
        </View>
    );

}

export default connect(null, { postBlogs })(Post);