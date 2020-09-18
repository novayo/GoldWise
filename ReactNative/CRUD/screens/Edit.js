import React, { useState } from "react";
import { View, Text, TextInput } from 'react-native';
import { Styles } from '../share/globalStyle';
import { editBlogs } from '../actions';
import { connect } from "react-redux";
import FlatButton from '../share/button';

function Edit(props) {
    const [dialog, setDialog] = useState({
        title: props.route.params.title,
        content: props.route.params.content,
        key: props.route.params.key,
    });

    const changeTitleHandler = (value) => {
        setDialog({ ...dialog, title: value });
    }

    const changeContentHandler = (value) => {
        setDialog({ ...dialog, content: value });
    }

    const submit = () => {
        props.editBlogs(dialog.title, dialog.content, dialog.key);
        setDialog({
            title: "",
            content: "",
            key: '',
        });
        props.navigation.pop();
    }

    return (
        <View style={Styles.container} >
            <TextInput style={Styles.TextTitleInput} placeholder="Title" onChangeText={changeTitleHandler} value={dialog.title} />
            <TextInput multiline style={Styles.TextContentInput} placeholder="Content" onChangeText={changeContentHandler} value={dialog.content} />
            <FlatButton title="submit" onPress={submit} />
        </View>
    );
}

export default connect(null, { editBlogs })(Edit);