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
                        <v-flex xs12 sm9 md9>
                            <v-card-title class="emp">Registros de Contactos</v-card-title>



                        </v-flex>

                        <v-flex xs12 sm3 md3>

                            <v-btn class="error" @click="imprimir">Convertir PDF</v-btn>

                        </v-flex>

                    </v-layout>

                    <v-progress-linear v-if="ifvalue" v-model="valueDeterminate"></v-progress-linear>


                    <ag-grid-vue style="width: 97%; height: 600px;  position: static"
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


    <v-dialog v-model="dialog" persistent max-width="400">
        <v-card>
            <v-layout row wrap justify-center>
                <v-flex xs12 sm6 md6>
                    <v-card-title class="emp">Datos de la Persona</v-card-title>



                </v-flex>

            </v-layout>


            <v-layout row wrap>
                <v-flex xs12 sm12 md12>
                    <v-card-title class="emp">Nombre</v-card-title>
                    <v-card-text class="empeor" >
                        {{lista.nombre}}
                    </v-card-text>


                </v-flex>

            </v-layout>

            <v-layout row wrap>
                <v-flex xs12 sm12 md12>
                    <v-card-title class="emp">Telefono</v-card-title>
                    <v-card-text class="empeor">
                        {{lista.telefono}}
                    </v-card-text>


                </v-flex>

            </v-layout>

            <v-layout row wrap>
                <v-flex xs12 sm12 md12>
                    <v-card-title class="emp">Correo</v-card-title>
                    <v-card-text class="empeor">
                        {{lista.correo}}
                    </v-card-text>


                </v-flex>

            </v-layout>


            <v-layout row wrap>
                <v-flex xs12 sm12 md12>
                    <v-card-title class="emp">Comentario</v-card-title>
                    <v-card-text class="empeor">
                        {{lista.comentario}}
                    </v-card-text>


                </v-flex>

            </v-layout>



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

    <table id="basic-table" style="display: none" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>

            <th>Nombre</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Comentario</th>


        </tr>
        </thead>
        <tbody>
        <tr v-for="li in list">
            <td align="right">{{li.id}}</td>
            <td align="right">{{li.created_at | formatDate}}</td>

            <td>{{li.nombre}}</td>
            <td>{{li.telefono}}</td>
            <td>{{li.correo}}</td>
            <td>{{li.comentario}}</td>




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

    const LinkComponent = Vue.extend({
        template: `<v-btn @click="invokeParentMethod" class="bot01" style="transform: scale(0.8); width: 50px; margin: 0; min-width: 0;" color="error"><v-icon>delete</v-icon></v-btn>`,
        methods: {
            invokeParentMethod() {

                bus.$emit('ocultar')

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
        name: "principal.vue",
        components:{AgGridVue,header20,footer20},

        data(){

            return{

                ifvalue:false,

                valueDeterminate: 0,

                alert: false,
                alert2:'',
                dialog: false,
                list:[],

                lista:
                    {nombre:'',telefono:'',correo:'',comentario:'',tabla:'contactos'}
                ,

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
                    headerName: 'Nombre', field: 'nombre', filter: "agTextColumnFilter",width:200
                },

                {
                    headerName: 'Telefono', field: 'telefono', filter: "agTextColumnFilter",width:200
                },
                {headerName: 'Correo', field: 'correo', filter: "agTextColumnFilter",width:180},
                {headerName: 'Comentario', field: 'comentario', filter: "agTextColumnFilter",width:180},


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
            bus.$on('ocultar',() =>{

                this.delete3();


            });



            bus.$on('ocultar3',() =>{

                this.onSelectionChanged();


            });

            this.getmenber();

        },

        methods:{

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

                this.axios.get('./api/contacto',{


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
                        let rowSelected2 = this.rowData[i].nombre;
                        let rowSelected3 = this.rowData[i].telefono;
                        let rowSelected4 = this.rowData[i].correo;
                        let rowSelected5 = this.rowData[i].comentario;




                        this.lista.nombre = rowSelected2

                        this.lista.telefono = rowSelected3
                        this.lista.correo = rowSelected4
                        this.lista.comentario = rowSelected5


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
                            let uri = `./api/contacto/delete/${rowSelected}`;
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
                doc.text(300,125,"Registro de contactos");


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
                doc.save('Contactos.pdf');



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

    @media screen and (max-width: 1264px) and (min-width: 961px){
        .images04{

            width: 100%;
            height: 800px;
            padding-top: 60px;

        }

    }

    @media screen and (max-width: 960px) and (min-width: 601px){

        .images04{

            width: 100%;
            height: 800px;
            padding-top: 60px;

        }



    }

    @media screen and (max-width: 600px){

        .images04{

            width: 100%;
            height: 800px;
            padding-top: 60px;

        }


    }

</style>
