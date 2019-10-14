<template>
    <div>
        <v-toolbar  light color="#F2F5F8" fixed tabs >
            <v-toolbar-side-icon @click="desvanecer()" class="hidden-sm-and-up" ></v-toolbar-side-icon>
            <img src="../../../../public/images/logo_iglesia-07.png" class="ime"  >
            <v-spacer></v-spacer>
            <v-toolbar-title style="font-size: 12px" class="hidden-sm-and-up">

                <v-badge color="red" class="bab">
                    <template v-slot:badge>
                        <span>{{contador}}</span>
                    </template>


                    <v-menu :nudge-width="100">
                        <template v-slot:activator="{ on }">

                            <v-icon
                                    large
                                    color="blue"
                                    v-on="on"
                            >
                                mail
                            </v-icon>

                        </template>

                        <v-list
                        >
                            <v-list-tile
                                    v-for="list in listas02"
                                    :key="list.titulo"


                            >

                                <v-list-tile-content class="mar" @click="notifi">
                                    <v-list-tile-title>{{list.titulo}}</v-list-tile-title>
                                    <v-list-tile-sub-title>publicado en {{list.tabla}}</v-list-tile-sub-title>
                                    <v-list-tile-sub-title>{{moment(list.created_at).format('DD/MM/YYYY HH:mm')}}</v-list-tile-sub-title>


                                </v-list-tile-content>

                            </v-list-tile>
                        </v-list>


                        <v-btn dark small color="rgb(63, 81, 181)" @click="contacto" >Cerrar</v-btn>


                    </v-menu>






                </v-badge>


            </v-toolbar-title>
            <v-toolbar-items  >
                <v-toolbar-items class="hidden-xs-and-down" >

                    <v-btn class="links" flat to="/principal">Contactos</v-btn>
                </v-toolbar-items>

                <v-toolbar-items class="hidden-xs-and-down" >

                    <v-btn class="links" flat to="verofrenda">Ofrendas</v-btn>
                </v-toolbar-items>




                <v-toolbar-items class="hidden-xs-and-down" >

                    <v-btn class="links" to="vereventos" flat>Eventos</v-btn>
                </v-toolbar-items>

                <v-toolbar-items class="hidden-xs-and-down" >
                    <v-menu :nudge-width="100">
                        <template v-slot:activator="{ on }">
                            <v-btn class="links" flat v-on="on" >Sermon</v-btn>

                        </template>

                        <v-list dense
                        >
                            <v-list-tile
                            >

                                <p class="points" @click="verpredica" >Predica</p>
                            </v-list-tile>
                        </v-list>

                        <v-list dense
                        >
                            <v-list-tile
                            >

                                <p class="points" @click="verdevo" >Devocional</p>

                            </v-list-tile>
                        </v-list>








                    </v-menu>

                    <!--<v-btn class="links" to="/verpredica" flat >Predica</v-btn>-->
                </v-toolbar-items>


                <v-toolbar-items class="hidden-xs-and-down" >

                    <v-btn class="links" to="/verminisgalery" flat >Ministerio</v-btn>
                </v-toolbar-items>



                <v-toolbar-items class="hidden-xs-and-down" >

                    <v-btn class="links" @click="logout" flat >Cerrar Session</v-btn>
                </v-toolbar-items>

                <v-badge color="red" class="bab2">
                    <template v-slot:badge>
                        <span>{{contador}}</span>
                    </template>


                    <v-menu :nudge-width="100">
                        <template v-slot:activator="{ on }">

                            <v-icon
                                    large
                                    color="blue"
                                    v-on="on"
                            >
                                mail
                            </v-icon>

                        </template>

                        <v-list
                        >
                            <v-list-tile
                                    v-for="list in listas02"
                                    :key="list.titulo"


                            >

                                <v-list-tile-content class="mar" @click="notifi">
                                    <v-list-tile-title >{{list.titulo}}</v-list-tile-title>
                                    <v-list-tile-sub-title>publicado en {{list.tabla}}</v-list-tile-sub-title>
                                    <v-list-tile-sub-title>{{moment(list.created_at).format('DD/MM/YYYY HH:mm')}}</v-list-tile-sub-title>

                                </v-list-tile-content>

                            </v-list-tile>
                        </v-list>


                        <v-btn dark small color="rgb(63, 81, 181)" @click="contacto" >Cerrar</v-btn>


                    </v-menu>






                </v-badge>



            </v-toolbar-items>






        </v-toolbar>

        <v-navigation-drawer  fixed v-model="pense"   class="gray">

            <v-expansion-panel >
                <v-expansion-panel-content
                        hide-actions

                >
                    <template v-slot:header>
                        <router-link to="/principal" class="links3">Contactos</router-link>
                    </template>

                </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel >
                <v-expansion-panel-content
                        hide-actions

                >
                    <template v-slot:header>
                        <router-link to="/verofrenda" class="links3">Ofrendas</router-link>
                    </template>

                </v-expansion-panel-content>
            </v-expansion-panel>









            <v-expansion-panel >
                <v-expansion-panel-content
                        hide-actions

                >
                    <template v-slot:header>
                        <router-link to="/verenventos" class="links3">Eventos</router-link>
                    </template>

                </v-expansion-panel-content>
            </v-expansion-panel>




            <v-expansion-panel >
                <v-expansion-panel-content

                >
                    <template v-slot:header>
                        <div>Sermon</div>
                    </template>
                    <v-card>

                        <v-list dense
                        >
                            <v-list-tile
                            >

                                <p class="points" @click="verpredica" >Predica</p>
                            </v-list-tile>
                        </v-list>

                        <v-list dense
                        >
                            <v-list-tile
                            >

                                <p class="points" @click="verdevo" >Devocional</p>

                            </v-list-tile>
                        </v-list>






                    </v-card>

                </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel >
                <v-expansion-panel-content
                        hide-actions

                >
                    <template v-slot:header>
                        <router-link to="/verminisgalery" class="links3">Ministerio</router-link>
                    </template>

                </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel >
                <v-expansion-panel-content
                        hide-actions

                >
                    <template v-slot:header>
                        <router-link to="#" class="links3">Cerrar Session</router-link>
                    </template>

                </v-expansion-panel-content>
            </v-expansion-panel>


            <v-btn small dark color="#3F51B5" @click="ocul">Ocultar</v-btn>


        </v-navigation-drawer>

        <v-alert
                :value="alert"
                type="success"
                dismissible
                class="poss"

        >
            {{alert2}}

        </v-alert>


    </div>
</template>

<script>

    import Vue from 'vue'

    import VueSession from 'vue-session'


    import moment from 'moment'

    Vue.prototype.moment = moment

    Vue.use(VueSession);


    export default {
        name: "header20.vue",
        data(){

            return{

                pense:false,
                listas02:[


                ],

                alert: false,
                alert2:'',

                show:true,

                contador:null

            }
        },

        beforeCreate: function() {
            if (!this.$session.has('jwt')) {
                this.$router.push('/login')
            }
        },

        created(){


             this.getmenber();

             this.notis();

        },


        methods:{


            verpredica(){

                this.$router.push('/verpredica')


            },



            verdevo(){

                this.$router.push('/verdevocional')


            },



            notis(){

                var _this = this;

                this.axios.get('./api/login/index2',{


                })
                    .then(function (response) {


                        _this.contador = response.data;



                    })
                    .catch(function (error) {
                        console.log(error);
                    });



            },




            getmenber(){
                var _this = this;

                this.axios.get('./api/noticia',{


                })
                    .then(function (response) {


                        _this.listas02 = response.data;



                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },


            logout: function () {
                this.$session.destroy()
                this.$router.push('/login')
            },

            desvanecer() {

                this.pense = !this.pense;

            },

            ocul() {

                this.pense = false;
            },

            contacto(){

                var _this = this;
                let ids = this.$session.get('jwt');
                let uri = `./api/noticia/update/${ids}`;
                this.axios.post(uri, ids).then(response => {

                    _this.alert = true;

                    _this.alert2 = response.data;

                    setTimeout(function () {
                        _this.alert = false;
                        _this.notis();

                    }, 2000)

                });


            },

            notifi(){

                this.$router.push('/notification10')

            }
        }
    }
</script>

<style scoped>
    .mar{

        margin: 10px;
        cursor: pointer;
    }

    .ime{
        width:70px;
        height: 70px;


    }

    .links{
        font-size: 15px;
        text-align: left;

    }

    .links3{

        color: black;
        text-decoration: none;
    }

    .points{
        font-size: 18px;
        cursor: pointer;

    }

    .bab{

        margin-top: 20px;

    }

    .bab2{

        margin-top: 20px;

    }

    .poss{

        padding-top: 65px;
    }



    @media screen and (max-width: 1264px) and (min-width: 961px){

        .links{
            font-size: 10px;
            padding: 2px;
            width: 85px;
            min-width: 20px;
            text-align: left;

        }

        .bab2{

            margin-top: 10px;
            transform: scale(0.7);

        }



    }

    @media screen and (max-width: 960px) and (min-width: 601px){


        .ime{
            width:50px;
            height: 50px;


        }


        .links{
            font-size: 8px;
            padding: 2px;
            width: 75px;
            min-width: 20px;
            text-align: left;

        }

        .bab2{

            margin-top: 10px;
            transform: scale(0.5);

        }


    }

    @media screen and (max-width: 600px){

        .ime{
            width:40px;
            height: 40px;


        }

        .links{
            display: none;
        }

        .bab2{

           display: none;
        }

        .bab{

            margin-right: 50px;

        }


    }

</style>
