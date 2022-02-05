import { useSelector } from "react-redux";
import { actions } from "./store";

export function App() {
  const state = useSelector((x) => x);
  return (
    <>
      <p>{state.value}</p>
      <button onClick={actions.increment}>increment</button>
      <button onClick={actions.decrement}>decrement</button>
    </>
  );
}
