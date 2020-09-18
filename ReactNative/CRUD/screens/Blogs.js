import React, { Component } from 'react';
import { View, Text, FlatList, TouchableOpacity } from 'react-native';
import { Styles } from '../share/globalStyle';
import { getBlogs, deleteBlogs } from "../actions";
import { connect } from "react-redux";
import { FontAwesome, AntDesign } from '@expo/vector-icons';
import FlatButton from '../share/button';
import _ from "lodash";

class Blogs extends Component {
    componentDidMount() {
        this.props.getBlogs();
    }

    render() {
        console.log(this.props.isLoading);
        return (
            <View>
                {
                    this.props.isLoading ? <Text style={{ fontSize: 50, fontWeight: 'bold' }}> Loading </Text> :
                        <View style={Styles.container}>
                            <FlatButton title="Post" onPress={() => this.props.navigation.navigate('Post')} />
                            <FlatList style={{ flex: 1 }}
                                data={this.props.blogsList}
                                keyExtractor={item => item.key}
                                renderItem={({ item }) => {
                                    return (
                                        <View style={Styles.FlatList}>
                                            <Text style={{ fontSize: 25, lineHeight: 15, fontWeight: 'bold', color: '#fff' }}>{item.title}</Text>
                                            <Text style={{ fontSize: 20, lineHeight: 30, color: '#fff', marginTop: 30, }}>{item.content}</Text>

                                            <View style={{ flexDirection: 'row', justifyContent: 'flex-end', marginTop: 25 }}>
                                                <TouchableOpacity onPress={() => this.props.navigation.navigate('Edit', { ...item })}>
                                                    <FontAwesome name="edit" size={30} color="white" style={{ marginRight: 15 }} />
                                                </TouchableOpacity>
                                                <TouchableOpacity onPress={() => this.props.deleteBlogs(item.key)}>
                                                    <AntDesign name="closecircleo" size={30} color="white" style={{ marginRight: 15 }} />
                                                </TouchableOpacity>
                                            </View>
                                        </View>
                                    );
                                }}
                            />
                        </View>
                }
            </View>
        );
    }
}

function mapStateToProps(state) {
    const blogsList = _.map(state.blogsList.dbToState, (val, key) => {
        return {
            ...val,
            key: key,
        }
    })

    return {
        blogsList,
        isLoading: state.loadingReducer.isLoading,
    };
}

export default connect(mapStateToProps, { getBlogs, deleteBlogs })(Blogs);