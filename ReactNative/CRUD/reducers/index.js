import { combineReducers } from "redux";

import BlogReducer from './blogReducer';
import loadingReducer from './loadingReducer';

const rootReducer = combineReducers({
    blogsList: BlogReducer,
    loadingReducer: loadingReducer,
});

export default rootReducer;