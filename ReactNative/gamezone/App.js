import React, {useState} from 'react';

import * as Font from 'expo-font';
import {AppLoading} from 'expo';

import {AppNavigator} from './routes/drawer';

export default function App() {
  const getFonts = () => Font.loadAsync({
    'nunito-bold': require('./assets/fonts/Nunito-Bold.ttf'),
    'nunito-regular': require('./assets/fonts/Nunito-Regular.ttf'),
  });

  const [fontLoaded, setFontLoaded] = useState(false);

  if (fontLoaded){
    return (
      <AppNavigator />
    );
  }
  else{
    return (
      <AppLoading 
        startAsync={getFonts}
        onFinish={() => setFontLoaded(true)}
      />
    );
  }
}
