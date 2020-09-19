import React, { Component } from 'react';
import { StyleSheet, Text, View, FlatList, TouchableOpacity, Modal, TouchableWithoutFeedback, Keyboard } from 'react-native';
import { globalStyles } from '../styles/global';
import Card from '../shared/card';
import { Octicons } from '@expo/vector-icons';
import HomeModal from './HomeModal';
import _ from "lodash";
import { getReviews, deleteReviews, postReviews } from "../actions";
import { connect } from "react-redux";
import { FontAwesome, AntDesign } from '@expo/vector-icons';

class Home extends Component {
    componentDidMount() {
        this.props.getReviews();
    }

    state = {
        showModal: false,
    }

    // const[reviews, setReviews] = useState([
    //     { title: 'title1', rate: 1, body: 'body1', id: 1 },
    //     { title: 'title2', rate: 2, body: 'body2', id: 2 },
    //     { title: 'title3', rate: 3, body: 'body3', id: 3 },
    //     { title: 'title4', rate: 5, body: 'body4', id: 4 },
    // ]);

    addNewReview = (values) => {
        this.props.postReviews(values.title, values.body, values.rate);
        // setReviews((preReviews) => [values, ...preReviews]);
        // setShowModal(false);
        this.setState({ showModal: false, });
    }

    render() {
        return (
            <View style={globalStyles.container} >
                <Modal visible={this.state.showModal} animationType='slide'>
                    <TouchableWithoutFeedback onPress={() => { Keyboard.dismiss() }}>
                        <View style={styles.modalContent}>
                            <Octicons
                                name="diff-removed"
                                onPress={() => this.setState({ showModal: false, })}
                                size={30}
                                color="black"
                                style={styles.modalCloseToggle} />
                            <HomeModal addNewReview={this.addNewReview} />
                        </View>
                    </TouchableWithoutFeedback>
                </Modal>

                <Octicons
                    name="diff-added"
                    onPress={() => this.setState({ showModal: true, })}
                    size={30}
                    color="black"
                    style={{ ...styles.modalCloseToggle, ...styles.modalAddToggle }}
                />

                <FlatList
                    keyExtractor={(item) => (item.id.toString())}
                    data={this.props.reviewsList}
                    renderItem={({ item }) => (
                        <TouchableOpacity onPress={() => this.props.navigation.navigate('Review', item)}>
                            <Card>
                                <Text style={globalStyles.titleText}>{item.title}</Text>
                                <View style={{ flexDirection: 'row', justifyContent: 'flex-end', marginTop: 25 }}>
                                    <TouchableOpacity onPress={() => this.props.navigation.navigate('Edit', { ...item })}>
                                        <FontAwesome name="edit" size={30} color="black" style={{ marginRight: 15 }} />
                                    </TouchableOpacity>
                                    <TouchableOpacity onPress={() => this.props.deleteReviews(item.id)}>
                                        <AntDesign name="closecircleo" size={30} color="black" style={{ marginRight: 15 }} />
                                    </TouchableOpacity>
                                </View>
                            </Card>
                        </TouchableOpacity>
                    )}
                />
            </View>
        );
    }
}

const styles = StyleSheet.create({
    modalContent: {
        flex: 1,
    },
    modalCloseToggle: {
        marginTop: 50,
        marginBottom: 10,
        padding: 10,
        alignSelf: 'center',
    },
    modalAddToggle: {
        marginTop: 0,
    }
});


function mapStateToProps(state) {
    const reviewsList = _.map(state.reviewsList.dbToState, (val, key) => {
        return {
            ...val,
            id: key,
        }
    })

    return {
        reviewsList,
    };
}

export default connect(mapStateToProps, { getReviews, deleteReviews, postReviews })(Home);