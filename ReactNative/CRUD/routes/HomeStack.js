import React from "react";
import { createStackNavigator } from "@react-navigation/stack";
import { NavigationContainer } from "@react-navigation/native";
import Blogs from '../screens/Blogs';
import Edit from "../screens/Edit";
import Post from "../screens/Post";


const { Navigator, Screen } = createStackNavigator();

const HomeStack = () => (
    <Navigator screenOptions={styles.NavHeader} >
        <Screen name="Blogs" component={Blogs} options={{ headerTitle: 'Blogs' }} />
        <Screen name="Edit" component={Edit} options={{ headerTitle: 'Edit' }} />
        <Screen name="Post" component={Post} options={{ headerTitle: 'Post' }} />
    </Navigator>
)

const AppNavigator = () => (
    <NavigationContainer>
        <HomeStack />
    </NavigationContainer>
);

const styles = {
    NavHeader: {
        headerTintColor: '#444',
        headerStyle: {
            backgroundColor: '#eee',
            height: 100,
        },
    },
}

export default AppNavigator;