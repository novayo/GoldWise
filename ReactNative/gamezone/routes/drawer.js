import React from "react";
import { NavigationContainer } from "@react-navigation/native";
import { createDrawerNavigator } from '@react-navigation/drawer';

import HomeStack from './HomeStack';
import AboutStack from './AboutStack';

const { Navigator, Screen } = createDrawerNavigator();

const DrawerNavigator = () => (
    // <Navigator headerMode="none">
    <Navigator initialRouteName='HomeStack'>
      <Screen name="HomeStack" component={HomeStack} />
      <Screen name="AboutStack" component={AboutStack} />
    </Navigator>
  );

export const AppNavigator = () => (
    <NavigationContainer>
      <DrawerNavigator />
    </NavigationContainer>
);

export default AppNavigator;