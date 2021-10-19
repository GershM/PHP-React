import React from 'react';
import ReactDOM from 'react-dom';
import { Router, Switch, Route, Link  } from "react-router-dom";
import axios from "axios";
import { createBrowserHistory } from "history";
import 'bootstrap/dist/css/bootstrap.css';

import Error404 from './404'
const history = createBrowserHistory()

axios.defaults.baseURL = '/api';
axios.defaults.headers = {
    'Content-Type': 'application/json'
};

const Routes =() =>
        <Router history={history} >
            <nav >
                <Link to='/'>Home</Link>
            </nav>
            <Switch>
                <Route exact path="/" component={Error404}/>
                <Route component={Error404} />
            </Switch>
        </Router>

ReactDOM.render(<Routes />, document.getElementById("root"));

