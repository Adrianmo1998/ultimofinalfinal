import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import M from "materialize-css";

class TabPuestos extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            puestos: '', // aqui se guardarán los items traidso del servidor
            isLoaded: false // mostrar el componente cuando sea necesario
        }
    }
    componentDidMount() {
        axios.get('/puesto').then((res) => {
            this.setState({
                puestos: res.data,
                isLoaded: true
            })
            M.Tabs.init(this.Tabs); // iniciar tabs materialize
        })
    }
    render() {
        const {puestos, isLoaded} = this.state;
        if (!isLoaded) { // aquí pondría un "cargando", pero mejor no
            return (
                <ul ref={Tabs => {
                    this.Tabs = Tabs; // haciendo referencia para usadlo con materialize
                }} className="tabs tabs-transparent hide">hola</ul>
            )
        } else {
            return (
                <ul ref={Tabs => {
                    this.Tabs = Tabs;
                }} className="tabs tabs-transparent">
                    {puesto.map(item => (
                        <li key={item.id} className="tab">
                            <a href="#tab1" onClick={()=>this.primerclick(item.id)}>{item.puesto}</a>
                        </li>
                    ))}
                </ul>
            )
        }
    }

    // functions
    primerclick(numero){
        console.log(numero)
    }

}

export default TabPuestos;

if (document.getElementById('TabPuestos')) {
    ReactDOM.render(<TabPuestos/>, document.getElementById('TabPuestos'));
}
