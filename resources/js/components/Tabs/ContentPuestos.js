import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import M from "materialize-css";


class ContentPuestos extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            informacion: {},
            isLoaded: false,
            sexo: 1,
            nombre: '',
            nivelId: 1,
            puestoId: 1,
            fechaNacimiento: '',
            descripcionGlobal: '',
            foto: '',
            editando:false,
            editando_id:0

        }
        this.handleNombre = this.handleNombre.bind(this);
        this.handleDescripcion = this.handleDescripcion.bind(this);
        this.dropdownChangeSexo = this.dropdownChangeSexo.bind(this);
        this.dropdownChangePuesto = this.dropdownChangePuesto.bind(this);
        this.dropdownChangeNivel = this.dropdownChangeNivel.bind(this);
        this.submitButton = this.submitButton.bind(this);
        this.editButton = this.editButton.bind(this);
        this.ButtonDelete = this.ButtonDelete.bind(this);
        this.ButtonDelete = this.ButtonDelete.bind(this);
        this.ButtonOpenModal = this.ButtonOpenModal.bind(this);
        this.changeFechaNacimiento = this.changeFechaNacimiento.bind(this);
    }

    componentDidMount() {
        axios.get('/infopuestos').then((res) => {
            this.setState({
                informacion: res.data,
                isLoaded: true
            })
            var tabs = document.querySelectorAll('.tabs')
            for (var i = 0; i < tabs.length; i++) {
                M.Tabs.init(tabs[i]);
            }
            var collapsibles = document.querySelectorAll('.collapsible')
            for (var i = 0; i < collapsibles.length; i++) {
                M.Collapsible.init(collapsibles[i]);
            }
            M.Modal.init(this.Modal);
            M.FloatingActionButton.init(this.floatingButton);
            M.FormSelect.init(this.SelectSexo);
            M.FormSelect.init(this.SelectNivel);
            M.FormSelect.init(this.SelectPuesto);
        })

    }

    dropdownChangeSexo(e) {
        this.setState({sexo: e.target.value});
    }

    dropdownChangePuesto(e) {
        this.setState({puestoId: e.target.value});
    }

    handleNombre(e) {
        this.setState({
            nombre: e.target.value
        })
    }

    handleDescripcion(e) {
        this.setState({
            descripcionGlobal: e.target.value
        })
    }

    dropdownChangeNivel(e) {
        this.setState({nivelId: e.target.value});
    }

    changeFechaNacimiento(e) {
        this.setState({fechaNacimiento: e.target.value})
    }

    submitButton(event) {
        event.preventDefault();
        const {nombre, descripcionGlobal, sexo, nivelId, fechaNacimiento, puestoId} = this.state;
        let infoEmpleado = {
            nombre: nombre,
            descripcion_global: descripcionGlobal,
            sexo: sexo,
            nivel_id: nivelId,
            puesto_id: puestoId,
            fecha_nacimiento: fechaNacimiento,
        }
        axios.post('/add-empleado', infoEmpleado).then(res => {
            if (res.data.complete) {
                axios.get('/infopuestos').then((res) => {
                    this.setState({
                        informacion: res.data,
                        isLoaded: true
                    })
                    var tabs = document.querySelectorAll('.tabs')
                    for (var i = 0; i < tabs.length; i++) {
                        M.Tabs.init(tabs[i]);
                    }
                    var collapsibles = document.querySelectorAll('.collapsible')
                    for (var i = 0; i < collapsibles.length; i++) {
                        M.Collapsible.init(collapsibles[i]);
                    }
                });
                this.setState({
                    nombre: "",
                    descripcionGlobal: "",
                    sexo: 1,
                    nivelId: 1,
                    fechaNacimiento: "",
                    puestoId: 1,
                    editando: false
                })
                M.Modal.init(this.Modal).close();
                M.updateTextFields();

            }
        });
    }
    editButton(e){
        e.preventDefault();
        const {nombre, descripcionGlobal, sexo, nivelId, fechaNacimiento, puestoId, editando_id} = this.state;
        let infoEmpleado = {
            nombre: nombre,
            descripcion_global: descripcionGlobal,
            sexo: sexo,
            nivel_id: nivelId,
            puesto_id: puestoId,
            fecha_nacimiento: fechaNacimiento,
            idEmpleado: editando_id
        }
        axios.patch(`/edit-empleado`, infoEmpleado).then(res => {
            if (res.data.complete) {
                axios.get('/infopuestos').then((res) => {

                    this.setState({
                        informacion: res.data,
                        isLoaded: true
                    })
                    var tabs = document.querySelectorAll('.tabs')
                    for (var i = 0; i < tabs.length; i++) {
                        M.Tabs.init(tabs[i]);
                    }
                    var collapsibles = document.querySelectorAll('.collapsible')
                    for (var i = 0; i < collapsibles.length; i++) {
                        M.Collapsible.init(collapsibles[i]);
                    }
                });
                this.setState({
                    nombre: "",
                    descripcionGlobal: "",
                    sexo: 1,
                    nivelId: 1,
                    fechaNacimiento: "",
                    puestoId: 1,
                    editando: false
                })
                M.Modal.init(this.Modal).close();
                M.updateTextFields();

            }
        });
    }

    ButtonDelete(key, id) {
        axios.delete(`/delete-empleado/${id}`).then(res => {
            if (res.data.complete) {
                var collapsibles = document.querySelectorAll('.collapsible')
                for (var i = 0; i < collapsibles.length; i++) {
                    M.Collapsible.init(collapsibles[i]).close(key);
                }
                axios.get('/infopuestos').then((res) => {
                    this.setState({
                        informacion: res.data,
                        isLoaded: true
                    })
                    var tabs = document.querySelectorAll('.tabs')
                    for (var i = 0; i < tabs.length; i++) {
                        M.Tabs.init(tabs[i]);
                    }
                    var collapsibles = document.querySelectorAll('.collapsible')
                    for (var i = 0; i < collapsibles.length; i++) {
                        M.Collapsible.init(collapsibles[i]);
                    }
                });
            }
        });
    }
    ButtonOpenModal(e){
        this.setState({
            nombre: "",
            descripcionGlobal: "",
            sexo: 1,
            nivelId: 1,
            fechaNacimiento: "",
            puestoId: 1,
            editando: false
        })
        M.Modal.init(this.Modal).open();
        e.preventDefault();
    }
    ButtonEdit(key, empleado) {
        this.setState({
            editando: true,
            editando_id: empleado.id
        })

        this.setState({
            nombre: empleado.nombre,
            descripcionGlobal: empleado.descripcion_global,
            sexo: empleado.sexo_id,
            nivelId: empleado.nivel_id,
            fechaNacimiento: empleado.fecha_nacimiento,
            puestoId: empleado.puesto_id
        });

        var collapsibles = document.querySelectorAll('.collapsible')
        for (var i = 0; i < collapsibles.length; i++) {
            M.Collapsible.init(collapsibles[i]).close(key);
        }
        M.Modal.init(this.Modal).open();
    }

    render() {
        const {informacion, isLoaded} = this.state;
        if (!isLoaded) {
            return (
                <div><br/><br/><br/>Cargando ...</div>
            )
        } else {
            return (
                <div>
                    <br/>
                    {informacion.map((item) => (
                        <div key={item.id} id={'tab' + item.id} className="col s12">
                            <br/><br/>
                            <div className="container">
                                <div className="row">
                                    <div className="col s12 ">
                                        <ul className="collapsible popout">
                                            {item.get_empleados.map((empleado, key) => (
                                                <li key={empleado.id}>
                                                    <div className="collapsible-header"><i
                                                        className="material-icons">pets</i>{empleado.nombre}
                                                    </div>
                                                    <div className="collapsible-body">
                                                        <ul>
                                                            <li><h5 className="blue-text">{empleado.nombre} </h5></li>
                                                            <li><span
                                                                className="blue-text">Puesto: </span> {empleado.get_puesto.puesto}
                                                            </li>
                                                            <li><span
                                                                className="blue-text">Sexo: </span> {empleado.get_sexo.sexo}
                                                            </li>
                                                            <li><span
                                                                className="blue-text">Nivel: </span> {empleado.get_nivel.nivel}
                                                            </li>
                                                            <li><span
                                                                className="blue-text">Fecha de nacimiento: </span> {empleado.fecha_nacimiento}
                                                            </li>
                                                            <li><span
                                                                className="blue-text">Descripción: </span>{empleado.descripcion_global ? empleado.descripcion_global : "Describe tu experiencia"}
                                                            </li>
                                                        </ul>
                                                        <br/>
                                                        <a className="btn-small yellow darken-1"
                                                           onClick={() => this.ButtonEdit(key, empleado)}>Editar</a>
                                                        <br/> <br/>
                                                        <a className="btn-small red darken-2"
                                                           onClick={() => this.ButtonDelete(key, empleado.id)}>Eliminar</a>
                                                    </div>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                    <div className="fixed-action-btn" ref={floatingButton => {
                        this.floatingButton = floatingButton;
                    }}>
                        <a className="btn-floating btn-large" onClick={this.ButtonOpenModal}>
                            <i className="large material-icons">add</i>
                        </a>
                    </div>
                    <div ref={Modal => {
                        this.Modal = Modal;
                    }} id="modaladd" className="modal bottom-sheet">
                        <div className="modal-content">
                            <h4>{this.state.editando?`Editando empleado ${this.state.nombre}`: 'Agregar Empleado'}</h4>
                            <div className="container">
                                <div className="row">
                                    <form className="col s12">
                                        <div className="row">
                                            <div className="input-field col s6">
                                                <input id="nombre" type="text"  value={this.state.nombre}
                                                       onChange={this.handleNombre}/>
                                                <label htmlFor="nombre" className={this.state.editando? 'active':''}>Nombre</label>
                                            </div>
                                            <div className="input-field col s6">
                                                <select ref={SelectSexo => {
                                                    this.SelectSexo = SelectSexo;
                                                }} defaultValue="0"
                                                        onChange={this.dropdownChangeSexo.bind(this)}>
                                                    <option value="0" disabled>Selecciona una opción</option>
                                                    <option value="1">Masculino</option>
                                                    <option value="2">Femenino</option>
                                                </select>
                                                <label>Sexo</label>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="input-field col s6">
                                                <input id="fechaNacimiento" type="text"
                                                       value={this.state.fechaNacimiento}
                                                       onChange={this.changeFechaNacimiento}/>
                                                <label htmlFor="fechaNacimiento" className={this.state.editando? 'active':''}>Fecha Nacimiento (yyyy-mm-dd)</label>
                                            </div>
                                            <div className="input-field col s6">
                                                <select ref={SelectNivel => {
                                                    this.SelectNivel = SelectNivel;
                                                }} defaultValue="0"
                                                        onChange={this.dropdownChangeNivel.bind(this)}>
                                                    <option value="0" disabled>Selecciona una opción</option>
                                                    <option value="1">Junior</option>
                                                    <option value="2">Senior</option>
                                                    <option value="3">Master</option>
                                                </select>
                                                <label>Nivel</label>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="input-field col s6">
                                                <input id="descripcionGlobal" type="text"
                                                       value={this.state.descripcionGlobal}
                                                       onChange={this.handleDescripcion.bind(this)}/>
                                                <label htmlFor="descripcionGlobal" className={this.state.editando && this.state.descripcionGlobal ? 'active':''}>Describe tu experiencia</label>
                                            </div>
                                            <div className="input-field col s6">
                                                <select ref={SelectPuesto => {
                                                    this.SelectPuesto = SelectPuesto;
                                                }} defaultValue={0}
                                                        onChange={this.dropdownChangePuesto.bind(this)}>
                                                    <option value="0" disabled>Selecciona una opción</option>
                                                    <option value="1">American Bully</option>
                                                    <option value="2">Shorkie</option>
                                                    <option value="3">Pincher Aleman</option>
                                                    <option value="4">Border Collie</option>
                                                    <option value="5">Bóxer</option>
                                                </select>
                                                <label>Puesto</label>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col s12">
                                                {this.state.editando
                                                    ?<button className="btn teal darken-3" onClick={this.editButton}>Editar <i className="material-icons right">edit</i></button>
                                                    :<button className="btn " onClick={this.submitButton}>Enviar<i className="material-icons right">send</i></button>
                                                }&nbsp;
                                                <button className="btn red darken-4" onClick={(e)=>{e.preventDefault();M.Modal.init(this.Modal).close();}}>Cancelar<i className="material-icons right">edit</i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            )
        }

    }

    openModal() {
        var Modal = document.querySelector('.modal')
        var modalInstance = M.Collapsible.init(Modal);
        modalInstance.open();

    }
}

export default ContentPuestos;

if (document.getElementById('ContentPuestos')) {
    ReactDOM.render(<ContentPuestos/>, document.getElementById('ContentPuestos'));
}
