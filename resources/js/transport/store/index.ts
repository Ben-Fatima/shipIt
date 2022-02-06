import { Actions, create } from "redux-neat";
import { useSelector as originalUseSelector } from "react-redux";
import * as handlers from "./handlers";
import { initialState, State } from "./state";

const res = create(initialState, handlers);

export const store = res.store;

export const actions = res.actions as Actions<typeof handlers>;

export function useSelector<R>(
  selector: (x: State) => R,
  fn?: (a: R, b: R) => boolean
) {
  return originalUseSelector(selector, fn);
}
