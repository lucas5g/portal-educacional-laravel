import React, { useState, ChangeEvent, FormEvent } from 'react';
import api from '../../service/api'
// import { Container } from './styles';
// const Login: React.FC = () => {
const Login = () => {

    const [login, setLogin] = useState({ email: '', password: '' })
    const [btn, setBtn] = useState({ label: 'Entrar', disabled: false })

    // const handleSubmit = async (event: FormEvent) => {
    const handleSubmit = async (event) => {
        
        event.preventDefault();

        try {
            setBtn({ label: 'Carregando...', disabled: true })
            const { data } = await api.post('auth/login', login);
            const { access_token, user } = data
            localStorage.setItem('logged', user)
            localStorage.setItem('token', access_token)
            window.location.reload()
            console.log(data)
        } catch (e) {
            const { status, data } = e.response
            if (status === 401) {
                window.alert('E-mail ou Senha Inválido');
                console.log(status, data)
            }
            window.alert('Erro no servidor');
        }


    }

    // const handleInputChange = (event: ChangeEvent<HTMLInputElement>) => {
    const handleInputChange = (event) => {

        const { name, value } = event.target;
        setLogin({ ...login, [name]: value });
        // console.log('name ', name)
        // console.log('value ', value)

    }

    return (

        <div className="container">
            <div className="row justify-content-center mt-5">
                <div className="col-md-6">
                    <div className="card  mt-5">

                        <h5 className="card-header blue white-text text-center py-4">
                            <strong>Portal Educacional</strong>
                        </h5>
                        <div className="card-body px-lg-5 pt-1">
                            <form className="text-center" onSubmit={handleSubmit}>

                                <div className="md-form">
                                    <input type="text" name="email" id="email" className="form-control"
                                        onChange={handleInputChange} autoFocus required />
                                    <label htmlFor="email" >E-mail</label>


                                </div>
                                <div className="md-form">
                                    <input type="password" id="password" name="password" className="form-control"
                                        onChange={handleInputChange} required />
                                    {/* {login?.password && */}
                                    <label htmlFor="password">Senha</label>
                                    {/* } */}
                                </div>
                                <button disabled={btn.disabled} className="btn btn-outline-primary btn-rounded btn-block" type="submit">
                                    {btn.label}
                                </button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    )
};


export default Login;