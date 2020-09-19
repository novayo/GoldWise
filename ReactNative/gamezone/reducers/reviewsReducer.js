
export default function ReviewReducer(state = {}, action) {
    switch (action.type) {
        case 'REVIEWS_FETCH':
            return {
                ...state,
                dbToState: action.payload,
            }
        default:
            return state;
    }
}