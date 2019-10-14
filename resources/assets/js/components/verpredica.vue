<template>

    <v-app>
        <header20></header20>



        <v-card color="#ECEFF1" class="images04">
            <v-container>
                <v-layout row wrap>
                    <v-flex xs12 sm12 md12>

                        <v-alert
                                :value="alert"
                                type="success"
                                dismissible

                        >
                            {{alert2}}

                        </v-alert>


                        <v-layout row wrap>
                            <v-flex xs12 sm6 md6>
                                <v-card-title class="emp">Registros de predicas</v-card-title>



                            </v-flex>

                            <v-flex xs12 sm5 md5>

                                <v-btn color="rgb(63, 81, 181)" style="font-size: 10px" dark @click="dialog2 = true">Agregar predica
                                </v-btn>
                                <v-btn class="error" @click="imprimir">Convertir PDF</v-btn>

                            </v-flex>



                        </v-layout>

                        <v-progress-linear v-if="ifvalue" v-model="valueDeterminate"></v-progress-linear>


                        <ag-grid-vue style="width: 97%; height: 500px;  position: static"
                                     class="ag-theme-balham"
                                     :columnDefs="columnDefs"
                                     :rowData="rowData"
                                     :gridOptions="gridOptions"
                                     :suppressMovableColumns="true"
                                     :floatingFilter="true"
                                     :suppressDragLeaveHidesColumns="true"
                                     :pagination="true"
                                     :paginationPageSize="paginationPageSize"
                                     :rowSelection="rowSelection"
                                     @cell-key-press="onCellEditingStopped"


                        >
                        </ag-grid-vue>



                    </v-flex>

                </v-layout>

            </v-container>

        </v-card>


        <footer20></footer20>


        <v-dialog v-model="dialog" persistent max-width="600">
            <v-card>
                <v-container>

                    <v-layout row wrap justify-center>
                        <v-flex xs12 sm6 md6>
                            <v-card-title class="emp">Datos de la predica</v-card-title>



                        </v-flex>

                    </v-layout>


                    <v-layout row wrap>
                        <v-flex xs12 sm12 md12>
                            <img :src="'data:image/jpeg;base64,'+lista.imagen"  v-if="lista.imagen !== 'no hay imagen'" class="images07">

                            <v-card-title class="emp" v-else>{{lista.imagen}}</v-card-title>


                        </v-flex>

                    </v-layout>



                    <v-layout row wrap>
                        <v-flex xs12 sm12 md12>
                            <v-card-title class="emp">Titulo</v-card-title>
                            <v-card-text class="empeor">
                                {{lista.titulo}}
                            </v-card-text>


                        </v-flex>

                    </v-layout>


                    <v-layout row wrap>
                        <v-flex xs12 sm12 md12>
                            <v-card-title class="emp">Descripcion</v-card-title>
                            <v-card-text class="empeor">
                                {{lista.descripcion}}
                            </v-card-text>


                        </v-flex>

                    </v-layout>


                    <v-layout row wrap>
                        <v-flex xs12 sm12 md12>
                            <v-card-title class="emp">Pastor</v-card-title>
                            <v-card-text class="empeor">
                                {{lista.pastor}}
                            </v-card-text>


                        </v-flex>

                    </v-layout>

                    <v-layout row wrap>
                        <v-flex xs12 sm12 md12>
                            <v-card-title class="emp">video predica</v-card-title>

                            <iframe class="images07" :src="lista.link">
                            </iframe>

                        </v-flex>

                    </v-layout>


                </v-container>




                <v-spacer></v-spacer>

                <v-layout row wrap justify-end>
                    <v-flex xs12 sm4 md4>
                        <v-btn color="green darken-1" flat @click="dialog = false">Cerrar</v-btn>



                    </v-flex>

                    <!--<v-flex xs12 sm4 md4>-->
                    <!--<v-btn color="green darken-1" flat @click="delete3">Borrar</v-btn>-->



                    <!--</v-flex>-->

                </v-layout>
            </v-card>
        </v-dialog>


        <v-dialog v-model="dialog2" persistent max-width="800">
            <v-card>
                <v-layout row wrap justify-center>
                    <v-flex xs12 sm6 md6>
                        <v-card-title class="emp">Formulario para crear las predicas</v-card-title>



                    </v-flex>

                </v-layout>


                <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation

                >







                    <v-layout row wrap justify-space-around>
                        <v-flex xs10 sm10 md10>
                            <v-text-field
                                    label="Titulo de la predica"
                                    v-model="form.titulo"
                                    type="text"
                                    class="forms"
                                    :rules="nameRules"



                            ></v-text-field>




                        </v-flex>


                    </v-layout>



                    <v-layout row wrap justify-space-around>
                        <v-flex xs10 sm10 md10>
                            <v-textarea
                                    label="Descripcion de la predica"
                                    v-model="form.descripcion"
                                    :rules="apeRules"
                                    class="forms"



                            ></v-textarea>




                        </v-flex>


                    </v-layout>

                    <v-layout row wrap justify-space-around>
                    <v-flex xs10 sm10 md10>
                        <v-text-field
                                label="Nombre del pastor"
                                v-model="form.pastor"
                                type="text"
                                class="forms"
                                :rules="pasRules"



                        ></v-text-field>




                    </v-flex>


                </v-layout>


                    <v-layout row wrap justify-space-around>
                        <v-flex xs10 sm10 md10>
                            <v-text-field
                                    label="Enlace del video"
                                    v-model="form.link"
                                    type="text"
                                    class="forms"
                                    :rules="linkRules"



                            ></v-text-field>




                        </v-flex>


                    </v-layout>



                    <v-layout row wrap justify-space-around>
                        <v-flex xs10 sm10 md10>
                            <input type="file" ref="files" class="forms"
                                   @change="handleFileUpload">




                        </v-flex>


                    </v-layout>










                    <v-spacer></v-spacer>

                    <v-layout row wrap justify-center>
                        <v-flex xs12 sm2 md2>
                            <v-btn color="rgb(63, 81, 181)" dark @click="submit">Salvar</v-btn>



                        </v-flex>

                        <v-flex xs12 sm2 md2>
                            <v-btn color="green darken-1" flat @click="dialog2 = false">Cerrar</v-btn>



                        </v-flex>

                    </v-layout>


                </v-form>

            </v-card>
        </v-dialog>




        <table id="basic-table" style="display: none" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>

                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Pastor</th>
                <th>Link</th>



            </tr>
            </thead>
            <tbody>
            <tr v-for="li in list">
                <td align="right">{{li.id}}</td>
                <td align="right">{{li.created_at | formatDate}}</td>

                <td>{{li.titulo}}</td>
                <td>{{li.descripcion}}</td>
                <td>{{li.pastor}}</td>
                <td>{{li.link}}</td>




            </tr>

            </tbody>
        </table>
    </v-app>

</template>

<script>

    import header20 from './header20'
    import footer20 from './footer20'

    import Vue from 'vue'

    import {AgGridVue} from "ag-grid-vue";

    import moment from 'moment'



    import VueSession from 'vue-session'

    Vue.use(VueSession);

    var bus = new Vue();

    const LinkComponent4 = Vue.extend({
        template: `<input type="file" ref="files2" @change="invokeParentMethod()">`,
        data(){
            return{

                datosimagen:''


            }


        },
        methods: {
            invokeParentMethod() {
                this.datosimagen = this.$refs.files2.files[0];

                bus.$emit('ocultar4',this.datosimagen)

            }
        }

    });

    const LinkComponent = Vue.extend({
        template: `<v-btn @click="invokeParentMethod" class="bot01" style="transform: scale(0.8); width: 50px; margin: 0; min-width: 0;" color="error"><v-icon>delete</v-icon></v-btn>`,
        methods: {
            invokeParentMethod() {

                bus.$emit('ocultar')

            }
        }

    });

    const LinkComponent2 = Vue.extend({
        template: `<v-btn @click="invokeParentMethod" class="bot01" style="transform: scale(0.8); width: 50px; margin: 0; min-width: 0;" color="primary"><v-icon>save</v-icon></v-btn>`,
        methods: {
            invokeParentMethod() {

                bus.$emit('ocultar2')

            }
        }

    });


    const LinkComponent3 = Vue.extend({
        template: `<v-btn @click="invokeParentMethod" class="bot01" style="transform: scale(0.8); width: 50px; margin: 0; min-width: 0;" color="success"><v-icon>pageview</v-icon></v-btn>`,
        methods: {
            invokeParentMethod() {

                bus.$emit('ocultar3')

            }
        }

    });

    Vue.filter('formatDate', function(value) {
        if (value) {
            return moment(String(value)).format('DD/MM/YYYY hh:mm')
        }
    });

    export default {
        name: "verpredica.vue",
        components:{AgGridVue,header20,footer20},
        data(){

            return{

                ifvalue:false,
                valid: true,


                valueDeterminate: 0,

                alert: false,
                alert2:'',
                dialog: false,
                dialog2: false,

                list:[],



                lista: {titulo:'',descripcion:'',pastor:'',link:'https://www.youtube.com/embed/tgbNymZ7vqY',status:'sermon',imagen:'iVBORw0KGgoAAAANSUhEUgAAASsAAACDCAYAAADVnD2DAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTdDRDU0RDZGOTgzMTFFMjg4NThFNzE0OTE4MDEwNTIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTdDRDU0RDVGOTgzMTFFMjg4NThFNzE0OTE4MDEwNTIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5kaWQ6OTYzRkNERTA4MkY5RTIxMTk0Rjg5RTg3OTFGMTUxMTUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OTYzRkNERTA4MkY5RTIxMTk0Rjg5RTg3OTFGMTUxMTUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4cU/xOAABhnUlEQVR42uxdB2AURRee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'},


                form:
                    {titulo:'',descripcion:'',pastor:'',link:'',status:'sermon',imagen:''}
                ,

                form2:{ imagen:''},


                nameRules: [
                    v => !!v || 'El Titulo es requerido',
                    v => (v && v.length <= 90) || 'El titulo debe tener un maximo 90 caracteres'
                ],

                apeRules: [
                    v => !!v || 'La Descripcion es requerida',
                    v => (v && v.length <= 450) || 'La descripcion debe tener un maximo 449 caracteres'
                ],

                pasRules: [
                    v => !!v || 'El nombre del pastor es requerido',
                    v => (v && v.length <= 90) || 'El nombre del pastor debe tener un maximo 90 caracteres'
                ],

                linkRules: [
                    v => !!v || 'El link es requerido',
                ],


                columnDefs: null,
                rowData: null,
                gridOptions: null,
                detallesAltezas: [],
                autoGroupColumnDef: null,


                paginationPageSize: null,
                rowSelection: null,
            }

        },


        beforeMount() {
            this.gridOptions = {
                enableCellChangeFlash: true,


                defaultColDef: {
                    resizable: true,
                    editable: true


                },


            };

            this.columnDefs = [

                {
                    headerName: 'Id', field: 'id', filter: "agTextColumnFilter",width:80
                },
                {
                    headerName: 'Fecha', field: 'created_at', filter: "agTextColumnFilter",width:150,
                    cellRenderer: (data) => {
                        return moment(data.created_at).format('DD/MM/YYYY HH:mm')
                    }
                },

                {
                    headerName: 'Titulo', field: 'titulo', filter: "agTextColumnFilter",width:200
                },

                {
                    headerName: 'Descripcion', field: 'descripcion', filter: "agTextColumnFilter",width:500
                },

                {
                    headerName: 'Pastor', field: 'pastor', filter: "agTextColumnFilter",width:500
                },

                {
                    headerName: 'Link del video', field: 'link', filter: "agTextColumnFilter",width:500
                },

                {headerName: 'Imagen', field: 'imagen', filter: "agTextColumnFilter",width:150,editable: false,
                    resizable: true,cellRendererFramework:LinkComponent4

                },




                {
                    headerName: 'Ver Contenido',
                    cellRendererFramework:LinkComponent3,

                    field: 'vercontenido',
                    filter: "agTextColumnFilter",
                    editable: false,
                    resizable: true
                    ,
                    width:150
                },

                {
                    headerName: 'Salvar',
                    cellRendererFramework:LinkComponent2,

                    field: 'salvar',
                    filter: "agTextColumnFilter",
                    editable: false,
                    resizable: true
                    ,
                    width:100
                },


                {
                    headerName: 'Eliminar',
                    cellRendererFramework:LinkComponent,

                    field: 'Eliminar',
                    filter: "agTextColumnFilter",
                    editable: false,
                    resizable: true
                    ,
                    width:100
                },



            ];



            this.paginationPageSize = 15;

            this.rowSelection = "single";

        },

        beforeCreate: function() {
            if (!this.$session.has('jwt')) {
                this.$router.push('/login')
            }
        },

        created(){

            bus.$on('ocultar2',() =>{

                this.editar3();


            });

            bus.$on('ocultar3',() =>{

                this.onSelectionChanged();


            });

            bus.$on('ocultar',() =>{

                this.delete3();


            });

            bus.$on('ocultar4',(fiaz) =>{

                this.imagenrecive(fiaz)


            });

            this.getmenber()

        },


        methods:{



            imagenrecive(faiz){

                for(let i=0;i<this.rowData.length;i++){

                    if(this.gridOptions.api.focusedCellController.focusedCellPosition.rowIndex === i){




                        this.rowData[i].imagen = faiz

                        this.form2.imagen = this.rowData[i].imagen;






                        var _this = this;

                        let rowSelected = this.rowData[i].id;

                        var logForm = this.toFormData(this.form2);

                        let uri = `./api/predica/image/${rowSelected}`;
                        this.axios.post(uri,logForm,{


                            onUploadProgress(uploadEvent){

                                _this.ifvalue = true;

                                _this.valueDeterminate = Math.round((uploadEvent.loaded / uploadEvent.total)*100);
                            }

                        }).then(response => {

                            _this.dialog = false;
                            _this.alert = true;

                            _this.alert2 = response.data;

                            setTimeout(function () {
                                _this.alert = false;
                                _this.ifvalue = false;
                                _this.getmenber();

                                _this.valueDeterminate = 0;
                            },2000)

                        });


                        i=this.rowData.length;

                    }


                }



            },


            submit(){
                if (this.$refs.form.validate()) {

                    var _this = this;

                    var logForm = this.toFormData(this.form);
                    this.axios.post('./api/predica/create', logForm , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },

                        onUploadProgress(uploadEvent){

                            _this.ifvalue = true;

                            _this.valueDeterminate = Math.round((uploadEvent.loaded / uploadEvent.total)*100);
                        }


                    })
                        .then(function(response){
                            _this.alert = true;
                            _this.alert2 = response.data;

                            console.log( response.data);


                            _this.$refs.form.reset();

                            _this.dialog2=false;


                            setTimeout(function () {
                                _this.alert = false;
                                _this.ifvalue = false;
                                _this.getmenber();

                                _this.valueDeterminate = 0;

                            },3000);


                            console.log(response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                }

            },

            reset () {
                this.$refs.form.reset()
            },

            toFormData: function(obj){
                var form_data = new FormData();
                for(var key in obj){
                    form_data.append(key, obj[key]);
                }
                return form_data;
            },

            logout: function () {
                this.$session.destroy()
                this.$router.push('/login')
            },

            onCellEditingStopped(e) {

                let keypressed = e.event.keyCode;

                if(keypressed === 13){

                    this.gridOptions.api.tabToNextCell();

                    // if(this.gridOptions.api.focusedCellController.focusedCellPosition.rowIndex+1 === this.gridOptions.api.getModel().getRowCount()){
                    //
                    //     console.log(this.gridOptions.api.getModel().getRowCount())
                    //     this.gridOptions.api.tabToNextCell();
                    //
                    //
                    // }

                }




            },


            getmenber(){
                var _this = this;

                this.axios.get('./api/predica',{


                    onUploadProgress(uploadEvent){

                        _this.ifvalue = true;

                        _this.valueDeterminate = Math.round((uploadEvent.loaded / uploadEvent.total)*100);
                    }
                })
                    .then(function (response) {

                        _this.ifvalue = false;

                        _this.valueDeterminate = 0;

                        _this.rowData = response.data;
                        _this.list = response.data;

                        console.log(_this.gridOptions.api)


                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },


            onSelectionChanged(){

                for(let i=0;i<this.rowData.length;i++){

                    if(this.gridOptions.api.focusedCellController.focusedCellPosition.rowIndex === i){
                        let rowSelected = this.rowData[i].id;
                        let rowSelected2 = this.rowData[i].titulo;
                        let rowSelected3 = this.rowData[i].descripcion;
                        let rowSelected4 = this.rowData[i].pastor;
                        let rowSelected5 = this.rowData[i].link;
                        let rowSelected6 = this.rowData[i].imagen;




                        this.lista.titulo = rowSelected2

                        this.lista.descripcion = rowSelected3

                        this.lista.pastor = rowSelected4

                        this.lista.link = rowSelected5
                        this.lista.imagen = rowSelected6


                        i=this.rowData.length;

                    }


                }




                this.dialog = true

            },

            delete3() {

                for(let i=0;i<this.rowData.length;i++){

                    if(this.gridOptions.api.focusedCellController.focusedCellPosition.rowIndex === i){
                        var respuesta = confirm("Confirme el borrado.")


                        if (respuesta) {

                            var _this = this;

                            let rowSelected =this.rowData[i].id;
                            let uri = `./api/predica/delete/${rowSelected}`;
                            this.axios.delete(uri,{


                                onUploadProgress(uploadEvent){

                                    _this.ifvalue = true;

                                    _this.valueDeterminate = Math.round((uploadEvent.loaded / uploadEvent.total)*100);
                                }
                            }).then(response => {



                                _this.dialog = false;
                                _this.alert = true;


                                _this.alert2 = response.data;

                                setTimeout(function () {

                                    _this.ifvalue = false;

                                    _this.valueDeterminate = 0;
                                    _this.alert = false;
                                    _this.getmenber();

                                }, 2000)

                            });


                        }

                        i=this.rowData.length;


                    }
                }

            },


            editar3() {


                for(let i=0;i<this.rowData.length;i++){

                    if(this.gridOptions.api.focusedCellController.focusedCellPosition.rowIndex === i){

                        var _this = this;

                        let rowSelected = this.rowData[i].id;
                        let uri = `./api/predica/update/${rowSelected}`;
                        this.axios.post(uri, this.rowData[i],{


                            onUploadProgress(uploadEvent){

                                _this.ifvalue = true;

                                _this.valueDeterminate = Math.round((uploadEvent.loaded / uploadEvent.total)*100);
                            }
                        }).then(response => {

                            _this.dialog = false;
                            _this.alert = true;


                            _this.alert2 = response.data;

                            setTimeout(function () {

                                _this.ifvalue = false;

                                _this.valueDeterminate = 0;
                                _this.alert = false;
                                _this.getmenber();

                            }, 2000)

                        });



                        i=this.rowData.length;


                    }
                }



            },

            handleFileUpload(){
                this.form.imagen = this.$refs.files.files[0];
            },

            imprimir(){



                const doc = new jsPDF('l', 'pt');
                var images='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAAEsCAYAAAB5fY51AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAATdZJREFUeNrsXQdgE9Ubv7sk3SsMEYS2tIoimxZQVgu0LoYItIAMi6Plr8hSaQEVUNEWFVERbVHZIBShIEMlslUUgiwBEWrLRpB0UTqT/3vpu3K93iWXNOOSfj99JL3c3Vvf+73v+96iDQYDBQAAAK4ABooAAAAAYQEAAAAQFgAAAMICAAAAICwAAAAAwgIAAEBYAAAAAIQFAAAAdYISigBgCwTM2B2KPnAIQqEjucxeM0KBgoE22WPmkICvs99zbsyNzoESBmDQMNMdYAn8ZuzqSAgp9M4n3UGKqi6BsASvM8Zn6KOEwI6gsBv9fuTqO1F5UCNAWACAET7Td0VjUkKEwZJUBxExohxAWEK/56LfjASGw+W3o45ArQFhAeoHOWGNKZoQUzSXnBjarBg5i7D4actnjORFYwLLuvh2bzAlgbAAbkZQbAgRu9eFCItcp9nfcjFxYRLLeat3FtQ6EBbAheA7fddgwx2C6iD1ORcmLO69+Ubyoums7Dm9gLyAsAAyJCg8YjeYBExSgdbUtpsQFrlGs6YjJq2ss0BeQFgA58EbkRRzh6Se5P8OhEXzr+Wj+5aiz6VnZvcCpz0QFsARJMXRpJ40RR5AWLTI+43XjqKwgEJm48lZPWHKBBAWwMZExZLUM1JIAAjLLGFVXadpbDJirWvBiVk9c0DSgLAA1pNUKPpIICHEXGMHwrKKsLjv34SJ69ibPXeD9AFhAaQTVTT6mEwJ+KWAsOxKWOxve9APs4+82QOICwgLYIKosCY1mzIxTwoIyyGExeZzD7o2+9AbQFxAWACWpIKINoVDoMUEA4RlT8IyXsPEhcpy9kEgLiAsICrriAoIy6GEZSxLBY00LlRfv7zeA6ZEAGHVK6JaQPFG+1yJsNr5ehp8lQzVJMDL4IU+PVUKw11B3tXRhTTxkxx1XlEZXXCrjMovLqcLi8vo87pi+t+ScupSaQUtQ8Jif1uGPmfvf717Dkg0EBZoVDIhLERMlc38vCrV3ipDi7v8KoL8PPRqfw+9I8qrpLSSvqa7rTh//Zby38IS5lJRqeJyWQUjE8LCn3gS6oK9M7vPBukGwnI3sppta6KyNWEFKBlDRJBPeUhD3/K7g7wrw5r5l8utHPMKS5mcf2+pLt64pTqXV6y6YiQwpxEWe38uTdMJe2Y8vBskHQjL1YkqgbJw1M+RhNWnkV8pIqiysCZ+Zc0a+ZS7WvnqCssUOdeKPM5eK/T6O/+2R0GlnnYCYaFX0Jg2N6GQsGvGwzBrHgjL5YgK7zOF/VRR9o7LEsLyUzAVPRv7lbRuGnjr3mb+Jd7eSr07lfupnDyfs1cKfP/Ju+2FzEelgwkLh3z0NWHn9IdhkTUQlksQVRDRqCY5Kk5zhOWjYMqjG/ndbt0s8Fa7cHVRfamLKzeKPY/l6AJO3yjyu1ZWqXQQYeHXod/oTeiPBE3KQ6BtAWHJlqwGE60qxJHxihFWpL+XrkuI+nb7lupCby9VZX2um5M5ef5nL+f7H79ZHFCs1zMOICz8B96TC5MWaFtAWLLTqpZSEpbR2JuwPBm6tHcjv7wnOja73ljtVQa1UxO3SyoUf+bkBx27lNfw78ISPzsTFvmNWoZ+nfxjcjfQtoCwZKFVYbIKdFYacMNRK5m8x5urb/Vpf/dVH5/6rU1JxX95JZ57T1y75+TNW+rbeoPCjoSFvtJHsUP+h+RuMOEUCKv+aVUsMFGNvr/JjZ7tm/wLtWK11qU8dOa/xtoLumY3yis97URYRoc8en7ytmndlkKpA2E5kqyiCVmFOCsNgQrmv9EPNPk3usPdV6BGbIffTl1vevxiftOcopIgOxCW8Xl0Ydm217omQGkDYTmCrGajj1nOil9F08WjwxqdG/BQcyAqO+Kv3PwGe85cDz9fWKq2A2Hh//Fup9HfvdoV/FpAWHYzAfFoT5Sz0jD0nqCDT3Ztnufn61EONeIYnM7Na7jvr+v3XSwqbWBjwjIu7UHPRW9+pQv4tYCwbEpWHQlZOcUEvM9LdXZKdFhOs8a+xVAbzsGpnLxG+8/cuP9iUUlDGxIW+9y4Ta90WQqlDIRlC7LCvgY8t8rho4AKmr41pX2z33t3aHIDakIe2H/839AD/9xsU1he6WNDwsJhStYrXRZACQNh1YWssABNckbcjzTy+zUhKvRyoJ8HzKWSITYfuNTu+JX8VuV6g4eNCAt/X7ZxamQClC4QlqVEZdP9qiyKm6GvTosMPtTtwUbgjJU5rtwo9tv+x5WI3PzbLWxEWMZJphumAGkBYVlGVrspC452txU6+XocS3ni/qNB/p6gVbkQjp692XT78au9iiv0/jYgLPz9KMPQ0ZmTIup9pwWEJUOyQgJa+L8HmhwY3L3FP1ALromCW2UePx291u6PS/kRNiAsChEWnhkfva6ekxYQljhZOWUksKFS8c/MnqEH24WrwbHuBvj7fEGjzUeuRBWWVjSpI2EZNS1MWmvrMWkBYYmTFdasHDoS2DPA+7dJj913uEGAZynUgnth9e6cqNPXizrVkbCMpKWg6ejVEzvXS9ICwpIJWY0NbbAjITb8GNSA++LwmZstNh+9MlBPGbzrQFh4estRdD161cv1j7SAsJxMVkhgiya3bbpt4MPNc0zdV5aX4+kRFAqal4sjv6jcc+WenNirt8oerANhGZfy4FnxKyd0qlekBYTlZLJ6Pyp8TeQDDa+Zu/fsj292aNEl4S9PdVgJ1JbrY+P+C521F/OfqANh4d/3IMKKBsKqf2Tl8NFAfwVzZvmwthsbqb0kEdCl3xeH5l87dfeDA+cfgObuHjh46kbo1uPXhukpytdKwsJ/L1sxoVMCEBaQlb3Jan1jiWR1+dBXLZtFPvfPzk8emtp34oH50NTdB7lXi4JW/XLhqZJKfUsrCcs4uXT5S/WDtJQgMo4lq5aeyv0fDX7wp7saeksiqwu/fRHm5duoEAlsuYenj+7ib1+0CH74f9lQbe6Bls38r7/0SPjyFXtye94oLutn5WueSfjsyO6lL3Vc6u7lxdRz7WqpI8kqwtdDs/q5iM1NGnrfQj1jpZRw88Lh0LvaDruIv/s1CDubc2RtP6nPQnCN0CDA89akga1+CAn0/rEO4rVk3KIjg4Gw3JesZlMOXBvY2lu17bOETtuR+l5pSagoK/Zivzds0env4qIbYTm/LAy19D0Q5B9eeDz8h873BC6ug5gtff6Lox3Bh+V+ZIV7oo2Oiq+FhzLr28TInZY+d/rHOe0ry4u92/RP+429tu39DmkqT9+bsRN/SQODyj3x7b4LDx65lD/eAh+WcekP/lQwdC663nFxUnu3nO5Q7zQsMn3BYbZ+KCKrDYmRGiRLekuD7srJe9XN2l/gXvNXBx8rLSm458R3r3W15p0Q5B+G9WpxYlCHu1OQ+ORbIXJ4KZnbnnvI1DOyYk+2cchcKz+GPv3JkAf3WmsiFOWdv7d551G53GstOw7V4HdfPKMZevvGKQ8wpdwzdHuwUf7A9k3mWklaUYkZx2YDYbk+FjjKye7N0KfWxLdbdM9dPgVIAMutCeg1Bv61kK4J/yiV3v/pKyu8f98waay174Yg//BQm0Y3B7Rr8paVpDUrafHxwUBYrqtdJTjKyY7U+gvfxLX9qHkT3yKGpvXWhDO7PmjFKBTFQr81C+tuVPlvFVztePL7NztaGwcE+YfubRvr+rdrMttK0lo6fvHxUCAs1/RbLXBQgRa8+3DIopC7/crq4scounm+gW9g8Cmh31r1eEHLKJS3cXw5J7Y+d/301gbg+3Hf0AOR1hNt75plBWkFOtJf6wjUl4mjDvNbTXrw7nf7d2t2oa7vKSn8twH6QL0sVesIr6Cm7fLVTR7YfvPqn0MM+grvwz+8M7GXOvht/7vbwSk6boqebRtfP3Pl1qfZ/9163VJ/1otfnpi96Pm2buHTcnsNi8y3cojfasQ9gfOffTQMDyvr6xoMlMFAG31Ywr93enT6VoZRGAmqvPRW8MHNKWNsES8E+YbnHmn5Z3gj37et8We99NWJjkBYrmEKOuRU5ge9VFtnxrfB86X0tgilt3WNEF8ZxH4PbNaxqGlYj2Vs/IV5F3vvWz5yqK3ihyDP8GxsyxNqb9VCa6yMl7/+MwgIS/6moN3hy9CnM1/s8jUy3ypsFcpLixoZDAa9qXsejl+k8fD2/5NNx80rJ4cdXP9iL1umA4L8wiuDW+3yUSm+tVBMsZUxGQirnpuC2Mn+TVy7d2ia0tsyMArVrdISXWNz9z3QZdRX3PRcyf55wu+ZL0bbOj0Q5BVmDHtgCSKvE5aahpOW/NkRCEt+ZBXqqN5kSpu73w1v7ldoa9Xf27dRdlnJrcbm7mvV66VzDZo88E0N0vrnl5cRafUBE8qtgyKxb8s5iLzOy9HqAMKyvFLsPioYHei95IXHw47bQ+1H1qC+tKSgrZR7+z2fucLTy+84N22X//ll4m/r/hcNJpT7hhZ3eRdHt2po6ehfh0lLT04GwpKPdhWNh3LtHc9dSubQFy90WmevHtTLp8FVHM8f373RVsr9PYd9PEeh9PiXm8aruQem/LR48Augjbhv6Ne5yZXmgd4zLRTf2VOXnwoFwqonjnYFTRXOiQr7lKZpg72Cf1DTq0RTipFyf8OQrkWtu42eQzOKW9y0FurOD96R/sTUvEtaX3umF4LzwvgnwrReSibTAhHG1sdsV2zcbrW9DNKusKr7kb3jGRfS4PUZw1vbfW/1FbNaa5QKBdXt8emjw7qMuirlmRM/fRB++vdV8w2U3rdq+xHauA2JysPrXPuoibNCOo+4SgHcDrnXir2+2pX7OTIVW9C87WcY9pAL9A9D9qNRMMbvfT4Y03o3aFjOIasgR/QaoR7KPTOHt/7FEUsyPL38juI4j+5Z+JrUZ9r1e/Xv1l1HTWHomppWeXlJ+B87P0w/svXN9rDcxf1CaBOf4h7h6umWmoZgEjoPk+3taMem4MdPPvCBo1T9AHXwfhxvWemtDjuXPD1U6nPtYl77+4EuT0+meaRlMOh9c05unb9rSdwzYEq5X3i8a9NLgd6qTy0Q6ahpK09Hg0noHO0qx96EhUzBmW+MfHCfo/J19e89fppVL25jFAylQKFpcOf3eo9esl3q88d+TLvv7NEN0ysryu6lauxQSVNKldfZ8A5D3mvT95W/waByL8xae2oR+mgrwSTE13LnjX7AZRzw7qJh2V27CvFU7kFktYdy4AjQ3fdFFfj4NawmqOuXj798XDMvXOrz7R9J/qvHkA8meHoH1CLZiorSe88c/uarnV8NS6BgtM2tQo/wBvMsEe3kVX+5zL5ZLq9hOUK7wqbg+iFthna8T13k6Pyd2p/e9PCuhd8qjFqWgmIYhmrSotPcniMWb7XkPbuXJ/S/cfXEJMqg96OrPLLV596pkLbVtGWvBRED3z0M+ol74KPNZ5/OK6mYIEHDMp4gnTbqfpcwDd2BsLDj0K4LnB9p4PNRxviIb5yVx2/f7/lmWWlBf5aw8MhhYIPgL/s8u96iE1auntnt//u2WW+WlRT25hIWO5Lo7dtg672dRywO75ZwBZq8G5iG35xajz5aSCAsfKll6tP358g9T4rZs2e7unaFicTLXnH4K+i/tk9+6C1n5jOoYfDh86d2YKe7BxYuTFrlpQWdc46sjQhqFL7HRx1cKuU9fg1DS+9/aNyP/53XnrldeK07uuTBJayKitut/rt4eMDlU997+AXcfca3QUgpNHvXxY3/Sk7/W1Q2qMY0B0JYTI1rxu90TLtG34MPy74YbG/f1aiWDT8y7kvlxKCvrDQ0aRExh5+2yvLizoe3T990cP3/+lvyvt5PZ+zu8dS8QV4+6i38dxqQyViYd+GF37akbNqzJP6F69n7/JydfwjWhfioFkc9FIzUw1kTwCS0v4aFVdgQe72/ladys+aVh52ugv60PDGy39iMQ1sXPZF0q/BaktJoGtKUUqlAqn2Vb8vDK0DbvFW/D+7tMfkvS9594NupkVfP//aqvrK8FUVMBKNgGDU5HBRFXj6NNrdsN2h1WNdnL4Pe4lr4+c8bzXb8eWM1+hpgxiTE3596d2QrWR8R5rIaFjkM1W5khR3tL0Tck46VDmeG3ONb/W5c+ysCf+//4rYvvH2CvhNKb2X5rYiLp7etObBmxJxLx9c0lfr+h4bOPzh4ys/DGzR5YBZDM0VCGtftW9efPvXbV1t2LH58/uEt0yOcXSYQpIcebRpdCvBSLnMXLctlNSxEWLgneNJe7+/h7/nF2kldP3d2Pn/4+rnIm9fPdhmZvKc6Ld99Gvt2eWnBIK6GVRWUVX+j616+DTff80D/z5u2HS5ZK7p0WuN/Ys/C0bdvXRuN5MLPeNpwldOjxlIPhcrrrwB1y1XdRyzeBDqM/PHXhSL/1T9f3IbqL8CMhoWvqd8Z0Uq2p0YzLkpWofYkK6xdTeobtkImvSRVXlrcjHtt4Ms7Xg9Qh5qca1Nekj/owvG1249sHPPV2Z0zBkmJ654HYgoeTcpa1OWJtx/18b/7c1pA48LQV5Ten3/jr7d++Lzv9n2rxo66dna3H2gz8g33t/AruDvQK9UdtCyX1LDsPZXh8Ya+r3/5v86ysOXPHd7ov2vDG0uff+fE0Fr+pw1Tu/x3+dCnqGf042tYxu/omlELM36qijx9GmYF3t0h6662405L0rhO/eB/8uf0MSXFNwYbDJXNuDPla444KdG7G2S1aP3YivCuz10CnUaemLPuLzwK2NyMhnUUaVgdgbBsS1g59vJfqWj6Uu7MnrFyyu8X01udHP/emQeFzbgf/P868NXY8pIbL5kirKrvSuNv3v7NU4O7v7XckjTsXZPU71Z+7lMVZUV9+YTFTosw7grhFZgV1PiBrM793/sdKEJeWLQ958l/C0vfM0NY+LPlW8PvywGT0DZkFU3Z0dneR+39mezUepop3LhwSF9hM+7Rgr4J6xaGdRge4+GlXo4kr1C0d6IVlz28Gn3md1cnjaVp6D0yXfP4+O9fuq/z0zEe3g1F4ykvLRh84+LBpTuXDFx2YH3SYDDJ5BNefDw0C5HTRVc2C11Ow0KEtZSy05HzWLs6/0avvnLL8+KZbVd4ePqcfubN3+eau/fq3z8F5Bxe/kxFWd4zSNvyrzYJVZ6XFQzVrMl9A/o2eiC+zmbbxZPfB/x14MtnSktuDqH0xFxkl/zg/5iqT0ahuuzt23hpWOTYjXff168A9Bzn4vNt/wy5Wlj2nhkNKxdpWKFAWLYhLDyCYZfJov2CfFJWTozcILc8L5kTObOspGhI0nunI6Q+c/3czoDLJ7Niym9ffZlh6HsUSlVh0/v6D7qrzUib+5j2rnxmSHHhxZcpg/4ePmHdmWXNFKq8gjY0u6/v0vBuieDncq4vayeql+YmCAvPwes0O+7eI0BYdSMrbGJstJd2deGNXtFyzPf6BYNi/716elHDxi2Th7/yg8WEmnPgo9b6ypKAhiG9TwU272E3LWfvqoQhtwouvI5k3r8WYVF3FlyrPP03+AY003QetGAH0IfjMX/TuYmFZZUvmyGsjxFhye6wClcjLLuZg30Cvad9M7nLt3LM98mfVwTs2vz2H0qF8lLSuyd7y7mOLv65NeDMwWXjykp044zEJUBY1dcYRaGnd8MlYZ1HLWlyXyyYiw7C0bP5AVmHr+1BdRBggrCOIsKS3Wihqznd7bJvD553hcgKr2yXpbP0wR5j8j09fb81IJNr3YePDqVk7Nht3qZ/ft+EdQva9prUS+nha7oDMBj8y27/N/HMr59tOb3rvdYUOMYdEjrcG5jvqWLMabcd3vn2XCgQVt3MQbv4rtp4qb6Wu5A1vOs+TKhUvu7iG6d/Xekv9/Q2bzMgv9+zWa8GNWk7kmZUp0zzlv6e6xcObNFmvTQUCMUxoVOLgAXOUhDqi4Zlt8Kb2CPkS7kfMjBkwrpfFAqPAwa9wf/XHz5Md5XDEboNnv9L7PNbH/PwVpttILcLL71/OOvFoXCohP3DY5F3nVcy9K9AWPaDXRziTVWK9YN63pOPjHiD3EOjJvcZjzCrrCh7aPk7XT90hTSzIWrs2vl3tej6OM0oT5okraLLHxz/PuUhV8qbq4ZAL+V6M80jau7G7CAgLMvNQez8s8tk0ceaBnyJCsHgCmHYxA2/eHr5foXTXVZ2e9iKuV0+dJW049Dp8bdPxD635VGVp/9Xpuqk4L+/v8w+8Ok9rpQ3VwwTB4Thk8sLnKEouLuGZZdC86LpP99/tv0JV/I9PDvr0CxGUaWllJeVxC17u/MP+zfMaO5KeYges26Wt9/dU8Vn5ev9r/2z9yvwNdk/eKvMnhg9GAhLJoTV2dfjS1cUsi59/zeUoRnjEotKfeWDZ//8/se1H/aZ6kp56DF8ydqGTTsMFSMtg77iwd/Wj5sKpGLnwRG111pX0rBcYh6WPWa3I6Yu+DSqZdcRfYNdcv7Pdxlj21y7dHQJTVPNjXNpqg6nuOgX0OTDwRO2rHWVfPyxfUYb3dXj3+K9mmjePuN49tbdYVHd7us+6QIFsBveWv83XqjenDcPi1IyVSsW0P+dpg8Ok8Wsd9lrWMR/ZfPpDGolsx2RVb6r9owDE5efiIhK7EfTij+rtRKDofmtwmsfrU7tdnrjp4++cmDzG7I3FTs9/u4JdZO2Q8R8KTfO/7oANCH7Bk8FY+5wXtloWa5gEtqlsNr6eHzv6ocMdO77Un7n3s8PUao8ecuVDAFlJfmvXDij+X3jJ302fL94SPzBLW82l20+nnjvhI9/00mC3ix9+cN/bH75MThUwn7hniBPlzELZW8S2mMrZMTS52/MieriLir9l3O6jfDx9mxRUV78KrutMT54lSFHghmvYZNR6fGnSuX9i4e3+ueQ1o/8Eh4xOl9O+di3euQ7lRXFL3BNwqr8MBd7jMyMoAD2Mwu/PauljWahoEmYj0xCWUxvqJcaFjIHt6G2YHCXcPt24eNPJ++dF9Sw5VOUiWFqvb6yTXl58Qu3C68sPXNoxZkdX/Xf+dOyIZ/sXTXi1YObJnY/uSe1uTPz0eLBQfMQSdVKv4EyND+YlTTcnepMbsFDQW8z0WQC5236RxbrCpUy165CbeC/ylfQ1F5vmt4T7KE8kV1aMaCTv5eGJvuluwMMen3A2vmD24yYmrX/yM6FnU9pv3mHMlSMMPccJjBDRUkbSl9OVeblUsUFF6j9q4biPaz+VCgU+Uql5wlGocxXMAoKa2Wt+737sz3z0bLTyLxLp79LR5ria/zfykp0r6E6WwO6kH1wd4DHmgu60kQzioPTHe+yNgnrsp2MN0Ovauet+v6H5Ie3u7uwLUxpizf2C5yQemICe21LRnyP4sIryTSl786ahAxTddQ9QzM1TEUFe914Ag9DrjHV16qeoymfgOZP3t9nrl1J68RPc4NvXDp4mGsSsntseXk3eDnyqXQgLXuZhevPZjNkBweeSUgpaHrZtCdbJoBJaBoWqaFIk7oQ5qmc+W6XFmGXZ/eeiMhqG1UPRnlUKq/j5eVlT+zf9HYAe21A4rr98a/sG+jh3WACTStO2KIyykrye9g7L237zcxlGJVgJ1NWmjeNglE9+8mRabMwWg6EIHfCklRIXjT9c1sv1YT/3oruePj1nl+8OCg8n66x95J7hwc7D9qGRwZPHNownv/b4Je2rBk6ZW+Ub0CLQcjUq5O2qa+4Ne38wU+D7Z0fL9+7RM6DNLT4Y8vkHvWpbh0ZvJTMfhPVH/L+dzlBQFimEWqOqKIDvAZdfStq4P6ZPVbX156x95BZeQqFcltZafG0rC/GthC657FnV+9/8qUdo+5tP6Slh1fQBIZRbrPCg1BgMFTaPT/dhizaj2wRQa2wpPjf8aAN2WmfrGD/rba0eOoVYXlP34XZXHDBsx9Db+vl7zUQEdWArNce2gfCRhn8AhobtZJLuVqTp/606T0h79Hn1q96PGnbqMeTflD7+jcdqPTwTqMZxc+omzUzo9wQUHTzTLJDzBMP/8+FBxgqnzi1a24LqHPbh34dG+cxNH1CzmahbJ3u5DivXXyNalizgP8tHN/pvD3iXJHWtyfZzLf6zL3qgjJu8Vv12SL84eM9n5qTL7cy+zS59VbKYOjh4en1RdLbR1KsdnxrZgeXFd8Ixg53muN8V6q88+/v8/ZxR+Vn94oh57ETmHW6M1XnrON0pHYbtiyVAtgcaRvPpVboDeMFnO74+6bXBoY6dTG0nKc1VKufKpre39XPI3XbtIf31/Wlqz/s36646N92+sqK4IrKil40ZQjWGwwt7nBTFWGx5MRhrKoPdOPJPzZSp1CgaeYCCucVSuVxpdLjmI9f4+NDJ2w87qwCC2oYnJJ3I3dfRXnp+K/ffujYc28cWG3Ne9rFzMYdwnlnC4BC4bnIoC+tRbyVlaWjUHUAYdkBXipmX1Fp5XhrXDT1WsPym7FrDurf+0b6qN77PqW71US1Yt6jiKCu9yovL+2P7ImeFJ+MCDtZQlicP2s+W6WWFSgVin0Kpcf+Bo1bbRnw/FKHNvzPX+8wvbKiLIVRMJSPT+CLCTN/WeWqjefID68H518/eZyvYeE68PRWj4p88ostQDE2tjJ2XQzOvVlyXETDopCGRQNhCSDuw99br5rU5aJ1JPVI+4K8q6MM+vIBRu2J0MsdYrEnYXF+M65+p4+rVF6rghqFbxn4wgqHkNeime3WUJS+PzbjPD28Ph/3xsFkV21A+1YP/0JvqHiaT1iMQrn64bhV44FibI+53579E5FTCyHCQv/3eWVA6G4gLB7KKgw+2Cqw5Jkv3ug8qrys+EWUpXY1SEaAsBhGuV/BKFDvTeV5+QTtxz+pPHzzR07deoz/3o2LRgTfKroegp8rvZ2PtbQgfWVlO4Ohsqc5wqI5aWAYxVYfv4aL4id/v8+eZadZ82rg339+vw017HbGCaAK5f4mzdqMH/D88vOu1ngObEjqVXr7xlY+YaFQ0H34N82BXmyP9zaeXWOg6P4ihDUOEdZSICweyisNXpQEH9v25RMDz57c9RIyg15CfwbQdA2mYsmiQFFlpu3z8Wu0b2zyj8dslc61H/VvX3zrRq/Kyop2er2+F0UZgsUI6w6n0edVnj7vjkneZzdzbcfqqYH/nN6ZjtLTn8xcL/D08n131LS9n7laA9qzMm47ykfPmoRFUT7+9/To1H/+MaAY22JeVvZL5XpDqghhzUGENRsIqzZheaAPD1P3LJzREWlUt2dUkUQNQsD/nFcqVVs8vQO2PP/mz/scle6sz0cE5+lyB1aUl4zCmp4IYbEXz3t4+Lw72o7E9eWcyDSkCb6oIEtxEHGf9/D0e3f41J9cxre1/5vRoyorSr7gE5ZS5ZvSbejXnwHF2BafbPmnV2GZfpsIYW1ChDUYCEuYsFRCv331Tu/2hXn/ztMb9D35hKBQKFd5eHlvSZpz6Dtn5yHri5EheTfOjaqoLJ+A0hcgQFhGMDRzHJml00ZM3WEXYl31fj9kVuWlowYfbFwrSBs1LkRcvp/dE/bwyocGvpUv90a0Z+Wwkzj9XMKikUnfPX71w0AxdvBjbThXJEJYexBhRQNh1SYslRBhfTytzczKyrIZ1TRVRQAFSqXHwpB7H1o46PnFsmx8y9/rMRppgzNReoNrERZhMoZRrGoe1v21viM+snkeflo9OfDK+d8nIG1rAt6OWFGlbZEFz6otKg/v7/yDmu+LGvFFrhzLb9+ap2dShvIZNQgL/eOvDnuw3SPv5gLF2JywTiHCChYgLAoRFg2EZYawsjKeC/znr31rUXp7cbzaSEvwnjvh3aMrXUUQVqRi4iqZib4G8wmL5KnA08s/ceSrO+2iIe5e+0rglQsHJ1D6iglI2wpgJ4fiHRuIg/64UqXaq1R5HvPyDjrWI26xLHxEv238X/uy2zd+5RMWo1CtemjYikSgGNvi3Y3nvkck1QsIywrCypjdvX1R4Y0MyqBvVzXfgC5QqTznvpx6fKGrCsTy97pPqKgoxcQVUJOwCIkxii0twnsk9hk+3y4a49710wKvX9JOMCDiQoIYUE1YRtJiNa/qz/Mo5CqUKvSpysVmJf5NofQ61u6xTxxmeu9bHXcKFVQw/7AKP6xlxc4FLcuGmJeVPRMxwwwhwkKmeZ8pT4Tsdka6ZDvTHRWMHn0YFr3RFZGV7gdErcaGjRrN3OCwLguH/m9ZvisLRMKMXz79fsVLyy/nHFxMGSoH8H83GPQDzp/df2D9J0/Ex0/aZnMtJzpuHj6J6B0cNn72xBiDvgzvpdVO5PZg1LEFI3Kj9MZDg5FWRinwHLO5qJ42O6x3pRXfoXJ5iX/9Vn7uPJSOeKAZG7Y/hsqt1MswXTIuM0JWN3/Ei24ZmtnXsHHL1lPePznX1cmKxWNjPst/9o3f47181I9RglsbG4KLi64fWDkvaow90/HUS9tWDHlZ081PHdqaZlR41E3afC2acWg9+ATcI6xRI3L/PStpINCM7aBSMKY01lAwCfkq6dQHOldWlO3E3z08fF6YPO/4d+4sINuXJQVevfDHYqRBDKzSJmpOg0Cm2cqx0w+84Kj07Fo1pn1lxe3eNGXojUwAFJhA48EW2BRUVPm8VB6+8R2e+Myh9bJ39XDUgVG9uCYhXTVkmO/r36xbh8fmOcw0/G1jYm+yVB5FX92kqq17v6DQow/0TnbZzvW9jdm3RUzCOcgknA2ExRbUROMJHUfwwuIWLSPjRkxck0/VEyx77+EJlRXl7/MJq0pNZ/Y1ad457tExixxeHgc3TwnRVxSFULQ+hKEMIdiH1XnQ4nccnY5fMp/rXVFe9IMAYeHGdCzornaP2IokDn03NaS8tCCksvJ2b9ROQlA0IchWDzHO+6uun+o1W9WExXCWeVW5XOl9yITOpRWqvQEN7t18f69p+S5CWFcRSQUCYZknrN3oI2vagnOf10d1fM2Hj3Qoua3DmkQgl7DI92NNgyMfeWT0Z3n11VzZt2ZEJj5LVoCw8OexoMZtEWlNq3P5/JI5rrd/g3uPtes3s8a7Dnz7XG+WqPT68g6oDaF60kehpoT3bwvmE1YNjZmi8mlG+V1g49avturxmqzrMDUrewdKeC8BwlqGCCsBCKuKrCajj93TP8k+Uqk3eNbXRvn9svFBVy4c/pGmDe15hIU/j/kFNIsb8tLGejkydnDzpJCSW1d/RyQQWJuwjH/nq1S+cZ0Hfr7X0Wn7Y9srIWUlut6UoXwQaloDBRfNs6OcFLNPofR+u9OARXtlSliZKKEDBQhrDyKsaCAsHvR642x3mqqn2L58fNC1i9ivZRjIIyyMfG+fho/ET9p2tD6Wzc+ZCYP0lSXrRAjLeBgo0mRWGjWZ7q86RZM5tTctqOC/MwORFvZG1YThmoTFgqFVCyOf/PJVuZVx2qbs1/UU/ToQlnTCUtVnwmKx9N2HvjQY9GPo2lvh5N/VrH2rx5/JqJfm4f51o9+gDJWvixEWVU1cihUqlf+n7R/7yGnk/vvGZ1/WGyreoPE5mzzCqtqJQvlqxKAvP5UZYb0hN8KS+yEUBgpAJcw48DxDMysEfgr89/KxHduXJQbVx3LpGb/ybVq4XGoKESL7ivKC3//YNv4NZ6W161Nff6ryCIjFPkjhzrnigyPbJ3WQU/kqETHJrc6BsFwEzyDSEmmc7eszafWIX/U8zXi84AppjRiw8Kh/w/tFSauirPADFyl2p8maKxAWBBKemX7gOWTuCJLWjasnvqyv5dJ92NJlSpVvF/R9rxlVy+lpfTBqhg6l9TmRBPb+Y9vL7SnZHKzK5IiUZAcgLNCwpGlaRtKqrWnhCacr53X/qr6WS7fB6UcfHrYyRqH0jqUpI6nXmOuEyuxTpYf/cnloWp8dpWnF24KmYUXxRLmU6cQnQmQ3Ci1rwmIYGghLAOrG97+CPmqZFQa9fszqD3qPrc9l0/XJjD3dhix7rutTyxorlH5dGERgCoV3rHdA6NvtYj+QTQNUeQQs55MqUQIHgYSLQ9ajhMYeR29QQjXVxqaMkUF5//1ziCKHzdJ09ZB5vkrl02/E1J+OQinJG9rvxneorLx96M5utFXLfBiFR0znAV/IwuH93qZ/zjI0FcIbJaSmPBHilNF7Rva1Shu3B6Ag1AxPJn2Tp1J5DxXopQPLy29//d2Xo4KgnOQdIgalC5qGBkNFlGzSSVE5YBJaxFcQxMKoabuPMgwzVcD1175Al/MmlJH8g7dfs0/4nQ6yeqLkw1eCyAfCAse7VRg7/dflDE1/KuDPennNh307QAnJG+1i5+bRNMMbDDDIvd6OAGEBYVlPWjMOTBWa21NRdns+lI78oVD6fsw366FUXNUkhPlXkoJC6TGutqpu6L1qXq9BUD7yDp0HLszhdzjazYm9ZZI+ICyA7TF62t6jNKN4i39dr6/4OuvzYUFQQrLvmbOgENyHsMAslIAxKb9g04I/2zuwqODym1A6Mm+ItHKPTJPWUeBaDhAWwCbw9Ap4tpZpaDBMXP1BVBSUjnwROfjLPTWrTB8qk6QFAmGBhmU3DJ/yYw5N0x/XMg0ryr7e9HkcmIbytgv33hF4fYizU/P597mykxeXICxwvFsWxqT8Ogd98pehhBQWXP4aykfGgeZoLgbDk85OT15xRXuRJgkaFsDGJM8oxgkoqoNWz+v5DJSObMElgg7aTc9HuUA6gbDALKw7Rif/vAfRVq1DTg0G/UdrP+zTEUpIjpYEncOrq1lObXAGKhoIC+AwKD28pwhcDqysLN3w7cJB4M+SG2EpPPkjhVGHN78gOy1ryhMhQFgS/VgACzDylZ3YAS+0B1RIafF/O6GEHA/tlolBv21IiPp94zhj+GPrpOqOI2Lg55gIeKOFlUuOfT/VKZ2LQXhKg1O36IGtW9wcnt4NpiBywg5c/vB0h9Xv91zy9Gv7x0Ep2Qe/Zo6NMtCGaNTyO9K0cZfOEPbUHBZlpTrq9w1Gt+JRmmH2oN82IaroyKmvkPLS/CXo8yknZEFWUxqMRSf3/bB4jF+1YRDAIqxM6z4JddXzjae1UDVPk8YLb0e+tg9Iy0b4ed3oJ1HJDkbSijoJOtDUuYR3rIea+2FVP8M5IYlmFM92Hrh4mSPzMvfbczcFTn6e88qA0NlgEgLshtHJxhnwe4Q7Af3YNe/3WgKlVAdNav2zofvXjpq1f+3TN5ECsAGV6ljK/ALmfFInbDBtahkMg0HDcjGTEPxYdeiZlB7j9JXlfwgJoQE1sDXv99Qh83AKlJR07Fs7JpQyVOCRvGdMbR5FgHeAzaJpxR5a4Xmk2+D0WmdJHvruf0GGytJog1E7o3jTTwyDHCn/b60/25ERztMRp3KAK5mEd3gLYA1Wzes52GDQb+CahBTNMUpoatnTr4JPyxz2rxsXpK+8/REmFbraZqOrxZPhHHSL/lzKMMqPHx661CLN5NDmxFCDoXIwTRnwKGEQMgmXRQxcvNSBhBWNCGsnuy0yaxK+NjDUqe3PFQkLSKsOWJnW/SMke5NECAsDSMsE9q4ZiUl/CSKqwCqeEiSsXHR9DqPwznpoyGKXPJV7TubZyQqGns8jrD2IsKKdaimACNYvjE7+BZt9m0zc8syaD3rtyvzkMZinxcPu1cNnYQ2VEvdPYb/UHIXSu1P3uJVLXZWsqtwEgnk84ux0wbSGegilyndcRXnxLkr8QMyoirJbf6z9qM9Tw6fsOlLfy2v36pEdKUPlEqRFmdq6GB8oMa5n/Ap3KS8hTWq3sxPlqhoWON/rgOFTduQpVT59qCpHsBhCDPqKXd/Mj55cX8tp39qxQbtWxs9CZHWYMn3a8R6kVfVxI7IS5W5nJ8BVfVhVzgJAnbD2o9igigqsadEdavrh2XlB5CJNb0IEN27Yy9vz6kvZIKJKQP3iLJT5kDvuKZq687V67tTHvUascbvR1dmZZ/VK5s5ZhAqaPjrtyZZOX4MKPqx6r2n5mtO0MJ5EJuQ/az/qO9jdywQRVfTOFXF/oI4cb8Vjak+qfJpmhrgjWb2VeTZU4LIstnB2ZcICs9AWpDX5RynmIUagwVC5Ye386F2ZH8eGuls5IJJK2LliGCIq/U4z5p/RBKQZVadeI1a75T7seoNBtoTlyiYhmIU2xuoPeuIZ788ImIScAq/+bRmj8JgzbOKPOa5LUsND9fqKZ1CWEmiu6cfLP88knBP19No57iwHs9b+PRmZgvM5JmH+9MFhshg1BpMQUA08/wqJ51SJtz+j15dnZy7os+TbTx91KY1Ls2xowo5lQzZWovTj9mnG9GOBRwE7uztZEdMlRI7alTtoWKBl2QHfzO/T0aCv2IgUihATGhbHCW38dxPDMB8PnajZLbf8/LRiZJC+snQwZTBEoaQOpsikz+r80DUXGvM0rHyaYeZEP/3NgvpS/2+u/XsXw9BRHA3rKaRhgUkIhCVf4ImjleW38CjZJImExTbwXHzGHkMrlg15+UenDPNrlg0PqtSXRVMGPfZFDTaOgtJ3yKlWfsQJC5m9qjlRI1fn1Ke6R4SlQ4QVSAgrd+ZTYbLRoN2BsAD21LY+7B2NWu5S1mySQFjVXQiDyatq7s5u9OORIS/vsDmBbVs8EO81hf0r0Shi/B03rg50jYW7VWRkAWHh3RNm9x2Tubu+1ffr35wJYmgaExZFCOtjRFiymYsHhAWQaCZGzUYfk2mKXUMnibA4klZ9z1H0bx65c3fNvaGMX46gjzzy5mim5lo9TEwdCRmFos8Qqgb/cPaPso6wCFGt311f6xkRFi7zXRzCaokIKwcIC+CKpBWERHiykbhoKtBKwrpzP7nAN8VYAjG+o9bi4hqTNikbEdYe9Dm739j6S1QcwpqNynwWIaw9rw8Nj5ZT+mAtIUAyRkzdgzWj2WvnR2MH9GQSAl00O3ihMnYkL4gZ++0RqN1qcGezL5Vb4kDDAtQJmQv6JCAxQoGKchEN6yj6AxNuVuwzG/KgBmtpWDmozEOQhpU7O+7eUCAsgJsSV99QmjaOyCVQVQcuyImwjqI/l6Jfs2LHbcyB2hLGjDXY4U7pcJkjwpqDCGu23NLoFiah9/RdcegjDIVU3k8puC3dfq9PNoijfRE3eScmAqy5LFj/ST/sHMfrDqOJidHBwcnBy4x2s+HRZ7NAk5KGaI65LMt5Zy6tYSGiiiEkFWHm1hREWmkgj87Bhk9igpDKg4mLTDswfg+iMZFZr2HhXT1zyE+YmBAp0Ucef37zbihxqzWsBUjDmoTKfM5bw++bLcc0uixhIbJKRx+JnEtaFNIQMWWi39ToO/49jvN7EvotA8RSfti06NGgKk1MlLByBozfVq9NOY4VgZGMApbxcFtaD4iwjiDCCkVlHooIS5ZaqcsRFiGjHTytSoMqLlbg3nOcStaRCtYBRQBckLC4smzsoJEsR9rq/Smr/6qaMEpTU94Z0Uq2y5AYF6s0XGGHeGSFNat4kUe4GpWap5EBAHa1AFBI5vydiEMdXB9hJmTbFsA+x1w5kxWG0oUEABPOOl7FYW0p3oTWxFeXI6ApARwkq9iEU6Pv3IGgWCtfmcz7W2MH9wYmrAS5l60raVjpAoSTZsaG1wFhAZyAOKLRm+tApWpXMbx3JNkyscmr/sI+xLx3R7baDYRlmx4rkarpQDdWnISRPzW0HYCTCIsSkFdrHOSpPLKKt8M0HaxZucRhI7InLKJepwr8JGWaQhi0HYCD5TWOpxFZIq/8dyVzrALsq41FZKW1ZXqnrTyNp5jkpT59v0vMVXMFDStVQFPKlmjDx9RVJQcALAGeVkNVTVjmuiMsnlJDBphY31UGHhG0tWb16opTxgm+aaPuX+oq5StrpzupNKGRlQyJz/IJSwtNCuAA0kqzRqPigZX7eEKCNscHY1obF7O7UtnKfZQwWeR6ppXPAmEBXIX0UoimBuBAthNHie/qnIA5KDhJVMCPsI53WYeeawBVDgC4LuSsYYkNDWsETL9U4ifQkRHFdIHnYC0hAACEZTfEiFzXCBCbMSCyEnuXVsriZ6LVJZK4ufFjB2qauXcQslSTZ/HAQJKA5seO/GgpC4aoybNsYNOUwnXmkjk7+P2ZQk5e8o50ksZaC8IJ+Z8jaQ+XkFf+iJjkRea2yI+Ed2rJO/mdHLsOVZJ/CN0fQd7JdTNkkHfrRJ6JIfUcQ0y8WAvkL46qOWewVtk4Wv6AsKwjLJ3AsK65uVbG2fAShCWVEveZGadWoHt0IkQg9Gwk7551VM35ORGEPGIlCDF/ITebpnTSmDI5gk4J5VfATE4U0DpTOY3RVOMVmsRLkTKKMdU4bZUfAaJNF5AZ/K4d6Hc8wqYlZYDzGEZkSQpZ8RfZc8svhrxbx7l/h0A6Umwgf+lE/jIdKX9ygyynNRChlTpT2FSvg++PNdWLYGFH4RCvwnFDxv6ucF6cYSZ6RUFixb+T9wtNJowhz5tqiId4Wgg2fWmSNh2JewdXqxDp9VMlaidCWiy3XtiF5xpSRg14ZRRD3mXv/HA1mXMcksDlHkneyRJFOmmw3KVdGnMdBSGfRPLOcPJOLU8eEnmyECPBKjArf5wycZr8AWHV3RysNcpHyCiSJxSsCh1uaqIdaUD8nR9wA2JV/XWU+cmnMQLkmsERph2U6SVBahOaCDd+HSHfDE6+06Q0Dt7WJLXKkqOhsAShNVFWamJu4LToSDllCGg2dssPzwTawctT9eRKYp5qSXrizMkSD+tI3ep4plOmgEuCq3UJuSO0FsgfjiuFIztOkT8wCS2D2oTGRAmQltZK1ZZPSBlsA+LNMuYSIWVCYPmNYR1lfv2imPbAN7vSBARfJ7GMIsTSyCMioQbJLSv2HmvWstkyP1zTlOJ1NjqJ5asxY57FcNKZLeF9YuWssVD+2PJPpqSt1LCX/IGGZQHsvqSGCGWtxdScnilZopNUSGA0HKHXEtU+TcQnpxPRHLjvFVs3qZaihYoIbSYhZf4+S0IaWo0lInwntkA6su2ZH462RvEau9R5djoTWk8Mp+6FtEdT2kycxPqQIn+J5sjFXvIHhGU7DctWZBUmQEjcvd9jJPrQYkQENJG8X8vxoYVJNN+E1k5mWEDs2RLL85xAPNn8hixA3hozPhQdV0uzU35SBe5Ns0CWTGk93LRqTDToTOLXyjDjxtDYUP609pY/MAnliWQzlRcm0YcWYULo2ZX1OjPCxUeiWC8uQXPKFmlgmZS0rXUyJaRHK5BXtQmzzKb5EVmupTExsBJmgdbDn06gFSHQSAENTdAcFKmPZDNlHybRJWIP+QMNy4YaVp01L1NqtAQzQoqGxQpRtaOWNASpPT2/MWpFzEa1gMAKCiAxvzQ8wccjaPFWpCebk4Z1vN+F5jXZOj/mGjvfz2WJhpVoLn6cPxFz0pLRQXPyJ6hdCZSbPeQPNCwroLOjb0tI3dZJmECnkdDAWKTwhDpGRAC1Ag0sTKJQxUg0n7iNOobiTO4kw/bcMtBISA/r00rmlKOGaFbZ9syPCd9OpgXEoBMZBRWakiB1Uq+YLIiN2KrN+JJ05rQhe8gfEJb1yLZAqC2FFD9JtpX+A6MvRcChHCexkcVYQN4RUsuNs3wpm7rjJObP5tdITM8hXpmkmZiAaev8xEjUPKRqMraSrTCpxCjRRHWW/AFh2Ziw8CS4iDr2DGESGpGGXFObEHSx96RJ6FHFGo6UtJnSNMTKhZ2SwPUvJUt4VswETyH+Ga0NytqS/FhC0nGW+K/qqL1H1DEenQTZyHSA/IEPy0qYKsy6nnyTaE7oSaPmCkh2HZysERLNwRgRIVSL5MHsKCYWVuJniuBqQiJ7hWkkaihGk9IcWdkjPyL+q2wL5SRbIK2JImkNq4NMaUVMabOEJTAZV6r/qk7yR+QCCMtSkMIUFURrC5YIjEZiI0rjCFKmRP+BVc5Yzvo6s723yJA4S6o6nv+IXbOnJfsrmfTtSPFfURJGG8mz6+yQH6n1HEdJXC1BZEJMC5GS1zCR+3QCabKks00T065InGEOkj8gLIkwtUYw1QqyijHxnFqANLM5FZvIro8jDeeQlJ7SAmJjZzwLzqRnz7PjrOUzOUeHCDRrBgot/o4wVQac2e+Cvh4J6x+5cdsyP1IJMJ3ErTMjE4kcmdBZqs1zlr5IIfB0E/GESZC/GI4c77CT/AFh1ZGwxLSsON55b5b0+JJ6Us6WIlryzDp0zcAhK40EcyPCXC9PdgOIMZPfdF7cmWJx8wgVz/5uIHE6RiKvQZiaWpJqgqx2cNJo6/xoRAhUKO0pIuQQw9Gs0jkajCCRcA9DFciryXQJpEmsjiNEOtgYcr+xXEmZmVpfWCf5c4WtZmRLWMQcMLUtRzLxz0gxDw4RgYmlhGdEq9kejNuoONpJLKeSTZ00rZPoAwkjq+jZeUwasneRlMEEsTLJJo2LzWsafz8kc34kXoMw7npgwixfxzXNOXGHkfzE2zo/Jt6Xzks7u3+WzsS9qRyfXIaJd6eSU5zVvLye45CVToRIDRyySuMsxpYif6nkvZFE3vjyp7GD/Mkesp7pjp3EqFBTTJhyWNO6SYSZu7SBFSq2l2JX3GuI4OkEGi0WSuMyBo6jOoW8M5uqvb9QogSBEQN/h4F4jm9BZ0K7MTq8yXYhlADBsmlIquPBBRpSXngHV42IRia2aSJ3C2ub5oe3zo8yoWUkcb6b8kNVz0kj7xdbwpJISFowrxK0/QyOD1EjQf7YHRbiOQNAmQ6QPzAJbUBaaWY0LdZEOYd7NDaQazFEQCLZSZFEANJE/AjnyLNxlPkdRqUIh1YCMcSyzmUTaeM2bnMTBhtIICtT6dKwW8eY0YCEkMndvM/W+SF1qDVTJ9zlKFopZCVB2xMjIS4xm7ovSUKZcOUvhjI9v80u8geEZVvSiqUsW/vEbgFbawM/gaUqfKTxRtWsEhgy2qkxEUctYSFpS+LlI5bTuFJFSIaWuj2xGRKJFciDlB44iZiBlJ3zk2SiPvgHjYr5pgS3ciYEkSSh3uN5JKQRqWdBs1zO8id3yPbUHBM+KXav7GQBtZoVHCmTGoWWmGSSHlEj4dlUjq9HY2K7EnYrFNasyqAs2wqFO/QvNmpl8dl1vMM6zKZJZF/zbM6zOkflR2Cb5jTSAHUi8sKOWmrIfeZ2G41gzUC+bIl1CrxtmqXG4xLyB4QFsIRYuHuKZ3PMB25PG+4qPaW75QcAJiGAqp55fI66s6d4PDnJRuicRh3kB1AfoIQikK3Zu4PjG8rgmCpS95aC/ACAsAB2b9zsrG4hJ3Kt7U+k+DsgPwAgLIC9wDph4wUco/w1gGmQH0B9Aviw5AfciDX8UTJiPnHnK2mknIYM+QEAYQHsZT6piTYitKaLPwUgBfIDAMICOA2c0TG1gDbCbeAprjCPxt3yA3A+wIflGE2D3f0yVUCryOTNxMcNF6/Ri+Osn+PuVZRmwYx2OcDd8gNwImDiqH2Jit2Dy9xGcNyDITC5rTN3n4uRtdvkBwAmobuSFdYidnDIip0sSaPPBlTN1fep7Op74pzGa/K4Whd2Rke6YuN2t/wAQMNyN6JS84gKQ8NfVEzu5R4TD0tSAADQsBxKVuwulPzTg8V2O+AO44udHFNnTY+7aybW5ET2UnKaJirn9AHkBXC621az4u+Nzd+fiQ+pW9rWJU3GAxZ4m8zFyqjMZJs+ABCWOyNdgHDSzOyTLeVIprpA7DQYu+/dTaYusEd9hQmZxM5MHwAIqz5rV4lU7WUm2RKcymo7J03oOK9sex42QLaX5sebIpf0AVwb4MOyjVkjtGumlBGwMDumS+xsvjQ7l4Wk4+GdkT4AEBagiqzUAlqClHVxMfYyhch0Av5RV0l2Xq8nREA6oVnsTkofAEzCeq1dYQ1JaEQrQ+Kz/AZu0+UpxCR1pMYSIUW7cmL6AKBh1WuIHTmVaeWzrr6eLsYN8wQAwnIL7UrUX2POaUz8N4kCplOmi5eHRRoWAAAmoeMgNiSvETD9sJ8riRxMyj2thgtXN40k+68AACAseTRQIY0ijhI/JbnabBKaAkE0sXRCjLUWChMyxMt7ssmBDkKaD3ssmjG9IvOhKIH3stpjKklfpJnHhLQrNTkY1EjIQmftWZm+OE65smZnCn97Zc4JPeaODUskZRxDyjJJIL5kkk52TaikARJbpxUIC2BvjcLcXCvjbHgRQefucpAooIWx0ykyBJ7fIZDGFAkNjHtgBAtTjf0QJW3Cq66u6eOd/ccnyx3od7ygWkvKjj23T9TUJrPr+b7ESN49/Hll7JmIsY5MK6AK4MOyzl8TQUmfoW1qxBDfHyvSW6dK7LmFzFC1CKFK8SfFmSMbCZqVoBZZl/QRIj3HeQ6/L5LsfsESXTohGO4SKY3I+4TWblZ3OPh3QsZC5RFDnndIWgFAWPYyB4XmG2WTXlvDIwBsFoQL+Xg4G/6JNXi292bNSf47EkXMTq0ZEhQbSDBF3JSlhGVp+ojJtoP3ruoTeIiprCXkGWeuTjh1KHjEmMiOG5QUzdlOaQWASVgnqE1oTJQAaWkpyxb0Rog1eEJWO6iax5tLeV5K750okjexhmtqpj7eSTXegvxpTJAif5AiSWBBuZgWqLFAk2QJY50EzVHnwLQCQMOqE8Ls/H6hxpJJtmE5x4tfI1FLkqJdic0rixMygbC/hZg5OqnxWZI+zg4YNbQgC0YedSIarOiUFOLXiiHpwQMZaSLv1TkirQAgLHtqWPZ8PyYqvl8rW0DIpY5eimlXaSLpSTWhAQmlN8NCc1oofakCnUOaBWWmsSANWlIGyRwzLlukc3JkWgFAWLJHZh3uEzS3TO1kypkrlk2mHgg1nkRynyTTykR8ktInsuzJ1KTcMAu0SjFzL5WY9dw9zMzO3rdzWgFAWHbTsGyieRHHLJc0sOBjIomX0CtbMzrI+l2SzGgGcTaIT+r9yVKJ3ISWZ4mGxZJY9RwrMvgh5b32TCsACKvO0FnQc9ZVy2JHE9N4vbhOYPKhxctjyKgWbsBp7PvIp8acZmIiPrHGKil9IlMOTGmeglMxTPivxDQs/vmIMSLao9YRaQUAYdkK2Rb6ZywC10Sj7gy1x/Der5FImDoT0wW48aRJ8L+EScivqcYnNX0xFpqZkvbgMlNHQucjxkkgInumFQCEZVfCUls4N0kM66g7y3F0ImaHVqJvRishnlr7zotoWToJBGRqyYrU9EVIfa/InDVT+Q4T0ZjTBN4rxXSzZ1oBQFg2gakesU4nvpCjvyJIj5/J0YRiJKQhUUpjwNMjyPA9G49Yg8kw8y7Jjc/EtAmh+5MtIMJEqZ0KZ81grfoU0IgizJmDJuK3VVoBQFh1BxFaUaEUGU2TQlbJhAS0vIXCZpfLEM0uQsJ97NY2yQLxmCNmKYSVbUKbC5OYPqnlFUdJXHVAylZMa9JKNB2FfG1qO6YVAIRlM5haI5hqBVnFcJ6Ll9DbqznPsrPfzcXBnYltXMdoiRkscWGuWiDeHZQE/57ITHHBMuAsT9JRptc6stpKqhmTkE9EUszXdXZOKwAIy6aEJaZNxPHO2ZPSUFnhF1oMHSNmXnB2V1BTJqY58O7LICOPOnJwqUHE98bt5VMkZieRfReOkywgjiENVWr6hBDDmkm8e1NESCCGo62wJJgp0SSLMKcJke1gYsTyZMe01mvAUfV18zfFmehljUJnYj2d0Dti+VMVyD1SKok1U82ZEtX7UvG2ksng7gNFtIxDRCMRzIfIkV5iiCUkazZ9JvxYguUrcYsb435iItpeJG+qgtgmi7GknNNJPjTkb7ukFVoYaFi29mVlmtE8sKZ1kzi5w/h+CtJ41pFeV5CsJEJDGpO5TeUyOGSl5jXKREJgLJGxZKU1QbpSR7fYvElNn5RywO9KEtGQLCUAncR84Pq6SchKS0x3R6cVCAtQJ9JKM0Na7Dq8c8T0MhCNKZVjUkSaIStTxIBHuGLJKJfGDBkk8cw9vj9nB0nbDpaszPi5zJktfCKWlD5yv9bMe7lTMbQWEIAUcjJHxBqSL52d0woAwrIbacVSls2nYbfajZWw3W6aCQGP5aRDbIZ6Gn/bX3JfthkCiTS1BpGkO8VE/mpojRamL8kMCWp5xKmTSAA6CfWpNUGuaZwOwt5pBQBh2Y20NGTf81hK3LmqIb9FEjLIlPjuTF6jyCDvEBLwJE5jYzWBFBGyiaSEZ7hHChCIKbJO4pk/KSR/2jqkT0vSp+WlrdamhyQv8ZwyZ9+bJkIimZx6oEU6DL65x5a5I9MK4AGc7gAAADQsAAAAAMICAABAWAAAAACEBQAAAEBYAAAACAsAAACAsAAAAAAICwAAAGEBAAAAEBYAAAAAYQEAACAsAAAAAMICAAAAICwAAACEBQAAnI8fPmp/DoV6uS+UUgaFj7cKDnt0yrF49B3vI56BvmewFUN+o11MoHA+KJTuSCfFLybM2ShN4dDkLSMHqmqba+5pPngTPrwJYBoqT52N42PPjYwgcbJbX6eguLLlJLPkGZwm3F7XkTRmuLuGZTx9BGU+hlSSph42ihgUkm38WvaQBG5IAgqyGGGENLhlqCGkgjWdCBvKQTp151CSFBIfu8NpjNxkltNe2TKw+9FkSidnOpEIBM50KtEAsl1dwq3QrNJJOdhym1w1SgecbWe7Os3kyS6rVexA38PrqmkRskokWgpfDjJkKLMRpL1moLTjQ0s0ttY25ahhGY9LIiQVUx+1K4DLEpiWdDBqQjR11VYSiTvEVfZ2j+FoVBGUgw5+dbYPCxOUDlVYGOlFMiVULntsVhwRFi3xJWTy7mFP5lUTOzsJ3aMR84uZuI4FKZm6cyRWdXzEV5RG3o/vyUTXU4TeRXx17NFaWnJvGtffxPkez+aHmIpxRChYf0aSDXp0c2WEEcu5h+L4UrS8d5lMI+d98eR9WPsL59RlDCmXbLYMefXCPsveK3ZfmAi50FLisoK0Mki9JnK1YyvqLM4WmpSUeKXKrITywu/OIG03zVHavFMJi9ebSBUc/rHfuILSUcFlcxoS28jYiomhLDuCi6+mZ5J36TiVxxU2NblHa0KQksk7tLx3xJPfIsh3Vhi48aeREEbuxWZIrBnS0hEHbg2/FsfkllJGh0gjyuDFHcm+x1QaqaqTZKrTQ67xz/FTc8oWl0EyeiclQCTrOGmJI/fpODKURNV0jEdwytzSuCyBjkuUFpSHkHmlrQNZWSIrZmXWXHlxyl1nY1eGrDUsa3oQXHCRbOWia7gBnCOVE8+pkGxOoWZaEVccR0035awO42pEIkgkBJ0i5BshvTTF0xLZ+NN4mkQ2abzpnPyKNYJ1vGvcQ1/NlVEY35/CiRunN55jygimEdcX5/kI/n2kEXHzkEneGcfrwPhljO9jT2BOI+/ScOIPI+WjZeOzIC5bmHZSyqMWYYnIoKgfrQ6yYlZmHVFebk9YbCPDBU6EkkU2VXMUBVdEHCGCDCsd+TES1XStBHUYvyMVpWcdSY9GYl5rxU8ITkvdGZkRg7kpDGbLiN+4BOJm05gtoM1RHA1O1HlM6jGZY3qINaBMAc1GrAzWcUxai+OyQsPKtrI8zIHf4dA2khUpMmuv8qpXhBUhUpF8JBEhSiRqbAbRFnSWEpYENV0txfTFqjRJzw4iRPFmiDSCPJstEmddBcjaMuLGHcMxL8W0T245ZPMaRAQxldi5PNkc87guplEEKV+dneMK4zmcLSoPLoEI/cbxJ50zU9+WyopaQt5sXl71kbCwAOrMTX4kgoodiWnEfEmk7sxtkQot0eQi6uJb4GkracSsTSWkGykh/jABQdRZ45OzURlxNYpsqm4Te9NJfUZyGkpqHQgkkWMaZdozLq6pzyEsa8vDqAVhrcxK57U9ZMUe5VVnyHZpDhmlwIFrPmlIxcRIbZQc/1Mc5x0U9x2cuPhCwBVKm4AQV7aEnkowfmJq2GyCrUgZcQlAKO5MXllaO+nVlpMuwwjxakWc6BE2lk/Wb8Q1r6wtD3YAKZXn6rCEsGwtKxFy5AWlzEgqjmeXq6mazuAUonanExMmm6Nqa1nfEDuRjefbyuAIVSIRjgxORdcgEWLG4fcmEkLTUHdGhLQS/VBcMyWb7YFJyOT5k5JJD4aFT8OJP5mYk6zZkEy+m/OF6ET8KMYJfmbKiEUySQM37mzqjqM7jcSRSkyITI7JEWFmsIKtC3aWfzanzq0B6ybIEHFW1yUublmyZmAcKZdYnsxYXB6kPmKJCXYIfc/kkIxUl0NdZMXedeO2GlYYEbx15HsSd20SUXfDSSUkU3dGQBJ5PS3F+T2C4ox2EeFNIYXPPpsh1AsRAWOHiNllE4mUwIiOBL9PIuf5DKrmMpk0En8yiSeCF38c79lYCb6mCE5ZckOMuTLi+bliyD3JJI2R3LiJyZDCq7tkogmbE/B46s4qB5asLZ6LxNEk1Jx64oa6xJXNK8tEEg8ur0h+PVhbHsTtEE7SxI0vlSMjpkirLrJit7qxNWiDoV4u+gaYJgCXXHQOcH/A9jIAAAAICwAAAICwAABAvQX4sAAAAGhYAAAAAIQFAACAsAAAAAAICwAAAICwAAAAEBYAAAAAYQEAAAAQFgAAAMICAAAAICwAAAAAwgIAAEBYAAAAAIQFAAAAQFgAAAAICwAAAICwAAAAAAgLAAAAYQEAAAAQFgAAAABhAQAAICwAAABwHP4vwAAZy1AN0uh2oQAAAABJRU5ErkJggg=='
                var vm=this;

                // var columns = [
                //
                //     {title:"id" , datakey:"id"},
                //     {title:"Nombre" , datakey:"nombre"},
                //     {title:"Télefono" , datakey:"telefono"},
                //     {title:"Correo" , datakey:"correo"},
                //     {title:"Comentario" , datakey:"comentario"},
                //
                // ];




                doc.addImage(images,'PNG',15,30,150,150);
                doc.setFont("arial");


                doc.setFontSize(20);
                doc.text(300,125,"Registro de predicas");


                doc.autoTable({html: '#basic-table',startY: 200,
                    styles: {
                        cellPadding: 1,
                        fontSize: 8,

                    },

                    tableWidth: 'auto',
                    margin: {right:5,left:5},


                    headStyles: {fillColor:[116, 164, 196]},


                });






                // doc.autoTable({html: '#grid_contacto'});
                doc.save('predicas.pdf');



            },
        }




    }
</script>

<style scoped>

    .images04{

        width: 100%;
        height: 800px;
        padding-top: 60px;

    }

    .emp{

        font-size: 21px;
        font-weight: bold;
        padding: 1px;
        padding-left: 10px;
        text-decoration: underline;

    }

    .empeor{
        font-size: 18px;
        font-weight: normal;
        padding: 1px;
        padding-left: 10px;


    }


    .images07{

        width: 100%;
        height: 300px;
    }

    @media screen and (max-width: 1264px) and (min-width: 961px){
        .images04{

            width: 100%;
            height: 800px;
            padding-top: 60px;

        }

        .images07{

            width: 100%;
            height: 300px;
        }

    }

    @media screen and (max-width: 960px) and (min-width: 601px){

        .images04{

            width: 100%;
            height: 800px;
            padding-top: 60px;

        }

        .images07{

            width: 100%;
            height: 200px;
        }



    }

    @media screen and (max-width: 600px){

        .images04{

            width: 100%;
            height: 800px;
            padding-top: 60px;

        }

        .images07{

            width: 100%;
            height: 150px;
        }


    }

</style>
