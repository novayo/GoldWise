import { StyleSheet } from 'react-native';

export const Styles = StyleSheet.create({
    container: {
        alignItems: 'center',
        justifyContent: 'center',
        padding: 10,
    },
    TextTitleInput: {
        marginTop: 20,
        height: 40,
        borderColor: 'gray',
        borderWidth: 1,
        width: '100%',
    },
    TextContentInput: {
        marginTop: 20,
        height: 80,
        borderColor: 'gray',
        borderWidth: 1,
        width: '100%',
    },
    FlatList: {
        elevation: 8,
        borderRadius: 15,
        backgroundColor: '#575FCF',
        padding: 20,
        marginBottom: 15,
    },
});