import firebase from "../firebase";

export function getReviews() {
    return (dispatch) => {

        firebase.database().ref('/reviews').on('value', snapshot => {
            dispatch({
                type: "REVIEWS_FETCH",
                payload: snapshot.val(),
            });

        })
    }
}

export function postReviews(title, body, rate) {
    return () => {
        firebase.database().ref('/reviews').push({ title, body, rate });
    }
}

export function deleteReviews(id) {
    return () => {
        firebase.database().ref('/reviews/' + id.toString()).remove();
    }
}

export function editReviews(title, body, rate, id) {
    return () => {
        firebase.database().ref('/reviews').child(id).update({ title, body, rate });
    }
}