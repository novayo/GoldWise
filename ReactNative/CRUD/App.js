import React from 'react';
import AppNavigator from './routes/HomeStack';
import ReduxThunk from 'redux-thunk';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from "redux";
import rootReducer from './reducers';

const store = createStore(rootReducer, {}, applyMiddleware(ReduxThunk));

export default function App() {
  return (

    <Provider store={store}>
      <AppNavigator />
    </Provider>

  );
}