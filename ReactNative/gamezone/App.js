import React, { useState } from 'react';

import * as Font from 'expo-font';
import { AppLoading } from 'expo';

import { AppNavigator } from './routes/drawer';

import ReduxThunk from 'redux-thunk';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from "redux";
import rootReducer from './reducers';

const store = createStore(rootReducer, {}, applyMiddleware(ReduxThunk));

export default function App() {
  const getFonts = () => Font.loadAsync({
    'nunito-bold': require('./assets/fonts/Nunito-Bold.ttf'),
    'nunito-regular': require('./assets/fonts/Nunito-Regular.ttf'),
  });

  const [fontLoaded, setFontLoaded] = useState(false);

  if (fontLoaded) {
    return (
      <Provider store={store}>
        <AppNavigator />
      </Provider>
    );
  }
  else {
    return (
      <AppLoading
        startAsync={getFonts}
        onFinish={() => setFontLoaded(true)}
      />
    );
  }
}
