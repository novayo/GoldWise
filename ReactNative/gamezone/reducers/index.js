import { combineReducers } from "redux";

import ReviewReducer from "./reviewsReducer";

const rootReducer = combineReducers({
    reviewsList: ReviewReducer,
})

export default rootReducer;