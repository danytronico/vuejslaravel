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
                                <v-card-title class="emp">Registros de Eventos</v-card-title>



                            </v-flex>

                            <v-flex xs12 sm5 md5>

                                <v-btn color="rgb(63, 81, 181)" style="font-size: 10px" dark @click="dialog2 = true">Agregar evento
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
                            <v-card-title class="emp">Datos del evento</v-card-title>



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

                    <v-card-title class="emp">Imagenes</v-card-title>


                    <v-carousel
                            class="slider" hide-delimiters height="auto">
                        <v-carousel-item
                                v-for="(item,i) in lista.imagen2"
                                :key="i"
                        >

                            <img :src="'data:image/jpeg;base64,'+item.eveimages"   class="images07">

                        </v-carousel-item>



                    </v-carousel>


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
                        <v-card-title class="emp">Formulario para crear los eventos</v-card-title>



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
                                    label="Titulo del evento"
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
                                    label="Descripcion del evento"
                                    v-model="form.descripcion"
                                    :rules="apeRules"
                                    class="forms"



                            ></v-textarea>




                        </v-flex>


                    </v-layout>



                    <v-layout row wrap justify-space-around>
                        <v-flex xs10 sm5 md5>
                            <v-card-text class="empeor">
                                Imagen Principal
                                </v-card-text>

                            <input type="file" ref="files" class="forms"
                                   @change="handleFileUpload">




                        </v-flex>


                        <v-flex xs10 sm5 md5>
                            <v-card-text class="empeor">
                                Imagenes
                            </v-card-text>
                            <input type="file" ref="files5" multiple class="forms"
                                   @change="handleFileUpload5">




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



            </tr>
            </thead>
            <tbody>
            <tr v-for="li in list">
                <td align="right">{{li.id}}</td>
                <td align="right">{{li.created_at | formatDate}}</td>

                <td>{{li.titulo}}</td>
                <td>{{li.descripcion}}</td>





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

    const LinkComponent5 = Vue.extend({
        template: `<input type="file" ref="files2" multiple @change="invokeParentMethod()">`,
        data(){
            return{

                datosimagen2:[]


            }


        },
        methods: {
            invokeParentMethod() {

                for(let i=0;i<this.$refs.files2.files.length;i++){

                    this.datosimagen2.push(this.$refs.files2.files[i]);

                }


                bus.$emit('ocultar5',this.datosimagen2)

            }
        }

    });

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
        name: "vereventos",
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

                multiples:[],



                lista: {titulo:'',descripcion:'',tabla:'Eventos',imagen2:[
                        {
                            eveimages:'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'

                        }

                    ],

                    imagen:

                        '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'

                },


                form:
                    {titulo:'',descripcion:'',tabla:'Eventos',imagen:'',imagen2:[]}
                ,

                form2:{ imagen:''},

                form3:{ imagen2:[]},


                nameRules: [
                    v => !!v || 'El Titulo es requerido',
                    v => (v && v.length <= 90) || 'El titulo debe tener un maximo 90 caracteres'
                ],

                apeRules: [
                    v => !!v || 'La Descripcion es requerida',
                    v => (v && v.length <= 799) || 'La descripcion debe tener un maximo 799 caracteres'
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
                {headerName: 'Imagen', field: 'imagen', filter: "agTextColumnFilter",width:150,editable: false,
                    resizable: true,cellRendererFramework:LinkComponent4

                },

                {headerName: 'Imagenes', field: 'imagen2', filter: "agTextColumnFilter",width:150,editable: false,
                    resizable: true,cellRendererFramework:LinkComponent5

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

            bus.$on('ocultar5',(fiaz2) =>{

                this.imagenrecive2(fiaz2)


            });

            this.getmenber()

        },

        methods:{

            imagenrecive2(faiz2){

                for(let i=0;i<this.rowData.length;i++){

                    if(this.gridOptions.api.focusedCellController.focusedCellPosition.rowIndex === i){



                        let formData = new FormData();


                        this.form3.imagen2 = faiz2;



                        for( let i = 0; i < this.form3.imagen2.length; i++ ){
                            let file = this.form3.imagen2[i];

                            formData.append('imagen2[' + i + ']', file);
                        }



                        var _this = this;

                        let rowSelected = this.rowData[i].id;


                        let uri = `./api/evento/image2/${rowSelected}`;
                        this.axios.post(uri,formData,{


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
                                location.reload();


                                _this.valueDeterminate = 0;
                            },2000)

                        });


                        i=this.rowData.length;

                    }


                }



            },



            imagenrecive(faiz){

                for(let i=0;i<this.rowData.length;i++){

                    if(this.gridOptions.api.focusedCellController.focusedCellPosition.rowIndex === i){




                        this.rowData[i].imagen = faiz

                        this.form2.imagen = this.rowData[i].imagen;






                        var _this = this;

                        let rowSelected = this.rowData[i].id;

                        var logForm = this.toFormData(this.form2);

                        let uri = `./api/evento/image/${rowSelected}`;
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

                    let formData = new FormData();

                    formData.append('titulo', this.form.titulo);
                    formData.append('descripcion', this.form.descripcion);
                    formData.append('tabla', this.form.tabla);
                    formData.append('imagen', this.form.imagen);



                    /*
                      Iteate over any file sent over appending the files
                      to the form data.
                    */
                    for( let i = 0; i < this.form.imagen2.length; i++ ){
                        let file = this.form.imagen2[i];

                        formData.append('imagen2[' + i + ']', file);
                    }

                    var _this = this;

                    // var logForm = this.toFormData(this.form);
                    this.axios.post('./api/evento/create', formData , {
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

                this.axios.get('./api/evento',{


                    onUploadProgress(uploadEvent){

                        _this.ifvalue = true;

                        _this.valueDeterminate = Math.round((uploadEvent.loaded / uploadEvent.total)*100);
                    }
                })
                    .then(function (response) {

                        _this.ifvalue = false;

                        _this.valueDeterminate = 0;

                        _this.rowData = response.data.data;

                            _this.list = response.data.data;

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
                        let rowSelected4 = this.rowData[i].imagen;




                        this.lista.titulo = rowSelected2

                        this.lista.descripcion = rowSelected3
                        this.lista.imagen = rowSelected4


                        var _this = this;

                        let uri = `./api/evento/index3/${rowSelected}`;
                        this.axios.post(uri,rowSelected).then(response => {

                            if(response.data.length === 0){

                                _this.lista.imagen2.eveimages = '/9j/4AAQSkZJRgABAQEAZABkAAD/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wgARCAJYAyADASIAAhEBAxEB/8QAGwABAAIDAQEAAAAAAAAAAAAAAAUHAwQGAQL/xAAbAQEAAgMBAQAAAAAAAAAAAAAABAUCAwYBB//aAAwDAQACEAMQAAABtQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB8RxJ68R8ksiRLIkSyJEsiRLIkSyJEsiRLIkSyJEsiRLIkSyJEsiRNZ+e+joEbInoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGHJBjGAAAAAAAAAAAAAAADNhE9khJo9AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPCN0Pr5AAAAAAAAAAAAAAAAAElG5CeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA1tnTIkAAAAAAAAAAAAAAAAAAE7l1tkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAae5pkSAAAAAAAAAAAAAAAAAACZ2dbZAAAAAAAAAAAAAAAAAABhMupH4Tcw4RlYhlYhlYhlYhlYhlYhlYhlYhl+fgAAAAAAAAAAAAAAAAAAAff1iGViGViGViGViGViGViGViGViGViGViGViGzsRwnsnPSJIAAAAHhhhvvEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAb0pzssbgAAGjvQprgAAAAAAAAAAAAAAAAHp42dkjU1mIL7nBCJsQXx0A51P4SGSOsa73wAAAAAAAAAAAAAAAAAAAZcQ6JgzgADn+g50AAAAAAAAAAAAAAAGQx5ZDcNHc+wPD1r4TeRfwS6HEwiMhJtHOZwY9KREB8dDoEa+vkAAAAAAAAAAAAAAAAAAlN6PkAABzvRc6AAAAAAAAAAAAAAH1KmtJfQGmbmrG4Tc1fkAAAAAfe1pCa2Odzk21do+IuXHOpSMPAAAAAAAAAAAAAAAAASUhHyAAA53oudAAAAAAAAAAAAAGRMnmYGLBFmbXAA92TVSuwQn3OiETYgsfQjnU5rEY2NcAbeoJ/7gJY2dfYEB8TcOfAAAAAAAAAAAAAAAAJKQj5AAAc70XOgAAAAAAAAAAAD7+ZcyZgR/kcADYMG7vZjHkAAAAABhzCJ1Oh1yFZsI98Eru89KG7r7A57yVigAAAAAAAAAAAAAACSkI+QAAHO9FzoAAAAAAAAAAAMptSfno0s8IeAEkY5P0AAAAAAAAAeRMuOdb2iPfBM7MBNmSJlvggH38AAAAAAAAAAAAAAElIR8gAAOd6LnQAAAAAAAAAAD2ZjonHd16lZePbd9myc9IqehVAjXNwbVb2RvqjkOE1zLqUr0/mdhiTTHxT+qdcald7VPtwSqIYzI4Hk41xdPtFfWEq81R2NurZY5rZE6XUqBGurfVALfy031WWmwHlTbIdp6tTdjhLl933JvqMqoEW+tTTmoWXQAAAAAAAAAAASUhHyAAA53oudAAAAAAAAAAB9EnzPZcbqn17Mw0zX9daXM9NzNhyFdG5W9r5dVFXFL5/g+Z2fuNc6fWcn1mWuyRZ8PzdXdLzVb2ZPwGubbc1XVi2PGq87+ktc3Hmw2dFvedhbj05VDS0l3krqnSPL9Ty0qirPJj2qzt5p2iZzvF9DJyWcfYp+16ox2xv18oPUW3uVXadhx9Miv7C7YWahbj50AAAAAAAAAABJSEfIAADnei50AAAAAAAAAAbmnLG5xnZ8Zqn17Mw0zX9daXM9NzNhyFddTy3ewun4LsuWw47vjquVsfLRXHWcn1nmyydXa4yw4+v/vFvVnc2lT/dcVuq/u6aOs7LTK05ddKe+Lmpm3fMtevLJ4jLTGtLFFvbog5qFsOPrM2q7tNVbCRT1PaOeR2wPantaqXsbvaNmxrqsuq5/Vx3BhIu2FmoW4+dAAAAAAAAAAASUhHyAAA53oudAAAAAAAAAAE9B9AOM7PjNU+vZmGma/rrS5npuZsOQrrvuB76F0sNzVhV6y3LM5Dr91bU/Wcn1mi1smobJp/fUntw6LSnV1Q+2FVvR859R7a86jtHVsORp+fjNOB1tr6NbN1dmwup02HewvSc3YchWexrq3trFV03Vdi79V9Jnos+nrip3ZDjbYqe2NU7WrC9a0zi8qIfSXbCzULcfOgAAAAAAAAAAJKQj5AAAc70XOgAAAAAAAAAGebh5gaG/CeZYc2Fjuk2rMZaeekZBjt1YjoXvkdsbL3DntuWY7dCN6F7jAzwxfP0y1886Frk6m2Zx8UD0bzZyGfqGG/Q3zZFae4ec86FhI550I57ZmIP3yTi8XvutMaMuyae5B+6sQwkSkUbIwAAAAAAAAAAElIR8gAAOd6LnTe2sNQ6bG5NSprL82fUnq6O2vnPKcm49v3GCRSqPX3ec4ePa219Uq1zrm0eAsDdW4Wzrbq4DclomIx3dbrU0jXVyeU5kLf260sHfV7RzmWjo1I7Ua6uQ8l0HvnBcdGuboyUb7hKvRVtlb6nYKlLaUi02d3KRzvLncT20inEB7hP46kiY13d+aipB7crleqk0oqnDda2nTvUa53S7mTNJpfvYpFE6C7tRgk0ewptGvLaZvmVQ5lNot9cimxcWtVfX5xpnd+/d9TmU2i39t6G/oSqEPcZDY0ap0WdyKba5tyKbFxx/D2Fvq/ZCPkNkMABzvRc6SVNXLTULpm5pot7dEHzfST+UrOdgp2F0lmwnS1XP5XnzsIHV6WlaP3M5ylc23HQunuSPi5qz4fAM423DS0TqnV1lxSVd2e5DXVBSqCrej5xFvb15ucg7LjKu29TbrO2urn+g5uz4arpCP8Aus7mzOGk5CVScN3U5K5R9qoLfqD3CJnoGwo13D8rd1LZxcVx05bOWvap/teHx2Jry2/fKqgL1rL3Dl7WqnqMJNm1HblRyKiGEDqrRnact2w5GlxX9ddWDPr2vBU6Krvbn+fr5tvn9NCp+gddj6vJO5epjJC6e3chacFTQqu+uLQ39C2+fBlr2qit2ooPUuq5W0cJPNOobqyI6f3T31W5IR8hsigAOd6LnSSpq5aahdMkY62tU+pem5rzXKTsFO+4WxTlx1HL5+Gsit+90Ws3tfGxY8dXvNTcJV932fV850E7ltcbq3NFykXqnV1JRslXdja2PNqWnCVAKn6DcGhKxVlxNXbept13Z3V8/WjbfP8AiOQtlE6CpVmcZotIqy6wlvfLfqC36gkU0TmwzkPpIfH2ezsh8fcevvTOdrPlux46F0vXWPV1oy+ecP3Fe5a+Mm4To4PVWlUduVHL56GkI+yIt7W/SRsbjtDCRdGvlw2vBVAKrvbn+fr5tvn9NCp+gFk7UioqzrIDS1TrqxQHRWPG0uKvu7i0JDFbfPtRt+Za1RW7UUHqRbmqdUa322Dz07vRsrn96Qj5DZGAAc70XOklTVy01C6ZelF3b7r4niLoqvHfFzsFO6LO0eN6n7suLpfZm+bre2sTT4dshnvfYSZzDvR9nw4e4ZouUi9U6utrVVva2BzUI2Q0jis7LXNc50fOTeWq7b1Nus7i6uB77Ts+HpaY14+t7W5OT4durk5FWl5snKgt+oN9TE2FXthaLXsxY8cBz9VXrwUS+4juuF8jXthcHhPFiQlkyKj7qO3Kjzjw1mVnZmiz3qmuTkt1dw4g9RcuHNhteDqAVXeXP8/XzbfP6aFT9AsDYrdvqtrVb2qx63rsP3Y8XTIrO46zPxjbB7OcrDs9kLrKgt+oPfHf8A02VhK9ZxbJnKstaVR/EhHyG+qAAc70XOknp4GOzPuRgyb0a9wz5dN5t29b5ZaZTW1HmeL6zMJG98aLOKHvgH3IRjz3YSG1juhfuVgXkpoYGemUyxM757D/AFMMdwZ6McLPMdnLZujY79fYM4qJljKF3tx5kGWoADRh+mYb+Yk5Q9DOOiZGD8zzbsW8y9mIqdy1Qya0cN/nsWy0Z2Bjvk0Yz0Z2BhvzsA3NqJZa827GPcM7Aw352AZ9mPe+S2hgMc7A8zzsA2smiy1yUhHyHuAADnei50AAAAAAAAAAA2ZnnZo2I6R+Tn2TGNzTHRNHeAAAAAAAAAAABGmDWAZze3QQchEgAAAAAAAAAAAAAElIR8gAAOd6LnQAAAAAAAAAABnwDomhvmtD9DHEcD2VifToWjvAAAAAAAAAAjj6jAA9m8G6PPYw1MYAAAAAAAAAAAAAASUhHyAAA53oudAAAAAAAAAAAAPZuDyk6+PsidPoYo0wNzTHQfUBIm889AAAAAB8n1j0482NUAEgkgYjHD/XwAAAAAAAAAAAAAAASUhHyAAA53oudAAAAAAAAAAAAAM8zz+cm3x9kdH9DrEMyYwD73NATWfnvo6BCZCXRQlURiJvXh/De0/kADMYpPPnBiPYZiAAAAAAAAAAAAAAAAJKQj5AAAc70XOgAAAAAAAAAAAAAGWXg/o6Bo7x5HyI5/56DSIxmwgAAAAAzmD7kd00d70HkebMR8+AAAAAAAAAAAAAAAAAElIR8gAAOd6LnjwAAAAAAAAAAAAAADY1xNbHO7RMNXaGLKNLBKCGxzogU8IP7mRF590Y8gHmqberH65mwgAAAAAAAAAAAAAAAAABJSGjvAACEm48jQAAAAAAAAAAAAAAAAMmMb+zDif++dyE8hvol0UJVEfBNfEH8EvraI+/gAAAAAAAAAAAAAAAAAAABkJbY89AAHz9CBxzMOeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAASmvLAAAADX2BA4+h0SMbGI+Ho8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHo8ejx6PHvp8suyaW9uZzz0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP/8QAMRAAAAUBBQkAAwEAAgMBAAAAAAECAwQFBhAREhMUFSAxMzQ1QFAhMDJgIkEjJICQ/9oACAEBAAEFAv8A6wMyIG8ghtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCRtCQTyDBHj/hVKJJLfMwZ4+6RmQRIBHiX+BcWSCWo1n8BtZoNCiUX31HlJajWr4TS8ii/P35K/wA/Eir+8Z4EZ4n8Rs8q/uyDwa+M0eLf3JXT+NH6X3JXT+NH6X3JXT+NH6XyFPpIG+oxqLGdQzqGdQzqGdQzqGdQzqGdQzqGdQzqGdQzqGdQzqGdQNRn8clKIZ1DOoZ1DOoZ1DOoZ1DOoZ1DOoZ1DOoZ1DOoZ1DOoZ1DOoZ1DOoZ1DOoZ1AnlkEyAlZK/a44SCW4a/8ALF+A0/8ArdXkIzxP/MMO4fpP8E4rOr/NR15k8cpX4+RlMxprGksaSxprGBl85tWVfG+eLvxEsrMFHBMoIERFxmkjBsoMHHCmlp+WweLfEf5P4KUKUERwlJJ/epCVBccKSafkRf4+MlJqNDBFw8gbyCByCG0GNdY11jXWNdYKQYKQQJ1B8JliFsAyNJ/FicvitsGYIiIr1vJSFPqMGZn+slGQTIUQQ6lXApJKJ1k0/FicvhkRmbTJJ4HHySFuKX6KHVICHkq4HWcQf4+HE5fCQk1m2gkFctZIJx01/oIjMaaxpLGksZFfpbeNISolFc62SyURpP4MTl8FCTWaEEgrnXsoM8T4UsrMJjkCbSXGbaDCo5BTS08SVGk2nSXe62SyURpP4ETl8BJZjbQSE3PPcSGDMJQlP7VtpUFsGXEy7mvebzkf4+BE5fAZbyFc+7wttmsIbJHouNEsLQaD4GHc18hvEvficvfjN3vuZeFlnH1DLEnmsvCy5nK59GU/eicvebTnURYEHV5EmeJ3sNeu+1l4EnlNCsyQpOZKiyn7sTl7pfk2m8hXSSPOmOWGzoGzoBMpI/Y0EDZ0DZ0DZ0BCCRetpKzWx+AyzmLZ0DZ0B5rJ7ETl7rBYu2iWttnaXxSX3VVB7+7QrU3G2l8bS+KDJWc4WhkKaZ2l8bS+LPOuOTblGSUvzHnHtpfEGa61KvUokpnVo8XZL7pglGkRqlJYOBNbmNivrUiDtL42l8bS+NpfG0vizzrjkkVB95M7aXxQZ5qOQjA3fxB2l8bS+JHS9eJy92MnBFpugKN5N7+7S9pdEc0ZQtA7nn3Wa766uv6MG+kP68G60Ew1OBlpby00OQZTIT0QxTpJxZYtF2AbQbjm5ZY3LLG5ZYo0B6I+XOpd+EmaVU2UmbFkFhCukdL14nL3CLEyLArTdAUbyb392l7QE1jEFPd1YMlzWkMtZmRZrvrq+/qzQ/DyUoWcfyvhasiHFm44KDHJqGJTCZLDdFipDcKM3daLsBEUSJW9oQ3tCG9oQYfbkNxuVS7+6nSjiSH1EuDdI6XrxOXuRixWLTdAUbyb392l7QUxrWpgp8rJRhHay0AWa74SHSYYWo1qaQbjsuOS6eI7psvoUS0VH8QLoP4hVtxbUHbpQ26UNulCEZqh2i7Dhs/46PyqXfh2OpEYUublj3SOl68Tl7kUsEC03QFG8m9/dpe0FmenJb0ZBLMkCW1o2eFmu+FpH8rIhPlGk7/DqiW6KA/qwpSNSNdSXNSn1aOuTE3LLDrZtOiB2NouwERJLlbphDdMIbphBlpuK1F/mpd+KaymRRJLCo718jpevE5e42WCBaboCjeTe/u0vaCzH8WgbyTxDb1pdc8WLNd8Kq/tE7hoL+lOFWjbNMFLqBw1JqsNRSa0wgnnDedEDsbRdgIyyakb+YG/mBv5gQqo1LfIsDqXfih+LrcLaWL5HS9eJy9tJYqutN0BRvJvf3aXtBZj+LStYsCzrWedXPFizXfVN/Z4QIsTYhsts7MwKrEbVACTNKorpPx6hDTMZlRnYznBBo7rwbQTbdouw4bP+R/7qXfih+LFdhaDt0jpevE5e2z1bpUVqUnc8MM02Mw64rM9KjNSkbnhiJEaiiQyiQ1ueGIkRmKJDKH2tzwxFgMRXJUVqUnc8MN0qI2u4yxLc8MbnhiMwiO2HEJcS7R4ixuJgJokUgxEYj3yY7clvc8Mbnhjc8Mbnhjc8MR6fHjOE4RuO0uK45ueGI7KGGgtLchvc8MbnhiSssvrxOXtxurc71cbo/V+A71Lox/+W53q4jH2YnLjZZzFoIGggPM5SCY5YaCBoIDqMighlSgmOkgegkElpYVHILQaOGN1LjZSZ6CBs6A21kX+nVbCVEr9ylpSEuIVxus5gf4DLOcktJSdxskpeggaCA8zlJlnMWggaCBoIGggHHSFsGVzLOYtBA0EB1nKV7bBGnQQNBA0EDQQNBA0EB1GRUTlxu9jrODWcFHmbXHUjI7aBRpg6zgori1VKWGGhUaulk35b798apSWDgT2pqHm8h3xepaNSkxdZwazg1nAmS+gRK082cd5D7Qrxmmn6zgiuubVdUayrM4646YIzScOrPsKYdS80Ko4sqhrODWcGs4G5chsUyrm4u6o1FuGUmoSZB3MTZDAptWTJO6ruLKo6zgoc80PSUBHb6zg1nBF7WonhB1nBrOAu0d7HWcGs4NZwazgRJfQdMq5qXJQHex1nBrOCL+adfUjwpus4NZwazg1nBrOCiuLVUpYicuN7sLoj6oz7S0SWbRdgKH5R5OZdblnGj3M0eU4mVT5EYgy4pl2O4mXEvjdW0vaBpCnXFUmYQcbW0oUSWbEoWg8cIndCuPGzTxAj7VK3LEy1KGcN8WaeuqvkRTqcc1Eiivtoup7uvCqEkosVxanFiLTJMhL9JlMpuo8vaoorPk7qNN2pgyytXRO1qXYXF2b3YXR6KbzEmivNN3RFm9T3uwui+NvqfjLiocky3FJG4pIp1KfjTJYicuN7sL6HN0HrRdgKH5T/uuualRFnY5LddeyqQonkVBjZ5gs05iy8WDlzHVtL2gpvfuLyFWo6X4NzC9Ri0HjhE7oV5o3KeELUhTNbkoB1OHLEdinvE2w00YqvkRZnoOuJaQ6rM6KKWFMtM5+RSY5SJt1fjkzKFnXMs4Vnyd0V9UZ9t5L8a6J2tR8fcXZvdhdT5UdMKVUYzTQbQpxbaNnhvdhdF8bfU/GXJq8Mk74hjfEMRJbUoO46kTlxvdhdPiqiSA9N2ikih+UFS78Wb7JzqRP6tD5AWZ60nq3NdS0vaCm9/L/AIf7C6l+PtB44RO6BliVRo60KMjI7m1qbVR6htaRVfIhDrjYWta7okdcl9pBNt2j78Wa7u60/wDAovkxWfJjZlbEKPN2dV0X8RJ/jbi7N7sOGjy4jCnS1G3uwui+NvqfjOGzH8P9WJy43uwuqsMpccywO6h+UFYRkqIsy7/xebPPGQaRWXNSoizCPw/1bmupaXtBTe/kJNSagrRp10FOSFaDxwid0HpTDKjqkMg25DqIeokZYqFPchXUlZoqIqvkRT6cqajcLgaoJCNGajIFpkf+wKA7pz7rSuEbwoCM1RFZ8mKChLlMqEVUSRez2E/xtxdm92F0KmRHIi6PDUUxg40kWdfNyPK7S6GWNO0FjQWDZWKn4y5FPiZd3RBu6IGWGo5OHiuJy43uwvr8LA7qH5RasHLRxsbo7y47rNdZNMyt5kXUtjZIJnidzXUtL2giuaMg682KhUXJl0COcqULQeOETuhaVr/kKXL2OS3NjOJrs9p1oUZo3agKr5EWZ6HBWo20QwRmk4tcLK/XWyS84p50WdjZGRWfJizvYVOIUyMZGR3M9hP8bcXZvdhdDq8ZqKuuRyKS8qQ+LMoMS+0uZrTjTO/nBv5wUqoqmuVXx1ya62Sd/NjfzYYrLbz0ohE5cb3YXP8ASQaXmqjEOJJFD8pLCDS83UqW5GVeRGo6RSjQqQ5jwNdS0vacEaM7JXToSILJHiVoPHCJ3QlMJksTIjsRy9llx9ylwShsiq+RFmehw1alHmP8cFMpS31JIkkKz5MWd7BpeDloIWF7PYT/ABtxdm92HDEiuynIzKIcV/8AMHhsz16r47hpvfy/4icuNtSVtbshDdkISFllQrIp5piUndkINQorLkheZRHgaHyDsKJIB0SIYTRYhBpmPGJx/HhSeCnmmZSN2QxuuGN2QwmDDbGq2gnHDWIq8SfZQ+jdcMJpsRKrlpStLlJhrG5IoRR4iQ0020m5ynxXV7rhiPHajlxPxWHwqixDBUSKGIMZg73YEV1zdkINIZit/wDaS1Gd1wxuyGHFJQ0WR5ndkIbshB5SUttqStrdkIbshDdkIbshBMOGgaraCcWazbUlbW7IQ3ZCG7IQ3ZCG7IQYjR4xq030bshDdkIbshDdkIbshBECI2uSslCJy9PMYxP9MdWLYUWJGWB3JPKpJ5i9pxWRJnidyE5lXSlf8fcicvdYVlXdKRwR3Mp+08vOq+MjBNzisy/cicveZXmQDLElpyKvjuY+zIc4GkZ1XSF4J92Jy95leRdz6M6eBl3N677uHAX5NpGRIM8CWrOr3YnL34y8SukN8LL2PqvPcMdvC+Sv34nL3yPA2l503PtZeFp40hJkovQUokk66a+Fhq95zIXvxOXwEKNCkqJRXPNZeFKjSaHyMF+f2mZEFyAZmZ8DLN7iyQlR5j9+Jy+C05kMjIyudZ4kqNITIMJdQf6D/AU8ggqQZgzM+JlnC9aiSS1ms/gROXwmnDQaVEornGiWFpNJ8RHgCdWQ11jaFDaFDXWDcWf6EINYbbJF61kglrNZ/BicvhoWaDbcJZXGRGTkcGRkfoJSajQwOV7rpIClGo/hROXxCPA238eBSSUFxwptSf2paUoIjkQIiK/kHX/ixOXxm3VICHUr4VNpUDjkDjqBsrGmsZVDIoaawTKwUcwUdIShKeFbyUhazX8aJy4j5/BQ8pIS8lXorfSQW6pXyIn88TxYOfDSpSQmQYJ9BglEf6TUkgb6SCpCjBqNXymCwa4pSfkEtRDWWNdY2hQ2hQ11jWWDUZ/NQnMrjUWJLTlV/moyMC/Q83nI/wAf5llvMf6nWiWFJNJ/5ZpjH9pkRhccgbKyGUyGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwGAwBNqMJjqCG0o//ADE//8QAPREAAQMCAgUKBQQBAgcAAAAAAQACAwQRBRIQITFScRMUFTIzNEFRkaEiYYGxwSAjQELwkNFDRFNiY6Lh/9oACAEDAQE/Af8AT7poeXkEY8VLgjo2F+fYqeHl5BGPFdAv31WUppZOTKpMJfUx8pmsqjB3QxmTNs0UNC6sJsbWT8Ce1pIdpgwWaQXecq6A/wDJ7f8A1VeGy0ozHWFBFy0gj810C/fXQL99VGDugjMhdsVFRGrcWg2sqnB5IIzIDeyaLmy6Bfv/AMzDO9MVV2D+B+yw3vTE5wbtWPRdST6KBop4WtPyWI92fw0YVByNOL7TrUUrZQS3gsRg5Coc3w2rBKcSSGR39VX1fNIs/iocamD/ANzYp8Zp3NLMpN1Qd5ZxTyQ0kLn+I/8AT/8AUqqrqx0ZbKywPyKwHtXcNFdRc2nBb1T/ADcM70xVXYP4H7LDe9MWJvMdOXjwt91PC2pjH0Kr5cpjZ5uCxHuz+CpIOXmbGn3aw5BrWEwTwBzZgscgzMEo8FgJ+B4WPA8k0/NYVJTNhtLa9/FCGIi4aFS99HFOdlF107T+R9v91iOJxVUWRgKwHtXcFXVXNWtf4X1+6liZUx2Oz+bhnemKq7B/A/ZYb3pixfurvp91hkvKUzflqWIS5q6JnkR91iPdn8FgUHWmPBV1e2jAuL3UeNse8Ny7VPEJozGfFYfVczm+PZsKeyOpjsdYKbglODc3KlnipmXebBUbs1Y0/NOGYWK6GpfL3VVhVPHC57RrAWA9q7gsd7uOP4Kwat/5d/0/2/mtc5hzNOtGrncLF59U1xYczSn1M0gyvcSFHUSxCzHEIyPLs5OtOqp3jK55txTKmaMZWOICkmfLreb6Oe1G+fVOcXG5UU8sXZusjiNSf7lOe55u43TXFpu1c9qN8+q57Ub59U6rncLOefVRyvi1sNlJUSyiz3EoEg3C57Ub59f4NDhxrASHWsqzCn0zOUvcKCLlpBH5qXBHRsL8+z5aKbCJpxmd8IXQA3/ZVeGTUwzbRpp4eXkEfmugHb/sjgLt9VVDLS9fYoI+VkEfmnYE5ovn9tFPgssrczzlRwAeD/ZVdDLSH4tioaM1by0Gy6Adv+yOAv8AB6qKaSmdkkUUT5nZGC5UeAuI/cen4CbfA9TwSQOySBUVGat5YDZT4K+KMva69tHQDt/2QZd+RdAO3/ZZfiyroB2/7LoB2/7KowaWJuZpumi5sugHb/snNyuI0UOGmrYXB1l0A7f9l0A7f9lW0hpH5Cb/AKcB6j05oeMrkKQ0tcxvhfUqzu8nA/ZYVTieoGbYNaqZxTxGQ+Cbjk+a7gLJpbKy/gVWQ8hO6MaMN70xSuysLgqXGnvkDJRqKnhE0Zjd4qiFqpgPmpOoVRZecMzeakDi0hu1Qiupn3l+Nqr8TZNGYSwgrAu2dwWIzPggL2bVhNZLUh3KeCx1o5FrvmsGpxHByni5YniTqYiOPasNxR1Q/kpdqxanEtOXeLdawLt3cPyNGKUXN5c7eqdDO8Dj+dA7X66OfVvLZRr1+SJtrKuDNduy+ibtHcdGBdi7isRmqIsvNxf6LnmJbnsquaWaS820fpwHqPVXWc2ljzbDf8KSFsuUnw1qs7vJwP2WBH95w+SxhpNKbaKJpbTsB8lixvVO/wA8NGG96Yp+ydwUIvI0DRAb1oP/AHflSdQprXONmhQYlUQs/fjJHmqfEoKg5WnWsRpWTxEnaFgXbO4KaRkbM0mxHFKRo1OWI1/O3DL1QsNN6VlljTSKm/yWEtJqm/54KsNqd9/IrAu3dw/IVdUmmjEg809kdXFbwOhneBx/Ogdr9dDsaga7KQf8+qliZVxWvqKkgNPUcmfA6Ju0dx0YF2LuKrK5lJbMNq6dh3SqycVEzpB4/pwHqPWP/wDD+v4WD1vKN5B+0bFWd3k4H7KkqDTSiQKOWOpZdusFNwmma7NZVVXHSszPUkhkeXu8dGG96YnNDhlKhw6nhdnY3WsQr20zCAfiVD3lnFSdQqiqObzCRER1MdtrSqfB44ZBJe9lidY2CIt/sVgXbO4LGO6n6acIr2x/syfRVFJFUi0gVNRQ03ZhYvXtLeQjPFYF27uH5Cxru31WDVuR3IP2HZoZ3gcfzoHa/XQcHp3OzG6JZCzXqAVTOKiq5Qeeg4bTE3LFX0FPFTuexutYF2LuKqaSKptyg2Loel8vdYrSx0z2iP8ASyWSPqOsnyvk65umuLTdqNTMRYvProZI6M3YbLn9TvlOcXG7jpa4tN2rnU++fVGpmO159dAJabhc6m3z66I5pIuo6yNdUH+5RJOspkj49bDZOnleLOcT9f0R1U0YsxxCfVzyCznnQyR0ethsnzyPFnOJ0c6n3z6q5vdc6n3z66OdT759VzqffPqnSOf1jfRzqffPqudT759U6olcLOcfVMmkj1McQudT759VzqffPqnyPk1vN/8ASN//xAApEQACAQIGAwABBQEBAAAAAAABAgADEQQQEjEyURMUIUIgIkBBYTOQ/9oACAECAQE/Af8Az7dtIvBiQTa0dtIvPaHUpvrF49cIbRcQGNrZVKopwYkdZtiVG09r/JTrK/yM2kXntDqe0OomIDG1pUqeOJiAxtl7Q6/mVuBichK3Ay0wp3EY6mJlHmMq7anhW0otqWYl7C0pU9ZtGwy2+RcOwN5V4GDeeKl3Ep0wbqZithlSqa1/m1uBichK3AyiLvaK2gykL3P+SjzEqNpW8G/2V2VrFZhm+6ZitxMLuZXDlv2zU0f/AJwfZ6zSlRKNczFbCUk13EVih/m1uBichK3AyhzlYWcykLUyZR5iYpvxlOl5IcMQL3itpN5VTyL8gJQw4l4qlz8lT/nl7DxK7lgJithMNymIp/kP5pF95416hF4EUbCFFO4lha0CKP6hRTuIFA2y8adTaFQ288KdQC203njTqeNOpoUf1CoO8CKNhl406/g1avjlOuHNozaReLibm1snxCr8ntf5ErK/zN20i89odT2h1Eqq+0Y6ReDFf5k+JA2ntf5KdUPtKlTxi89odT2h1EcOLiMwUXMOK6EGK7EVgwuJUqeMXi4kMbZe0Opf5ee0Opee0Op7Q6iYhW+Ze0OoPuVSt4zae0Op7Q6lOp5Bf9OK3EBtNeumTKfISu2lYi6zaestpxMptqUHKtwMX6Y+GAFxFbSbypwMG8qcTaDf7G8Tj58lKiVOq8xXGUVDNYyvTVNpheUxDXa0o0df0ytQCi4lBtLTFccqNTULHI8cvxy8VPTl+OS7ZYrlKSoeU8dHuU1VR+39OK3Ep09YMDESnyExXGYfnlU+sZQ4DKtwMXkI22Tf84N4TbeNRRj+0x6LJ9MouVaYrjFBJ+Twuf6lKl45W5mYfhK/AynzExXGUk1m0BKNkeGX45es1rxSUMDalvku2WK5SnSNTaeq0prpW36cVuJhf7mIp2OoSnyEdNYtCCh+zzva0RC5sIBYWyrcDB8jVmb4ZSpFz/kq8DBvKia1tPqGNiCwtKNMs15iuMw/PPEUr/uER2TaPUZ95h6RvqMxXGYbnMRTv+4ZHhl+OXsPPrGIulLZeZ+5SqsWAJmK5RKhTaew8oOXH39JUHeBQNpvNC9ZEA7zxJ1LWz3mhepoXrPQvWRUHeeJOsiAd4FA2H6CincQU1GwyIB3gUDbLQvWWhestC9TQvUAA2y0L1NC9TSo/qFQd5oXqaF6gAG3/kb/AP/EAEMQAAECAwIJCQcCBQMFAAAAAAEAAgMQESExEiAiMjNBcXKRBEBQUWFzgZKxEyMwQlKhwWDRFDRigqJDU/BjgJDh8f/aAAgBAQAGPwL/ALsLSr1cVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVcVerP0LUrJsVvPbFl8VZ+g6noGxVH6AqVU9B9n6AwehcHp6qr0KD08eh29O+PQ46dG3ocdOjb0OOibLVZYs4rOdxWc7is53FZzuKzncVnO4rOdxWc7is53FZzuKzncVnO4rOdxWc7is53FZzuKzncVaT0PYSs53FZzuKzncVnO4rOdxWc7is53FZzuKzncVnO4rOdxWc7is53FZzuKzncVnO4rOdxWc7is53FZzuKzncVnO4rOKvWUOCsPxbVb+lrFR/H4faqn9M4LrvhV/TdDePgYPX0TcVmlZqzVmlWjo4H4B6FuptVpVysGPaArlklXdFjomwLKKsHx7Qskq0dEHb0PYsq3GvVgVgC1K9XrUrQFaCr8W1ZCoehndDVdYFZidassVvw7CrbV1YlqqLR0K7oSgVTacSy0q08xsuXUcSrb+hHdB0Csnauz4FizSs1ZqzT8G20KyfaqHoJ3QVAqCdG3q3G6laaqxox81ZJV2NULtn2qh6Bd0DQYlGccbKsVg+LaFk241HXz7Vb0A7oG2+eC3F7FZzHtVuLR188IX9AO6AwjOgvxauu5pQqouxe2dRcefu5/RUEqqpxMJ3N6tuxKhVEqFUPPnc/7Zj7LKvWta1XnOta1rWtWTqVkSq5a1rVRdzh3PgoWA5zcrUVponmKgh0V5Fbi7sUPaoZY4tOHqK00TzFaaJ5isCJEc4ObrMoTIbi1zjWwrTRPMVponmKeHxHuHs9Z7RMk3BPeIrwCbsJaaJ5iobnxXllbauxC5xoBrRZyS76yveRXu8ZZJIWkL29T7VhMscM5vVIFji04YuWmieYrTRPMVponmK00TzFaaJ5ioge9zsjWZRw2LEAwz8y00TzFfw8Z1Te0n0WELk+n0H0WmieYrTRPMUecO59XrUHelA2/hQ9qhb/4nCifS6WD9DaTf3Z9RMtGdEycSGTnNyTP+GYclud2mQZCaXOKtfDB6l71thucLpMifLc7ZIb4k1jb3GgVzPMrmeZXM8ye6Ng0LaWFFco3zIFpoQqnPFjgoo/oPpN3OHc9AlB3pQNv4UPaoW/8AiT4n0vAlBf8A02qJE+p1Vyh/0NHqJP7s+ongDNh2eMoMemUXW7P+CT4JueKjbJzjqFU57r3GpkIlMuJbJ0J9xWVhv2lZMBnCQ3xKC9xo1rwStN/iVpv8StN/iVhwXVb10Tq31XKN8zD/AJbnDsURzTVphkjhN3OHc9r1Sg70oG38KHtULf8AxLlzdhlyoa2XeMuVRPrcPsRJ/dn1EnxD8oqi515NSmsbe40T4Dfpo3wkyI29pqg5txFVyjcM+T0/2x6IuhuLXVFoX8xE8y/mInmX8xE8ygOcaksFeCG+MYbxTtq5RvmUGP8AJEr4Gso3JohsLTgftN3OHc9r1yg70oG38KHtULf/ABLlG0KJD+l1E5ouN8sDqa31k/uz6iTIIvfadkmxSzDwdVaL+W/z/wDSc5owQTWnVLAOdDNPBRWD5mkTgnqGDwRhwqYVdauZ5k5js5poZcn7tvohviUFjhVrngFaH/IrQ/5FaH/IrBhNo3qvTtq5RvmUOE+419SnQ4l4xHc4dz0CUHelA2/hQ9qhb/4lyjaFhfW2soUPUXKN4eok/uz6iUR3yjJGMGnNiZMnj5HZTZEOGFCdeFX2tNoK9zWI7gE+I69xrLk/dt9EN8ShRDc1wK0UT7LRRPstFE+y9kxjwaVtRXKN8yg+PqV7Rg96z7jEdzh3PAJwd6UDb+FD2qFv/iXKNoUKJ9JpIv8Aoao3h6iT+7PqFEf81w2yoExhhMJApXBWhh+UKL7OGxrm5VgkCLwocUfMKrBdY4ZrupYMZtO3UcUOj+6Z901jbmigQ3xjDdMuUb5lB8fUy9tDHu339hm7nDueNmBGFQO1aM+YpsSGwhwutTANSDYwqAa3rRnzFO9iKYV9qMOKKtK0Z8xTvYtphX2ow4gq0rRnzFF8FpBIpeg2MKgW3rRnzFNe1hq01GVOhuWjPmK0Z8xXs4Qo2WDEaHDqIVjXM3StJF+ytMR20r3UJrT1654EYVbetGfMVoz5itGfMVoz5itGfMV7SE0h21EJz3sJc605S0Z8xQhwxRok6HEFRcQtGfMVoz5isHXzh3PBN0x0C7bjO5274FXTq2WVfLXPqCttVCWeJWTQ7Cskq3F8J1MtarX4WkbxWSQfjZTgNpWS5p8cckXyqVUTJM6hVdi61k2yq6dW4lXY2uTvgP7s+i0j+K0j+KwH6Vl/ah1VQLSQcMXLSP4qCHPcRbeexNWE5GHyej36zqC97FcezVOyIXN6nWql0TWwrsxPBQ8EkZepaR/FaR/FaR/FZMaIP7lSP71n3QiQjVpkS0kHCFy0j+Kg+8dnjXMw+SXfX+yrEe5x7TKoNCgIhMWH23psSGatMo4D3UwutaR/FaR/FaR/FZEaIP7kIXKqVNz54OfF+lZUQgfS2wT93FdTq1IQ4wDIv2M4wD3AV6+xaR/FexjOJa+4nUVhDxXgtI/itI/ioO4FHp9BWkfxWkfxQ3Qn92fRaR/FaR/FaR/FaR/FZMaIP7kIXKqW3P8A3WEPFP7s+i0j+K0j+KhV/wBoemJFpYcFaR/FaR/FaR/FaR/FaR/FQQ57iLbz2Jqd8CJ3Z9JtisvH3TIjLjaEN8Sg+PoUwIMhmkSJZsE6kNZvFViMyfqEmxIZo5qbEHzD74sLf/EmsZnOsC0VdjgsGI0td1GQYT7uJZ4yO8JQd8esnYN7zgyZCrSutUy69eEsGtWm1plFgneEo+9J7hEwME0uRcxzYlNWucGIby21Pia7htRc81cb5YTWhretyrgh4/pnl6RljpR9v4ngRNKy/tRHZODuD0XKNwzbuBRO7PpNkT2wGEK0wUXse2JTVrnDc68stUTuz6Tg90PTEjbs64cHif2WfB4n9lnweJ/ZQ4r3Qy1tbj2Jqd8CJ3Z9MT2UQ+7f9ihviUHx9DJ41MyZPjOFcCwbVRqIcNoUSGLgbJRof0mqdNqhb/4lyffCBonPplMygZw3/U0FHeEoO+PWRI+Q4Ug5ho4awssMibbE3+MgEUu1qsGHCeqw4TGH+ltJR96UbeRfEdgtCc4WAmsoFe31UGH/AHSY12aMozD2igiW+MsDU9so+38TbFZePuvaQ81wnB3B6KPuGbdwKJ3Z9JwA6PCBDRYXBOIise6lgaayDGCrjcms+ltFE7s+k4PdD0xI27Me8PlK0h8pWkPlKd7E1wb7Eap3wIndn0mYbrvlPWJeziH3rHDxEoPj6GXKN8yid5+AnbUV/aJRt0Yjdqhb/wCJcn3whtUTuz6TgbqO8JQd8esqG5F/JRhM+nWFRwoZ4THFrusLAiaZv3lH3pZD3N2FZbnO2mTYcO8/ZNY25ooE3cH5lE3PzPk+0yg07fSUfb+JDlAtbhYJ7JOhRD7p/wBjOFuD0Ubu5t3Aondn0xveQy2J/uG3/wCKrT2qJ3Z9Jwe6HpiRt3G5RtCcnfAid2fSdBpG2tVDfOD4+hlG7TWUaFrzkSBYUSVFpcMmUd+wIzbtULf/ABLk++EKKLX6KTgD+gI7wlB3x6ypFitaeorTjgU4ANiYPW1ZGHD2GqBcQ5hucJQKa3UlH3pOc14bgmlq0zOC97GJ7GhYMFtPzKE/rbT/AJxkAfnGDOFDHyismn6QTKPt/EnMeKtLiCjDN17T1jEh92PRRu7m3cCid2fScF74VXOaCcoqxjm9ocnwia4OuT4TrfZ3bFG3DOAP+kPSdyjbsx7hly0DFoGI+yYG1voiSnfAid2fTE/iYYs+f95wfH0KZ2pnKGi7JdIRIZo4L3rHtd2Wot5Kwgn5nTaHZ2c5Vm3aoW/+JQ4hFcE1VkF3FAEYEMfKJMh6rzskd4Sg749ZQo2rNMsI2sNjlVseH4lCBBIfbUkXSh9Tcoyj70o29inBz2ZQkCLCEBylhwvqavcQ3F39VydEiGrjJ0Z177tko+38SO+VQaRtrSiDeJw+7Hoo3dzbuBRO7PpOFDd7SrW0NiyWRHFPivvdKO/VYFG3DNkMQmnBaBetCzitCzintcwNwRWxR92YHsX8VoX8VoX8UyGITgXGl6BTvgRO7PpMoteK6iEWfIbWnslB8fQpqLHiuohF8IF8H0xKNFShG5SMr5WdSwR44jdqhb/4xcGCwnt1K+rznOkd4Sg749ZOhPuKwYos1O1HEwITS5yttiOzjKPvSjb2MY3JRWucz9lbiB/KAWwurWUALAJR9v4kd8otPWv4mGN/95w+7Hoo3dzbuBRO7PpjYMJu06ggxurX1lRO7PpjRt1R93G5PvhDanfAwH7FoW8StC3iVghVQ9q0PAWhbxKESHDDXDXVWalULLVXQmk9YsX+oP7laHu2uXu2Mb6qjbMUFARQHgWrQjiVoBxK0A4laGH42qjfsuxYKwIrcJq0A4lBzYIBFt88F4Dh1FaLB3Sr4nFWtc7a5UhMa0dgmXvhAuN5WgHEoiCzBBx/ewmu7VYHt2OX+ofFVhwm16zbiF8SEC43mq0LeJWDDAa2+kqRBUEWrQDiVoRxKwGbF7N+sUIWhbxK0LeJWA1YD9i0LeJWhbxK0LeJWhbxK0MLxCo3gFasB+xaFvErQt4laFvErQt4laFvEomE0Mr2pzH2tNhC0LeJWhbxK0LeJWhbxK0LeJQeyEA4Wg1QATuaXlX/AAdkqKk6hVHO6qswJ4PXz13PuwzwsShuPO+zEwjrmTz13P8AtlQqmJgm/nOC3xxOydNZ587n/ZPtxaG/m+C2/EsVJVKrz53QGCZ4Q8cWjr+a0ZxxcI3zwR48/d0BULtnUXYtHWhWcxtXUMXCd4T7egHdA1CqJ1F2LYsqxWfFtWQrcWrp1KqegHdBdiqJ1ZwxrCsoK/4FqvqsmxW41XXzqVU9Au6D7FUT6ircexZy1K4K4SzvgWLtnUq3oJ3QlisnasjgreY2BZeJ2qp6Dd0LYqP44loWSVaPi3LKtVmJRnHoV3Q/Yu3FtCsJVhCuWaVmngs0rNKuVpCtqVYMXrKt6Gd0T1hdXMbLeiTjnoSwrKC6lYR8G0hWWqyxWnooY4d0RYSr1qVwWpalnK0no0D4FCqH9N4R+D2q39M1Ob8PtVv6Xq+7q+Laskq5XH9I5pWVYrL/APxif//EAC0QAAECBAMHBQEBAQEAAAAAAAEAERAhMVFBYfAgcYGhscHxMEBQkdHhYICQ/9oACAEBAAE/If8ArAC4AM1iw7hDfGrxq8avGrxq8avGrxq8avGrxq8avGrxq8avGrxq8avGrxq8avGrxq8avGq3d6ADkCMv8K4FgpZKviiE5EnP3p1zIOSwg4EBwnB/wT7NcBdOl/nwOLgxH+BWhLQCOPB8GV7iCIACJg/PvN0FfhXATwmPnnkqAOiEKp+FyZPz28Evh3Bl87S+Hdf1/wBJHXf6SOu+IJYTWOjyWHEJvZHOc5znOc5znOc5wGxQzPw4Rghkfb85znOc5znOc5znOc5znn1cu9fqoLlH1cTDgEamlYf5YiTkQU56YC/UqBHMRz/mXIJkNvRIEJoEUpcP83rIHoMiGY/EiiJuCBPwQvlmkQfijWA3j47mT6G5svhACZCqsIg8fgr13qiA3DbqS3hW5uX91VR4yn8XufLbNw3PwVZjmgCb2QQKUPXoMVi8Iouxh8Qcn4c3hdTydbBAABhIbBIByQN6vHcsUnfJHDW9HKcFkvpZL6QznBYtbkXRbpqmiN8kC4lsABgBGaGZk2RTYSD8N0Hw31KYptCAI0UmBfksODkiDkTv9Otw3KkRyrFnWOw3hdf0VHwvQfCNpcrxK7Ei7ZWCsKexqB7CpSdwdgeFsugJMZEfB9B8GyVMqrExfh8FIqWD0KAJ3IE/FZ5Z5EdfpRBFQR6ErRfxvG2sJRSBj8F0HwaT7iG8RYzpRnic7ImZKuhmaBrcm3YIeqrocJIqoN6vgXG08FigDGVsbDwFFIGPwPQfAlDMJTaFcTGsbfsgHLCZU8NlsUJlDP1biXCncnnsgkGS5am8QS6aFASIkI+A6D4Gc1a5RrG3nZLylchUk7+xyK4KXMr7PIU3jYlXP4DoPgHDhCkW2P5bMjLwC6AADCQ9mJocIuN6dgFjJSk01j48vf8AQe/KEeKACQBAF5gEQkwnYoh3D21VNCzi2wcNQIQoQjUiilqD33Qe+BgCpkhmm5VMScYFGhx3FolaJQ/MWv7IkCpZ9smODitErRK0Sn15neM4D5IYcRJsYAfiAaALRK0SmbhOb3HQe+ygJlHM6ScmGEDiduTkEGaDHt5jmGBicc7NIAHMxPsYGIxItFgP7E44IIEWOZxChsByUfxsgCAAwEDgnkwTEMZHYFgCclQI8QBYzO4fqdG9jb6gacpkWQY2IGZ+rOZiv8QYyQcmNDtHHHHHCN4cAc4hPMoYUgABACcDico82clL8KoySTEGBERx3R9fcdB754Oqcw6Q5h1QbUZo4YABO55wlWguOvcbTB4kxm7H847D2n+zH8aMlKd0nCFDiQCfudhPZAoFSmCg4Cpi5VQmJLWLGDVzR65OwxjBXA0TJuET5a1i8ChCnBGCkg+xXWVA+aPRdfcdB71rMSmACgXMOkOYdUG1GaDWiZjcQfyD2mbAWYkeiz2A3PJPaJGDeRdH2WDqST+3b6hieR31NLwfzyA/nSA6KMXBEAczeGBb4kcsB3hQt62N1T3A+jKj03Lz9mGsWMHeQSwBDrX/ADWv+a1/zU5yLTBPiiJrKi1i8Q/cnvCD3EgMRF0XX3HQe93aQ5h0hzDqg2ozQuCwN4c9oTtwslI5vBwBMEbu6J2GFIc+9kiGOcS5KprQeKGhINM6OghQWe8jjOMByKOQt8oiAqOyTKfTjFedLzpedIqAvI4li1ix9Cl6xeFWjB7BBuUKuVkcCxi6Lr7joPeutyHMOkOYdUG1GaAuA0/VZ7AbnkiRM2Qu0KTYkHeRJ5nYYOvmcN/ekKg4IxkKeEsD33ITk8K7jgiVIF4iIBxx3IgcEQmZoMa3oCGiWLWLGDPIJcEh1r/utf8Ada/7p08ZdhMyJ3E1i8Bwyx3GshfT63F9jouvuOg97uOhzDpDmHVBtRmhpOafwEhcdO0Mcggd2PLZeYNkXLwRo7TkGB9sNZwMEE3gHCB8hTgqDcIdZyOhyRcBw0uoh0gHE1IaJYtYsYBJJLQMWLrQ/paH9LQ/pBBKJzGkgMMZlaxeL2CLk31bHRdfcdB7zMAtHmHSHMOqDajNDSc0xomU9x8QcESMeJl+7DzBrizOOgQAHJLAIArZEBJMDjwEmEYMq8ngVNiODZUUR7hxVzwuEVGlh0B2ACSwmUTcWTXwwVL6boBaxY7fMS1i+w9ispBrnHouvuOg94L7yJ95rhiEFK8AxMoBO7nKONbDEJwUDgcWTEVJkJw7QUmqlTEaIj5m4BaheCjkFkkzLQRjZTACE4KMEUcIzERGC5BiIqKB5AS4BLwLSLdBF3Kaaui/Jrf+EffIg9gp9lA/2M4iRj0gLT2lFFFFG6UGcmU/EUkUTKDjqwUI+dsCXqXgJYWYiooAYGb3HQe8DgAxM8ROuU5uUL8b4GUEDm5RGBzMRl3idcp1z7noPQA/FjQBZR+1lH7UziRiDBqcTkWUftahRWqjAwnPEKqQoBGAwGQVUBzRaWV/QxsAuc1lH7RJRnFS44N6JIAcyCIix+mgTgMi/rdCMRBimTtsJlEH9ICRBkQgO5AwAQ+IuM4nDM8Aso/ayj9oD+SBUFAfixoAso/ayj9rKP2so/aJoxB3JvOAH4saALKP2so/aG7FhUHYEjGeAWUftZR+1lH7WUftZR+1qFFaqMCug9A2OJFDyleUobi4Gfgum3iBlWogJsCvKUWgKSHGu6ngAbghsAyLoKJljNzfSkASC4JByQdwlkZNaH7BcKbCumyiqduNgV5SvKV5SjH1RIXzQswoOnUaFWQgmXlKOASi7vAyE08wAZGsnTFZwSMYPhXBJY8MA5NxTGFuDAOOEgBryleUrylFHyRzfSaWShSc2Ii2AdDizMooXwrWBsNLhf6FEoKhGkGIfUCQOxeUpzUpx/JBnXLyleUoySGp6KMWRBDBG5eUrylTP6gjY4kUPKV5SvKV5Sndugkf3AEGnpVBZpDY4kUPKV5SiJZOSV9iQ0yCUheUryleUryleUotAUkONd1dB6YGbyDAMQisO1lZLWLGJ1npvyVMgBHEMACSwmUHPPBo/QdT/L1wIPwE4Kkuh5reSoWjQ3FajNAITkYzQd2aDFGIswGhObDxbAdimu2QcEwD99eQMKI73yCawL7r8QMbPmRAjlSbtntscNjQC91XbhgI4IlIXnFyJFESxGTfAiDDXI4wAzzQ7P3R41KvflAFi4kUYDn4lYw5B0RA+OBn4boIagLYa1i0dQtsAC+17R+KE4BcgGZlGcsM65b0wJ7GgnB4zp0mt4AzzIWzRTDeug9QDHpyK9YsYnNIbBkVykAOvUmFPkO3Y6uitQLVJQ5JwJQhCx9NwzEDkcEePhNLN4kytRmhrF0/DnLIRgb3LHlAEggioXmmRGmu2QEK5Dw07wM1McVAgAAi4O5fiapKs7A+5ij8axk5HA0R4VAzgLlsdyDoh+AnJKAKOYC04FEsL7IorejEug7wE274bgf1kJCUG6zLMle0CmdMBsxP9hyDojXlZizEIXM5J3ZbDU5dTR1C2wABo0QREk+wBkeeEHDBYLoIMiW+5b0wJ7EZdAiKKByOLJiCrZy66D0wHDDVBGrpGjPYO1i8BDmLkc6XIpj2rOgUvDuKpu2M1GaGsXgUwjSMIl8YY012yAjABKRCIsPPtbo7MBUGREQ0YUIxTi2AuTbfY4QQPNXwirnM4wAlcOAXKk/CcBG+R1oBn6yR0HKBEZ7qQ5B0QJnNx9JjCmg1P3RJ3ZbnnSOoW2wBIEUnGI2OhQ1D6wE96TnBdB6YBGAVntxRjBIAsQcNk5j+SHgB4ZCBF8D2QpgZkkABZ6OhnlNAcBPm8COqEj5/xG+XLYzUZoaxdAwXLoJ5NMO8hhExGof+o012yEtbu5NV/gE7KgW3LRD2fcnImTcOaNEGbuBAgXncZbHYUuBeeIMgjMjzKbxE1NTvGBBhuTMAiqR+KvaNd45cfEDB6Hfpu8OQdEGHBy4YKY7swQc06R1C2wA83UMuftFIO3Xd1PbErhUQPRME12HJAwtLGJAFSHlW6+1uvtBig7jsWUcuMXjl45NzuBqiAhBJoV0HpgEtVY5kgGBw2B0yUcOiMDgzgYGHLvA5FAF8SgqImYw3BEvVVomRsf2HQTyWJfYzUZoBLgDaMWTKbOYprQhwR3OZgM4M7tgqgGDCkaa7ZA7YTA5WI7wkmQ2BVrqQIyQRwKJRGUY1jBoxNes39bY7kHTZO0udi9xA5ZIcEYIc3hKTPgjUYHLACfgNyYEH2k7rXKHIOiGsWCPmfsVkJkgjEHDYA5p0jqFtgACLMwLdVk2gIA7ptgGdhhBoapvfP+LRbGIxMJJKbBl54vPExLiZsdRwBqF4wvGEN7MSQk6G2PRdB6YHT9UJYBDrEI2HO8UR3d7ILpwdYhVBBcTO/wDuwMkEoBMlSEyfUFV3vbOajNs58DgbyjBwnuwMkABFDGmu2QBDLriDdEBM0jkbAgSMAiYEJ7sjLY7kHTaLbaYFQb/hASIBiMDsACubpfxQSwAwAwhyDohrFgsMxJk6pjIBy2AHNOkdQttgBRxGLzCp6wnKBEk1JdpyLrt9rF4F0HoGphMEwcQtAd1oDup4Ak1ZHCHFBckOHkQtAd1TR25LBCEDcIZ4Yo4NIboq4lZrkjDjcBDb5B+Cm6bgdVUYZoXx2cqC6LhJgJZited1pTutad1OhprqgrCgFgi85WJxOoomKnHZaU7oiimF0j9xKCTUDgoi8zMHKi8b/Effet2WWo2omNu7hnzWlO6DyMcgGu3X4yMfuqMvkH6IEz3B/lDQYcx9nYrDHCnzWgO6KXSkl5okkjjVAaDEBxC0p3WvO6FTCQAgYBGayQ5MVoDutAd06QUZhgEamEwTBxC0B3WgO60B3WgO6o/BD1UjQwoBk6qMAjUwmCYOIWgO60B3WgO60B3WgO6JvgYnEibiZMnC0B3WgO60B3WgO60B3RxGzCR+06N2mV0HtAGn3InqR4+jKjWSATlQoxyqInBWCCGgfdhKXBEIVTHnagGDCDIBve96D3zO9gxoDuOx4GPdGQmqbTTYuRRujbjD3vQe/anokYCNQKMU9hm7kN/cuzt7YlOCqEhKEr/w990Hv2AmqRjNBTTYBYyTXz/bzRcxtsAQCYlAHixgAlAIxT4e+6D4C6QpHt7YBYyQGy8Bv7WqbfsmeKplF04Q9+6D4AgJBCC9xCLnH8tn+oAToNx7F/Gykg3N9l4gEsEZSK6fAdB8D94BdCdCBDidEXH9Oy9jIUsF1wiAOQIy9Ua5gDNYQcSn0ZJ2XpcsBH6AC6OWofgOg+CJfKoQkRwY9+2hJzBCYmYVl70CCJT2yAOQG9XUyVKDmR1zJOeyASWEyVJz7LbC36iC3wPQfB3FiCea4jPhvUzhbbIUxByVCLjNDOcI7pNiBwVULhJEkmZJ2z0krofKd0fqKLp48At8F0Hwjx4xdYGHERaQAhYhcSaQEHP2LAMUMTJ8ggADAMIgWranmufg+g+FI4TFCwB+irEEwiEAzayKra1x6tKYLmSmB7gQFgAGUSQDksIKJeZr8J0Hw8gBewqUAtYdmhKPoOaCqEDfuKIPxhLwqBPwRdu8rBrdNCVIoGNmUjdBHppWHw3QbYMQt8FIzuCq8X5qo9ckAOSwVx8qKplhYfEBPz29/wAv8JVIIOgd0lWCSzCrY3H0aauKx5uKgRzI1OO/4rfWe2+AYSPxFAXFAP7C1BDclTlOCJcXBVZbz8aQLigGDDbCegUQ2F/m7oGnogl00QEmkP8AmT4S5+mBel6bwt/lyYBAAAYSHqCWAEIibWRV57kaoHBOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xTrFOsU6xVC+hEVDmVMPcf/MT/9oADAMBAAIAAwAAABDzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzwQwwwwwwwwwwwwxzjzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzTzzzzzzzzzzzzzzzzzTzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzhTzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzjzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzyjzzzzzzzzzzzzzzzzzzxTzzzzzzzzzzzzzzzzzzjTwwwwwwwwxzzzzzzzzzzzzzzzzzzzywwwwwwwwwwwwzjzzzzjTzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzyzzzzzzzzzzzzzzzzzzjTQzzzzjTzzzzzzzzzzzzzzzzzzyxTzyzzzzzzzzzzzzzzzziRzzjzzjTTzTzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzwzxRzzzzzwxzxzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzyjzzDRTzjzzyxixjzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzyTyzzjxzzzzzzyzTzSzTzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzTzzjzzzzzzzzzxjSxyjTzzzzzzzzzzzzzzzzzzzzzzzzzzzzzHL0P8A7z89089/f/5TDW+UzDU88888888888888888888888888g9W9deo8/1Ug9N+1/xl8ur+U88888888888888888888888884o9W9tpo95+v169+f9yjc5m+U8888888888888888888888888so9W+9gomyw75l8518/scqf+U88888888888888888888888888u9GucN+9+s/fNPcv/AP8Az6y79zzzzzzzzzzzzzzzyVgl9i+3Tzz30hzr7yN3r73v/wDn987959mNZNNlbNW8uNNs8888Ut8rAdU1J8etGvgqvukjq6zc/wBKDPLkPgfqfiaavl/FPTpvPPPFKLq8q5NbPFvy/q6qm9jKrtnPduKPKJvrfqfuvzvn+FOcJ/PPPFO3K1ZDeLfFrfbI6v5jpaqfPH9XvfPcflPqfv3U/rmlPTaPPPPDnv3fDCH/ADw9cdwq7z/z7y3zzx93zw72s88088y089y88/zzzzzzzzzzzzzzzzizzzzzzzzzzzzzzyxzhQzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzxwjxjzzzzzzzzzzDzzSzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzyizzzxjzzzzzzzRzzTwzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzywjzzzjzjTxzziTzTzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzxjAzDzzzzzzzhzhTzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzyzjjwxxxzzzjTzzzzzzzzzzzzzzzzzzzTzzzzzzzzzzzzzzzzzzzzwzzTjywzzzzzzzzzzzzzzzzzzzzzhzzyxzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzTzzzyxTjzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzjgzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz/xAApEQEAAQEGBgMBAQEBAAAAAAABEQAhMUFRYaEQcZGx0fCBwfHhIECQ/9oACAEDAQE/EP8Az7V9Di+JpJBgtzgTnSLoVE1pOj5qXM2DPOgJAZizJil8UExH94DMSFrrhQRVBYi/S/gCsFEyBwbXp/ZpcWULKOaYczDtSBMKia0nR81pOj5orqCYii7wTbQAcYDDP4qHz1pOj5/7N89mvbZq3v00AOJDrYVIDqu591ZnQD5YO7xaxbFfN20UoFyrmMVCBascnwyfFCVJCObj8R2obBKYDXXSjLFd8EJyomBEYBb8ztW3VfAgxzrUUXBZShu16WtIJDTHLUTS20+MNP8At3z2a9tmre/TV4An0DQLhIchHck+aiq/pxHvHBkwhbeRa7VfgAwWXxYZVBtFkZG3G5dKjdaoeTd0e9E4wTt/KUO47j+UrUyYJizOjyA6HigAnuaJ3cE1+HQBIZG0IxyXOvS1poOUTkT9UWtFCJ1E9u/7d89mvbZq3v0162ipu3jZYbRUC3daj6jg1qLR3frekGZKwcqfbJBMlk1hmE8Pw0jllfBGPw7TVnvJdxqfgZKRsDvRAAXHLAL2gBuZ70KXTZWo6qTRIS1r0ta2OiNk9X/Y+dP+0yoFyWNPHBsSVHUCYl9OUjBVKgHL4FKndbLM2yXW6U5QV4qK0iQKFJC0Zq96ur9d5pE8retXqci9qCh7Xaphlmsu9B2hLkr9d5r9d5pEwN4qKWVpyU7VAOXwq20CSEr9d5/4bY4BdN/zUXZ6CI1xspxmJRNM8MFjQTnwMsJnf08pTBZb9Z1IvNMOZh24sOxKJrQ+udQ7B0fNPEZVyWn8+aUpiQTzpTHYT6ngQhHCJfksjrNQMX1nRi+rku5aNWKUTdOMVofXOjFgvJPtqMkODgmlGZRRRAcgndTtR5EuSRuL2pXAe+o41ZMRN04h91Nk2oiLMcaCWK0PrnTjO9jeK0PrnRPnRWh9c60PrnTYhLwsen9qHzsVofXOtKVOnCxSGLpwnOtD651ofXOjNsEzEYp9f53h2aehI2JTZvBWZ5LmvRZqABIyM4u3aPecmbcHWiTDJadGaFG0Z5iUN1Bs5Nps8N79NJfQF6FFJkiSSJ5rZQaWD8fhpb4B71tXtQQXYd7N6VmEMOTg1F5tJhF0gYaXwM4IRmvY1Kc+AmA3pnUGZIQxHxlTEXkPhGexUwngGA+6FgWSrcHmoKEiRLJjBKgVgHledOxW88CAO16OJ46YcNh4Lr1fwjQokBknMJ+ZoApAU4qLHKbOG4d+HsaFBSZTMSyj7rWddRxgoiIsvu+f87w7NETBnTA/E26U1emB9wa9FmohF79ikXAjvwvBIdqOHhHZw3v01vXalvgp34ENc0bV7VOkulrtVno5EcrZIdqPxFgkPjejcslHGy2OTXsalNlA521sJB8VDBFxN65tAzJ2YpArkR2+qZzCV6ijb+oSt5oJCQAmYzP8qQrTkezzOGw8F16v4LbJUuIs9YVIKjkRix78mphyh8libcNw78PY0KNbNq6MIz517B5oq0IX6AfX+d4dnhVvlh8jLmduVeizVanReZjee41N4FafSfVQ23RVOnmmCW4GL7nhV9klfnhvfppHcJDRqwLlVjq1NWZAZauUb1tXetq9qk64v5Nn9pzKDh761LzJIMb57VJ+xgOdkun3817GpW57jiSvAsrAW8e5rNF5EXOJ81Kto3ra00mLeLiMOc35XVvNHafdWtdg5fPfnw2HguvV/BoKVltzqQIFyAKQXKI5EB1jguBLq+aMSAIZczWvY0KFE1qLUvjLlWr6vNFXAktq46/5MRJZKdqjpYXSrHWgzImJY0yUHBXnhJItFO1KEb1LmLm2vEMyJiWNftvNCwg5vNLNrRh4TEpUh6rzwtRuRShoes06pK0hJWinao1zJSbv+IETIWOlThDKWOCUlaKdqg2MlU3aFGSv23mgIG2v23mpZnGv23mv23mrafmV70KMlftvNftvNJmhwUneiEA5Kdq/bea/beaUEozV7/8Akb//xAAoEQEAAgAEBQQDAQEAAAAAAAABABEQITFBUWFxkaGBscHwIEDRkOH/2gAIAQIBAT8Q/wA+7N7QluQHe2EGuTLO4bOrCosu4tBxM0Ln3v8A5EaZMuXtjIDOqGBS7getXFov96bzj3wQnSe6xiOc8jC0rQyjMHrKd30iGd5yNEcWHLBU8SEQM+tIZsJznlTSW96n728498ERLcfaMvqSlwlPIltNEWyj6JWlvBmRFXKapVW0QaVmv0gtROeffSX4J5Ut7lfyWM1/e3nHvgtP19pXOOc57X7TyJojrGtTVRxsRhO0541JZTJIooomTFsFIeEGmyc/xGQ5M8qa/T+T57+/ugKGUBbB2gCkitgMZsGBUGUWsHaI2CzKRWHKdoAKJp24BsgChEBTOU7TlO0HWDtMpFxmwIglM5Tt+iKBLuZC0y54YB7mCNM2Xv8AqObHGz4Z9jCTnKXvDAWsCdC4PfygfFCBF3PsYb2AjYCiFchuF+YQIuEUVcZ9jGsPsY5Ln2M+xiliotFz7GKg4ECLufYz7GZSK/KIrInfKznlkV61co4neOUFuI0bks3FCgYxVyjCdo7Y4TSl+kjAOiKhnQSBU0OsB6EYOOJsco/DkMOnNhcUTZymj1w4+GGr0+MH2Yapyy4wLyJSZtaw0emGh0lzevWfQyg6H8pYzUr5lyG+U8sgyPOIDeDtHGGsZeYRA1wNMeHxNKALUyhDwgVGUFBozQ6yna5eio3qwVdGNOcYSN9Qmj1gK+Es25hqdPjB9mAtCS11mQ6+5ho9MNDpLi2k5hFJ7flPj+ZwaZ5ZCVyu5Ei2Zh4MhtikqyBWZQgseBNKXBg3dEjWtXCWwmh1mjinnxW3NUwHZzR6z2JS3jXDU6fGD7MACioGQzWLf1rAAojI4TQ6SyvrObFj+PQwzQVRAUwBsHbAWhc5CAFBigKZy3aAaDtgglMq2dsNPXANkAMiZKLi1gen4O2DE7DDJRcWsBhy3aUVU5btKnLdpy3aaIrDlu05btBlgPSZmBnLdpy3aZKK/wAjf//EAC0QAQABAgIJBAMBAQEBAAAAAAERACExURBBYXGBocHw8SCRsdEwQFDhYICQ/9oACAEBAAE/EP8A1htwsopyBNHhT7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7rwr7oV+UfdIhd2UoIla1P/AArcO3108jqZEqkzVrU/u79nMaaScZGG8osbBI4/8FiDVgcVPJGRq/gpwpW62aLtI4mscv8AgH+gvekCxwMn8MiFVbOKUsBImv8Avsa63af4qKZ5HWf3gxoFwpnbkvH+LCzmbtdFy39202FA9/P8fMlI8Lf3VBms/D/HU7J+T+7yH4f4/O/L+7yH4f4/O/L+QDKAMVcKaQ8APenmy2EvOp+S3MfFeUV5RXlFeUV5RXlFeUV5RXlFeUV5RXlFeUV5RXlFeUV5RRyUphWP44M/1KBXlFeUV5RXlFeUV5RXlFeUV5RXlFeUV5RXlFeUV5RXlFeUV5RXlFeUV5RXlFBtuK6c1WQGnsFvOj91Ns4NZw/LMFLg4tNrc7YR/wAsJAGyOFTBwdQPnKhkt+KfosM6m5K3f+ZeRGwnJu/Cr8BK5VZGGwyP+bkkt++bvZ+Cbl1wDvl/J1xmY1gh74UjDjxST8dYo25tYc20P5z6iH2a6EQS4+vGFlHZHb/EQAVagxqO4xRyxo0Lthj5qBsZrc1yew9fL5GriN5uKx3gnqfVTCha6kRRNl/5UmWUS4dnrke6j7/wmYMmHU96hlPcnvUKN2F385l8zi/vWJ2vOpindZ/kM5CXufx5B1rdRUGmzYKJCBgBY9DwQa1BU2IeRmj8+H2p/wAkfql4O4p4LXgtDxd5QXNCfdY9O0fSsSTL7qAFCZj6G7RiCZqcmM6zuaeBWpP43P8AV/FCWC81ES6g4vqiRVqDSoFUgqWVk4fepE3Ql92p0/NT+NmV9qJqACM8VWcm7H0IDjmbqlpAyPc/i8/1fxCSVwCgSDFnVuaVgvUlvwbONMMnBD9GKITbFRibcs7n0Spmv1KKRVXEw/h8/wBX8MbcYq4BUdJeKXdOMg4DFp9Tt7Hf+BCFtiawTjIoQtx0pAvw0r49Np+GNp+CFnylubqJnGs1m/TKCDP8WkBC9v8AC5/q/hETvirgFFx2pitM1Fr3VRY5cVfSEAKtoNdQKOe45Vd1siyoKA5pLzoAAC3pAQBMmtaXMS5VclcripReKaSGG0ekOv5KNRHjLHdpiTA8GkBC9v8AB5/q/gjPKtQC+rwYumHFMA1bqWWW8+hCBRgAxqM2Z4qjTnEvH8o6nwDR62tiLOFJCiQ4X9ABSI2RwoYuHAf602SAv8KEpVCOr+Bz/V/ACUAlwtro4a3wMtN25YH8HpnAz2fFY22XeL+iWqbO+c6jVxgcH0DCIw42qONYXO19M8Vqw1P4HP8AV/AsXctdbn300y7WLpqffpUBeI71EhALAYfprBPiJS7Pz/QQFIjIjhQzoHZnt023hPdl+/z/AFfvyKAso1FEgCgDVoUqF2zmmwUSrr9EJJuLmG1/WSCJalWbA7W9C/wnvS+WcTJy0FJYicqK6Gjf+9z/AFfvKHlIbVrcYh8aSJYMAzoaP1hwFbTs3VtOzdRwGUwpP0ocKSCXF9SSIlqYMSXgsK2nZuradm6tp2bqw6cQpNIMQSJUTTkk207qRGG0UKTWYa2nZuradm6oGe4dYf2Of6v3naEruO7UI8xNTNDXe3WjuS5hALV0ne1T0oEKYUjXe3Wu9utQwO4S0SV1e5oYIsS1ok1Kfau9utd7daCMjAkCQV1L76TQuMwAJWp03npWAdRFd7daBtl4LxCxYZNxQyW0uy87AGKtDLVr3aNY3y3FIpRqiN0oOBo21CZcqXjjdGNi2cGmckEVKO3Wrw7NWi8DI8Vwk4V3t1rvbrXe3Wu9utd7dahh0AjjErnRIMqBwoeDAA13t1qUvC/WFL7nHZVt7thqf9pGjoIRkyV3t1rvbrRHvYP2Of6v3o4Xbbjt9HxTs93oFuF2PGU0MlqkUvI1SveRw9Ru2rbWJje6PQWeVJN8EXfJx0oVIFHaG5Zxdmi+WQerN1BtaHsRMnG9Ie00SgkjJyG0ONkG2glIUM5LeiybQpAKEcHSpnRT4gQBzSvCq8KrwqsWKOdx0oxjdA+09dKx7BPQouJQKyA+rK2OJxNVXbm+Z6TvNj9jn+r918VEUR+Ag9HxTs92kX2tBl/k++gQZTB2p7qmRmCzqVjgQVcwaMjnpTd6eCyVd/DQgaCYF8G/LQ2NY2u9Den2aOV7kJ6VNKVZpLoLFMxbhU3UHu0GEkIBcrgnWNQS3rIXL8qiIpgQvcaAAAtpU2dSusqUErYcPQeeeRl4cBY2A8qSWyZOtj0LWeVG42PExP8AWn3IlIiR095sfsc/1fuz6LTcW336finZ7tIsREk8xREN9nHRId437g2N0mixI8ZkHoJu/fEJiQW4mDjS3c4QSvzQaTZ3Woq17ewA8+gvaACcA3OJbjQejm1hI+1KvE+4Z10rAIhQx1lFYBFALck9EkkiyG6lRFd761Pa865npWF4mgGshvAnHLRjHu2LNxYm2cZ095sfsc/1fuyIXk4Fvv0/FOz3aRQMCgR3VZGYbOsXOJDTIUkbSPl0Tagty5yHoN2NYIZth3wdG9J0LiEGYcJnDUaO1M+aCzdBMbtENPkJxld0AaksM1D50naUSyfpD3oihMhQN714VRRhRKQSzf0/lN3UrpChJCWXD0HnnrXGLKWN1WkViZvtpWTEzoxtQ2jDUHWEDDVDYkejvNj9jn+r93Vshnf6finZ7tIvYMq2TJlqhLOR46DYIO78/J6bjeo3Dww5N7Lj6sX804GN+9tBOohgtJfgZPbPRP8A8Fkr2yJNcGFMRqXI7GVQ+ddI96J9iiKVZgKzafT+U4qF2QaCd1eFo8LR4WiAVQ7G4tIYhZtHDp6FrguNCMWI7+s4mv0d5sfsc/1fubCj3Pq+Kdnu0i9gyreGWTJmfc++jAAi5WvJ9vouN3RibrwRN0rw0N6GBirR8LVSLqpra7W6Vnph9UWNegcecbWGRqAgQBwHBk4U1ackJeoOs+qkCK0SOes7n0ExUYAJVrXhWK3sXM+1GKhwsoAL7j1qex5Ucg6+la7CLkwl3hiNs7NPebH7HP8AV+5Dt72vpQZI4lSNTXdXWnryoMSJgu1ogFyDh3FQopaJBNSalrurrSdYVwpMYtsWmKvQJSIly5crurrQ5vlMW6MVzauOnYmAXL4hXdXWkrFkCkYhcxWqabComyalrurrQk7EEJIwt9I/GkYI4ld1da7q60lqSNi3bujHysBuDSB2xnj2gq+A1BSkTTkxyKYBQiNhxubSdUkptSDJva7q613V1rurrXdXWu6utBFkiYHGy0NYoEllvPSldVAMq6wNq7q61cdOxEiu3xXROeV6GziewiV3V1rurrRFFRTIGf2Of6v3JGzHLTORRs9q8tSxCg5tTHIXL+DKWYkxOd9AZAEZNSAghd0mxszfevLV5b9nn+r8AkpNojSpQsC7QUCpF1tRGaFxQGhSokBzKSOyk5hoAGDajHcVcG98HKtgmxHm0ddx74aKXJF5UchTALj6TK2LppWxRWNBRFzbPsVilkQkJ+F0oGK6qSApiIda2hqIcvzOw5sPlWwhRrk+u5DKFuoCVUI6qkDLGIYrUEtPBpgflaxpUpW4tgmhJSbRHpUpSgrn2M0kJiREURFEhNTqoSUm0RpUprjgjA2eiYWMiRb1KUpSlRIDmUkdlJzCuf6vwM1QURhGVd/da7+60ogoe5nS7d5SRMsN1k1AiRIUbCu/utXCuCjGpWjfv1UMjTd/lqZ/KcvkRi5G25T07ZJwxyaCYg2VCUWisXWMhbnBonCaRNsz/Q16qYVVbstnoxd7pSKaBVSbKu/utd/da7+60cVZ1eedEYLaATYkDx9ysDGbgjrRqTLRGhDIWOZXf3WkzUEUETt0IRQBi0hH8kk64Ng2sdWapbr9SugoKYLL3KmDiJws1vOxk3Y0O6KRG8ckbOh4CAAFjVNd/da7+61391oPAnWFvSnKp2PiY6rBC5lsLaY8oBsBcF1GzF2Y1NMWypGUF3itKpUqt3PQhDvPgqxeBl7In2Gd+rSfUEMDYDXf3WoSnSephLqwb421OR4WB81bIx++u/utd/daYFUFW6xpK7aIRlrrv7rXf3Wkpkq0uthTNUFEYRlXf3Wu/utd/da7+60Yfzexd5MNNnLNlAAWvkjbnRrMjg+aZqgojCMq7+61391pgCorqwv6JLo0wmFd/da7+61391rv7rXf3WrhXBRjUrRv36q5/q/B3PNpeW7C4nE3/WVRT+jWjFbREfQp2m/P3Cl9slITwMm4G9ypVZbtExUYAJVo4KJF8QEcaZmOzxW1nE0Kp+pzsbjvoQSQSwrJwDSKIhGN2lQeekFMyahCVYu0rjDEQnDoq4aRWj30MujKbNY+NnY7DR2vP0LJ5DENwk+4HHRJk8iJQFRttal4SyPp+FKknAQyQjtNe8deh8tIJ1X6ujzP4NBRoEi8TmUKpMnI2GR3ToFERh+KigEI5o4o0DQEvXYOrsGkKlaunQeg5iZzCFG2KY5+U7DOQLwKRGGzSAiDIjcav88RxMc0mdo+goKMlmrBqa5gm3k7d9KlMDuvp73krt+bT2DJXc82kZsQksExOKlXEcsCWFxwbToFGSzSCsmNRBeKTXc82nvmT0d7u0wWIAdKJEr8yEbQiSY5qNO3Be8fTXP9X4O55vRgULM2Sw7nB4bfQp2StxT3R9UrE7DYJaAK4RIkJF3gLfSnKbiPCiCSREo2ZY1NvjlmCA4DHDQjMg1cAonL70JhZ5l9MwzU9x9AqxuBkAxFqRMtZCG53MneGhm0SRG414/Qetdrz9CxnCUGSU8BvB0SOtJCUMeYyXigpf3llW6bq5BqcK1JKg7xc4gqesQ6GSg0cz+DT9JWk8H+uythvCSkNBdQvAjckqZaAfUr8Ee/RHzyO4G5Qd7QAAAYGgXSoC00M3yt66GdxNWD7Hu9JRuNcWBMTY94UWUkzUMraNndp73kpwmCml2DJXc82lS9SQBIi2aUX5PIrDcBnOhFJ5S6aRqYFbALxZa7nm098yejvd2mMMImujdXdXSu6ulJ1gWCsxiXwatLlYuWquf6vwdzzadc8YY2Dv1O0dmiNxJlxhTfLDwz9GzmbGPQMUuNdh9lOW7pqVvD70DNVLv36RoaE3Imd1G4ZHSvbegVbtNjQAooUdZLSyxIeGoscortefoWBbVRcTKmhoos7LJy178abR8DkbR03HUphxKd6BBYw4mpJJNpnBXM/g0KbCQSu2EowVYKJ7uh2qsx7Xsj6NZQCw6chB8UgEsI3TfegGESIHKf8dIFrTBPDRYRLDhqjeU+gpFeT4xQtwym+M9Fh9AJaGDccHg56RXwV7CrldP7Bkrueb1bb8e2qIIbh2tYfNcSMYnSu55tPfMno73d6uwZV5w+Cuf6vwdzzaTNJU563shG+HVS3VBQosj6NpJDXSrkAjbF8l9tCRhJLAnIj3FNpyCJhp77iAXgqTM5GZA0ACLgZpJ+aHFwR7DTyb0CrOfKdtVqGehrP50mkR4MDqYzzrtefoWSaECDBwY4NSU2GPrVViXBkEokB1sKJTeB7iSedQmDVF8YTBx1uGzQ2TIBON188tHM/g0H8QQrMkzbQtrCJE/cfisZ3Hus0u6IVsoO13QGMFpbFh6OOlBJidwWBy59AMMmZT6GUEY8OsplMe5MTB3mDtN3oUJ3w9H/AGDJXc82nE4QMAVgJ7U2ZFk023jlVqRLETAns32zoYWnNXJY4Fe5RFABGZGmgRh29o2NWxqlRsgV3u7SrkkWG9jbXkH3XkH3Ur+iEmGHy1gcEFyuf6vwdzzaQuQCx72qbu0E2HEsO2M30bQdQD78FL2FrMJT7ynE0Tu3aSQ1hrHvCoWeYKXZKPKjGMbE2oLfJXhSJUqsquNAoAqtjOrZlTdWq3gDhSY0ZcdPJtIr8izQhTFGeWAB8NGy8obQkTF4sY6GBFBGaWzI2pQEAAgDVXa8/Qsn+UrUhfcn26I7bV2SDaPXCaCzklN6iCcSkBu9Qyg1iziW97U7sqFqYPg46OZ/B6/k94hEpCOIX3hoKmR6FFxKAlAgRtqSHc8DCoZCgO1LKu61Lj+qZsLAbNDdUhJcbHi/DP0lFJmCZGqF3sYh2hlSpWDQosjp7nk9H/YMldzzaVdm5kghijJiNheLL4aKIOsAAAG4A4aCFIyIxEn2n3Up3HpgeWUIKXLSssWDEVZljXXOfk0pBkpFyDT985ZAgSiajUCUnPX91z/V+DuebS0UYToUhZeEMRhtrGWQ67U7TB/3Ts4WMJUCDfA2IeFTIBAoWRNRwZx6GmfA5GwKFWOOvLVt8jVrvgAZRNhx2ejk3qFDIZiCOSFYsgsgcsgc+Qy8gI512vP0LJZVkMFgNo0VUrJZzXTH0YQ/zwM1wDa1BgMWBGGyc+Wjmfwfg+cK5xsXQ1j/AIxgUq6EIR9DzEgbsoYm17Z0BMgcALAHpKKZ+Y9dTOHGpHCx2DhxLDwzdPc8no/7Bkrueb1TSUQoHPoYtNzAlELYvF9gMqvjoHar1zc5+T1rdpsa5/q/AmAKaJrfDpaNGzbFyYDsq9PFhmVD3htSkOCOhpOoSNLhWKmC1DYWJgrj0oYocEo0Gzkj9U9vqSu5qyeNIYTIRzGoibNByFNiFwykbVK96aCnF4vr0w+TFvRUkyhbCJsmemoATxGo7HIzJIe9pKJalTpWcLYtqBDrdo7+afsYbUlMMGdAAqIx2RkeLSCm4D3gbUxmXFH5vhSjRBiY2D4VrHUgltYxd+mU/AGrO2gAnGCwyCJuvrFWLxKx3Y5qjgtoORouwMjHIVfgIEm5iKcI9CcqkCqI1bBoaSDwkkrerqp0tzgqY0RUjWvvNABPEqgYAppit8FGBPXiMRz2aWjQOpYUmCkwBTRNb4fS0aNGkCkTBZOak1jUGOlHFg4OBSYApomt8PqaNGjRoKRQkwL62hKEUcR7+po0aNGg4Zgt2DeiBJcg2nua5/q/TFGzQ0DNjo2DtqfwwzS8t2rvZown1Gj3uQ/eldLvvT3SM7v24hpLDNpEZSVz0udMLcajXQEEAQGial1O4f78fu8/1fvGJRwDLTdHueT09vRcu9Zdb9pCKAMVrFmKbW30TAavY/19aFAVYKvbcxsB+7z/AFfv3snFNe3QJklDV+WGRzPRCWzGcGW/9m+sBgNez0OaHEeygAAAwDRenUsatbvf+9z/AFfvyQ+BoRBGTQMLrdrZSQokOF9KApEZEcKMFA4Or/f65DIAvsNvoEJRAGujBC7vN0MxBStWxBYGR+9z/V/AujbvzMu+mmBT3Bht+/QgKRGRHChEmDqf9fqLAq2qQ2MHT79KRtqx1NN/7ko1uXfT9/n+r+A2CiRNVETALZToSREtSKKtcNf69IJLgjQIK2s1foxPjUa2kmfJN970rAwuvzpKdI+AzpVVVWff9/n+r+CavGscFIHKPbQCAFEI66YRcVNf+fTKO/NGHFANDWDBUj+VHnUooiZzhF8FMmrWvptc9XXtaLFtCK44BiqX+U9v4HP9X8KTHNNGyFImhJES1RqNtTq3fVIiibL+mVJ2ONQgZzYfaoYA3Vb/AJQJQHWPrhhM1FSQItRnnhUsC5t1N8yl6SRqLAY0CCYhq723S3aAwNa5U3WDDUD+Dz/V/DkZK62gAE5aZiLIFnfUq+RMH1yTNSirYvs10Mu7z6V4V+6YcHg/dYVuX2qWh73RUyYda+uPxFheBUgE5dl+GmbGOBjR88GowH8Ln+r+IWa2swpMFCXcTSoe9SUl520+GlGXQ/Rm2dhhUZM51uLRkQEAGGlIIisXDflSxCcv4fP9X8UMwGyOFRkGrGLflQwEbad4QjCpRa3p76qlLRqJPyw6u4VQyVuCjJ1qEaWAgJV1VJPER8UiUVMquP8AE5/q/jolx7LhRxIt9wz9Mgvcwh9yppd22dKwpdsjWS2wrEG3NpNhBM1QjZOOsGPfCsQA2FPiJ2H6VHzm+CoaSzi/v6ZxYbag3tYOy2wj+Nz/AFeubtaPb+FGJtnDjUUSOrD70ICIjl+d0IMVYKliXBe6p0l9mP8AIgzcfY/31xOLQeN/v+I7JuMDZ4VEAualUWdusK5Jo/hlJnJE1NSfYg51OB+bdUwf2sP5V8EN/j2euB3Rauvv/IsYxqHWGNNg9KDxlvoQ4vB+6XMPcP3ScHcUxkNwKkw3JP5uM4tWo10BBAEHrDaQhorLrHMz/wCbmyjXtR/v4ZzANlnspSSLCJh/zJooTXrUEFvxRRBYE5NMnrU6nd/ywKgGy1JBOq1nflRIQCADD8il61JSqh7w96mpRzczTSOGaK8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NXhq8NQ7A+4pu/nOBzp0Rsi6oZhNs//ADE//9k='
                                console.log(_this.lista.imagen2.eveimages)


                            }else{
                                _this.lista.imagen2 = response.data;
                                console.log(response.data)


                            }




                        });


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
                            let uri = `./api/evento/delete/${rowSelected}`;
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
                        let uri = `./api/evento/update/${rowSelected}`;
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

            handleFileUpload5(){


                for(let i=0;i<this.$refs.files5.files.length;i++){

                    this.form.imagen2.push(this.$refs.files5.files[i]);

                }

                    console.log(this.form.imagen2)




            },

            imprimir(){



                const doc = new jsPDF('l', 'pt');
                var images='data:image/png;base64,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'
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
                doc.text(300,125,"Registro de eventos");


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
                doc.save('eventos.pdf');



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

    .slider{

        width:100%;
        height: 300px;
        position: relative !important;

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

        .slider{

            width:100%;
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

        .slider{

            width:100%;
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

        .slider{

            width:100%;
            height: 150px;
        }


    }

</style>
