

export default function loadingReducer(state = {}, action) {
    switch (action.type) {
        case 'BLOGS_LOADING_STATUS':
            return ({
                ...state,
                isLoading: action.payload,
            });
        default:
            return state;
    }
}