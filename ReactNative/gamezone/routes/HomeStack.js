import React from "react";
import { createStackNavigator } from "@react-navigation/stack";
import { Image } from 'react-native';
import Home from '../screen/Home';
import Review from '../screen/Review';
import Edit from '../screen/Edit';
import Header from '../shared/header';

const { Navigator, Screen } = createStackNavigator();

export const HomeStack = ({ navigation }) => (
  // <Navigator headerMode="none">
  <Navigator screenOptions={styles.Default}>
    <Screen name="Home" component={Home} options={{
      headerTitle: () => <Header navigation={navigation} title='GameZone' />,
      headerBackground: () => <Image source={require('../assets/game_bg.png')} style={{ height: 100 }} />
    }} />
    <Screen name="Review" component={Review} options={styles.Review} />
    <Screen name="Edit" component={Edit} options={styles.Edit} />
  </Navigator>
);

const styles = {
  Default: {
    headerTintColor: '#444',
    headerStyle: {
      backgroundColor: '#eee',
      height: 100,
    },
  },
  Home: {
    // title: 'GameZone', 
  },
  Review: {
    title: 'ReviewDetails',
  },
  Edit: {
    title: 'Edit',
  }
}

export default HomeStack;