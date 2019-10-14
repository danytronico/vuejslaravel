<template>

    <v-app>
        <header10></header10>

        <img src="../../../../public/images/carousel-13.jpg" class="images04" data-aos="fade">

        <v-card  color="#FFFFFF" data-aos="fade">
            <v-layout row wrap>


                <v-flex xs12 sm12 md12>
                    <img src="../../../../public/images/b1274b6c-6559-4812-a81f-16ba5a901297.jpg" class="images06">


                    <v-card-title class="emp">Ministerio de Jovenes</v-card-title>

                    <v-card-text class="lettle">
                        El Ministerio de Jóvenes existe para inspirar a líderes a amar a Dios con todo su corazón y capacitar a los líderes de jóvenes para servir y amar a su prójimo – toda la humanidad – como a sí mismos. Ofrecemos lo siguiente:


                    </v-card-text >









                </v-flex>

                <!--<v-flex xs12 sm6 md4>-->


                <!--</v-flex>-->

            </v-layout>


        </v-card>



        <v-card  color="#CFE0E8" data-aos="fade">
            <v-layout row wrap>


                <v-flex xs12 sm12 md12>
                    <img src="../../../../public/images/trending-2eecfe00d31b63b1e99e5a7b0f55f126-1200x800.jpg" class="images05">


                    <v-card-title class="emp">Caracteristicas</v-card-title>

                    <ul class="lettle">
                        <li>Programa de Certificación—para pastores, líderes, y voluntarios de jóvenes en una escala global.</li>
                        <li>Misiones Juveniles—para misiones especializadas, es decir, misiones médicas, mentoría a través de atletismo, y construcción. Se ofrecerán otros esfuerzos misioneros a aquellos que tienen la disponibilidad y financiación necesaria.
                        </li>
                        <li>
                            Atletismo—es un esfuerzo de mentoría del Ministerio de Jóvenes. Este ministerio busca la mentoría de jóvenes por medio de clínicas de deportes y campamentos. Deseamos desarrollar no solo las habilidades atléticas sino también habilidades para la vida y crecimiento espiritual.</li>


                        <li>Conferencias “GO”—El objetivo del Ministerio de Jóvenes para las Conferencias “GO” será asociarse con conferencias existentes y ayudar en su desarrollo.</li>

                    </ul>








                </v-flex>

                <!--<v-flex xs12 sm6 md4>-->


                <!--</v-flex>-->

            </v-layout>


        </v-card>

        <div class="heights">


            <v-layout row wrap justify-center>


                <v-flex xs12 sm6 md3>
                    <v-card-title class="emp" data-aos="fade">Galeria de imagenes</v-card-title>
                </v-flex>
            </v-layout>


            <v-data-iterator
                    :items="list"
                    :search="search"
                    hide-actions
                    :pagination.sync="pagination"

                    content-tag="v-layout"
                    row
                    wrap

            >
                <template v-slot:item="props">


                    <v-flex d-flex xs12 sm6 md4 lg4 >

                        <v-container class="pad">



                            <v-layout>

                                <v-flex xs12 sm12 md12>
                                    <img data-aos="fade" :src="'data:image/jpeg;base64,'+props.item.imagen" @click="onSelectionChanged(props.item)" style="cursor: pointer" class="images02" >



                                </v-flex>
                            </v-layout>



                        </v-container>


                    </v-flex>








                </template>
                <template v-slot:no-results>
                    <v-alert :value="true" color="error" icon="warning">
                        No hay resultados.
                    </v-alert>
                </template>

            </v-data-iterator>

            <div  class="text-xs-center pt-2">
                <v-pagination v-model="pagination.page" :total-visible="12"

                              :length="pages"></v-pagination>
            </div>

        </div>

        <div class="heights">
            <v-layout row wrap justify-center>
                <v-flex xs12 sm6 md3 lg3>
                    <v-card-title class="emp" data-aos="fade" >Estrategia Ministeria</v-card-title>


                </v-flex>
            </v-layout>

            <v-layout row wrap>
                <v-flex d-flex xs12 sm6 md4>
                    <v-card color="#CFE0E8" data-aos="fade">
                        <v-layout>

                            <v-flex xs12 sm12 md12>


                                <img src="../../../../public/images/dt.common.streams.StreamServer.jpg" class="images02">
                                <v-container>
                                    <v-card-title class="emp">Alcanzar</v-card-title>


                                    <v-card-text class="lettle">
                                        Llegar a la comunidad local, nacional y mundial con el evangelio del reino.Aspiramos ver vidas en Republica Dominicana, America Latina
                                        y el mundo se entregue a jesucristo, le reconocen como señor y salvador, y le sirve con entrega y pasion.


                                    </v-card-text>



                                </v-container>


                            </v-flex>

                        </v-layout>

                    </v-card>


                </v-flex>

                <v-flex d-flex xs12 sm6 md4>
                    <v-card color="#FFFFFF" data-aos="fade">
                        <v-layout>

                            <v-flex xs12 sm12 md12>


                                <img src="../../../../public/images/download.png" class="images02">


                                <v-container>
                                    <v-card-title class="emp">Capacitar y Equipar</v-card-title>


                                    <v-card-text class="lettle">
                                        Proveer los recursos y facilitar el equipamiento necesario para que Jesucristo sea formado y desarrollado en su iglesia,
                                        en toda su plenitud, funcion e influencia. Aspiramos ver creyentes maduros, parecidos a Cristo; hombres y mujeres integros,
                                        santificados y equipados para la obra del Señor en Republica Dominicana, America Latina
                                        y el mundo.

                                    </v-card-text>


                                </v-container>


                            </v-flex>

                        </v-layout>

                    </v-card>


                </v-flex>


                <v-flex d-flex xs12 sm12 md4>
                    <v-card color="#CFE0E8" data-aos="fade">
                        <v-layout>

                            <v-flex xs12 sm12 md12>
                                <img src="../../../../public/images/5c21824c31ca8.jpeg" class="images02">


                                <v-container>
                                    <v-card-title class="emp">Reformar</v-card-title>


                                    <v-card-text class="lettle">
                                        Transformar la postura del cuerpo de Cristo hacia la intencion original del padre, de modo que su iglesia funcione como su fiel
                                        y cabal representacion. Aspiramos desarrollar un modelo biblico de ministerio integral con alcance nacional y global,enfocado a Jesucristo
                                        y en la promocion de su causa en Republica Dominicana, America Latina
                                        y el mundo.

                                    </v-card-text>


                                </v-container>


                            </v-flex>

                        </v-layout>

                    </v-card>


                </v-flex>





            </v-layout>
        </div>




        <footer10></footer10>

        <v-dialog v-model="dialog" persistent max-width="600">
            <v-card>
                <v-container>




                    <v-layout row wrap>
                        <v-flex xs12 sm12 md12>
                            <img :src="'data:image/jpeg;base64,'+lista.imagen"  v-if="lista.imagen !== 'no hay imagen'" class="images07">

                            <v-card-title class="emp" v-else>{{lista.imagen}}</v-card-title>


                        </v-flex>

                    </v-layout>



                    <v-layout row wrap>
                        <v-flex xs12 sm12 md12>
                            <v-card-title class="emp">
                                {{lista.titulo}}
                            </v-card-title>


                        </v-flex>

                    </v-layout>



                    <v-divider></v-divider>
                    <v-spacer></v-spacer>

                    <v-layout row wrap>
                        <v-flex xs12 sm12 md12>
                            <v-card-text class="empeor">
                                {{moment(lista.created_at).format('DD/MM/YYYY HH:mm')}}
                            </v-card-text>


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


    </v-app>

</template>

<script>

    import header10 from './header10'
    import footer10 from './footer10'

    export default {
        name: "minisjovenes",
        components:{header10,footer10},
        data(){

            return{
                total:6,
                search: '',
                selected: [],

                pagination: {
                    rowsPerPage:9,
                    totalItems:null
                },

                list:[],
                lista: {created_at:'',titulo:'',status:'Eventos',imagen:'iVBORw0KGgoAAAANSUhEUgAAASsAAACDCAYAAADVnD2DAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTdDRDU0RDZGOTgzMTFFMjg4NThFNzE0OTE4MDEwNTIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTdDRDU0RDVGOTgzMTFFMjg4NThFNzE0OTE4MDEwNTIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5kaWQ6OTYzRkNERTA4MkY5RTIxMTk0Rjg5RTg3OTFGMTUxMTUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OTYzRkNERTA4MkY5RTIxMTk0Rjg5RTg3OTFGMTUxMTUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4cU/xOAABhnUlEQVR42uxdB2AURRee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'},


                dialog: false,



            }
        },

        created(){

            this.getmenber()

        },


        methods:{

            getmenber(){
                var _this = this;

                this.axios.get('./api/minisgalery/index4',{


                    onUploadProgress(uploadEvent){

                        _this.ifvalue = true;

                        _this.valueDeterminate = Math.round((uploadEvent.loaded / uploadEvent.total)*100);
                    }
                })
                    .then(function (response) {

                        _this.ifvalue = false;

                        _this.valueDeterminate = 0;

                        _this.pagination.totalItems =  response.data.length

                        _this.list = response.data;

                        console.log(_this.gridOptions.api)


                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },


            onSelectionChanged(faiz){



                this.lista.titulo = faiz.titulo;
                this.lista.status = faiz.status;
                this.lista.imagen = faiz.imagen;
                this.lista.created_at = faiz.created_at;



                this.dialog = true;



            },
        },

        computed: {
            pages () {
                if (this.pagination.rowsPerPage == null ||
                    this.pagination.totalItems == null
                ) return 0

                return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage)
            }
        }

    }
</script>

<style scoped>


    .lettle{
        font-size: 18px;
        padding: 30px;
    }

    .cabezas{

        background-image: linear-gradient(to bottom right, #F4F4F4, #ABABAB);
    }

    .points{
        font-size: 18px;
        cursor: pointer;

    }

    .parr{

        padding: 3px;
    }


    .mono{
        font-size: 15px ;

    }

    .ime{
        width:100px;
        height: 50px;


    }

    .ime10{
        width:250px;
        height: 100px;
        margin: 50px;

    }

    .links{
        font-size: 15px;

    }

    .links3{

        color: black;
        text-decoration: none;
    }

    .slider{

        padding-top: 60px;
        height: 600px !important;
        width: 100% !important;
        position: relative !important;
    }

    .images{
        width:100%;
        height: 500px;

    }

    .images02{
        width:100%;
        height: 300px;

    }

    .heights{
        height: auto;

    }

    .images03{

        width: 100%;
        height: 300px;

    }

    .emp{

        font-size: 32px;
        font-weight: bold;
    }

    .images04{

        width: 100%;
        height: 600px;
        padding-top: 60px;

    }

    .images05{

        width:400px;
        height: 300px;
        float: right;
        margin-left: 15px;

    }



    .images06{

        width:400px;
        height: 300px;
        float: left;
        margin-right: 15px;



    }

    .emp2 {

        font-size: 24px;
        font-weight: bold;

    }


    .grey.darken-1{

        padding: 2px !important;
        width: 100%;
        margin-top: 3px;


    }

    .images07{

        width: 100%;
        height: 300px;
    }

    .pad{
        padding:15px ;
        max-width: 1400px;
        margin: 0;
    }
    @media screen and (max-width: 1264px) and (min-width: 961px){

        .lettle{
            font-size: 18px;
            padding: 30px;
        }

        .cabezas{

            background-image: linear-gradient(to bottom right, #F4F4F4, #ABABAB);
        }

        .points{
            font-size: 18px;
            cursor: pointer;

        }

        .parr{

            padding: 3px;
        }


        .mono{
            font-size: 15px ;

        }

        .ime{
            width:100px;
            height: 50px;


        }

        .ime10{
            width:250px;
            height: 100px;
            margin: 50px;

        }

        .links{
            font-size: 15px;

        }

        .links3{

            color: black;
            text-decoration: none;
        }

        .slider{

            padding-top: 60px;
            height: 600px !important;
            width: 100% !important;
            position: relative !important;
        }

        .images{
            width:100%;
            height: 500px;

        }

        .images02{
            width:100%;
            height: 300px;

        }

        .heights{
            height: auto;

        }

        .images03{

            width: 100%;
            height: 300px;

        }

        .emp{

            font-size: 32px;
            font-weight: bold;
        }

        .images04{

            width: 100%;
            height: 600px;
            padding-top: 60px;

        }

        .images05{

            width:400px;
            height: 300px;
            float: right;

        }



        .images06{

            width:450px;
            height: 400px;
            float: left;

        }

        .emp2 {

            font-size: 24px;
            font-weight: bold;

        }


        .grey.darken-1{

            padding: 2px !important;
            width: 100%;
            margin-top: 3px;


        }

        .images07{

            width: 100%;
            height: 300px;
        }



    }

    @media screen and (max-width: 960px) and (min-width: 601px){

        .images05{

            width:300px;
            height: 250px;
            float: right;

        }



        .images06{

            width:300px;
            height: 250px;
            float: left;

        }

        .links{
            font-size: 10px;
            padding: 2px;
            width: 75px;
            min-width: 20px;

        }

        .slider{

            padding-top: 50px;
            height: 500px !important;
            width: 100% !important;
            position: relative !important;
        }

        .images{
            width:100%;
            height: 400px;

        }

        .images04{

            width: 100%;
            height: 300px;
            padding-top: 48px;

        }


        .images07{

            width: 100%;
            height: 300px;
        }

    }

    @media screen and (max-width: 600px) {
        .links{
            display: none;
        }

        .images05{

            width:100%;
            height: 250px;
            float: none;
            margin: 0;

        }


        .images06{

            width:100%;
            height: 250px;
            float: none;
            margin: 0;

        }


        .slider{

            padding-top: 50px;
            height: 300px !important;
            width: 100% !important;
            position: relative !important;
        }

        .images{
            width:100%;
            height: 200px;

        }

        .images04{

            width: 100%;
            height: 300px;
            padding-top: 42px;

        }

        .ime10{
            width:250px;
            height: 100px;
            margin: 10px;

        }

        .grey.darken-2{

            padding: 2px !important;
            width: 100%;
            margin-top: 15px;

        }

        .images07{

            width: 100%;
            height: 150px;
        }



    }

</style>
