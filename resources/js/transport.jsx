import React from "react";
import { render } from "react-dom";
import { App } from "./transport/App";
import { store } from "./transport/store";
import { Provider } from "react-redux";

render(
  <Provider store={store}>
    <App />
  </Provider>,
  document.getElementById("root")
);
