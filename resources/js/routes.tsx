import { BrowserRouter, Route, Redirect } from 'react-router-dom'


import React from 'react';
import Home from './pages/Home';
import Course from './pages/Course';
import User from './pages/User';
import Header from './components/Header'
import Login from './pages/Login';

// import { Container } from './styles';

const Routes = () => {

    const token = localStorage.getItem('token')

    if (!token) {
        return (
            <BrowserRouter>
                <Route path='/' component={Login} />
                <Redirect path='*' to='/' />

            </BrowserRouter>
        )
    }
    return (
        <BrowserRouter>
            <Header />
            <Route exact path='/' component={Home} />
            <Route  path='/home' component={Home} />
            <Route path='/cursos' component={Course} />
            <Route path='/usuarios' component={User} />

        </BrowserRouter>

    );
}

export default Routes;