import React from "react";
import { createStackNavigator } from "@react-navigation/stack";
import { Image } from 'react-native';
import About from '../screen/About';
import Header from '../shared/header';

const { Navigator, Screen } = createStackNavigator();

export const AboutStack = ({ navigation }) => (
  <Navigator screenOptions={styles.Default}>
    <Screen name="About" component={About} options={{
      headerTitle: () => <Header navigation={navigation} title='About' />,
      headerBackground: () => <Image source={require('../assets/game_bg.png')} style={{ height: 100 }} />,
    }} />
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
  About: {
    // title: 'About GameZone', 
  },
}

export default AboutStack;