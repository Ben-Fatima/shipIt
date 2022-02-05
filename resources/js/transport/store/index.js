import { create } from "redux-neat";
import * as handlers from "./actions";
const initialState = { value: 0 };
const { store, actions } = create(initialState, handlers);
console.log(initialState, handlers);
export { store, actions };
