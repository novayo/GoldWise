

export default function BlogReducer(state = {}, action) {
    switch (action.type) {
        case 'BLOGS_FETCH':
            return {
                ...state,
                dbToState: action.payload,
            }
        default:
            return state;
    }
}