import {Actions, create} from 'redux-neat'
import {useSelector as originalUseSelector} from 'react-redux'
import * as handlers from './handlers'
import {initialState} from './state'
import {State} from './types'

const res = create(initialState, handlers)

export const store = res.store

store.subscribe(() => {
  localStorage.setItem('store', JSON.stringify(store.getState()))
})

export const actions = res.actions as Actions<typeof handlers>

export function useSelector<R>(selector: (x: State) => R, fn?: (a: R, b: R) => boolean) {
  return originalUseSelector(selector, fn)
}
export function useStoreState(): State {
  return useSelector((x) => x)
}
