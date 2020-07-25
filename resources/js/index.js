import React from 'react';
import ReactDOM from 'react-dom';
import Routes from './routes';
import CreateGlobalStyle from './styles/GlobalStyles'
// import App from './App';

ReactDOM.render(
    <React.StrictMode>
        <Routes />
        <CreateGlobalStyle />

    </React.StrictMode>,
    document.getElementById('root')
);
