<template>
  <div>
      <v-toolbar  light color="#F2F5F8" fixed tabs >
          <v-toolbar-side-icon @click="desvanecer()" class="hidden-sm-and-up" ></v-toolbar-side-icon>
          <img src="../../../../public/images/logo_iglesia-07.png" class="ime"  >
          <v-spacer></v-spacer>
          <v-toolbar-title style="font-size: 12px" class="hidden-sm-and-up">

              <v-btn flat to="/">Inicio</v-btn>

          </v-toolbar-title>
          <v-toolbar-items  >
              <v-toolbar-items class="hidden-xs-and-down" >

                  <v-btn class="links" flat to="/">Inicio</v-btn>
              </v-toolbar-items>

              <v-toolbar-items class="hidden-xs-and-down" >

                  <v-btn class="links" flat to="/nosotros">Nosotros</v-btn>
              </v-toolbar-items>

              <v-toolbar-items class="hidden-xs-and-down" >

                  <v-menu :nudge-width="100">
                      <template v-slot:activator="{ on }">
                          <v-btn class="links" flat v-on="on" >Ministerio</v-btn>

                      </template>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="minishombre" >Hombre</p>
                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="minismujeres" >Mujer</p>

                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="matrimonio" >Matrimonio</p>

                          </v-list-tile>
                      </v-list>


                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="ninios()">Niños</p>

                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="jovenes()">Jovenes</p>

                          </v-list-tile>
                      </v-list>






                  </v-menu>

              </v-toolbar-items>

              <v-toolbar-items class="hidden-xs-and-down" >

                  <v-menu :nudge-width="100">
                      <template v-slot:activator="{ on }">
                          <v-btn class="links" flat v-on="on" >Anuncios</v-btn>

                      </template>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="predicas10" >Predica</p>
                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="devocionales10" >Devocional</p>

                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="eventos10" >Eventos</p>

                          </v-list-tile>
                      </v-list>





                  </v-menu>

              </v-toolbar-items>

              <v-toolbar-items class="hidden-xs-and-down" >

                  <v-btn class="links" to="/ofrendar" flat>Ofrendar</v-btn>
              </v-toolbar-items>

              <v-toolbar-items class="hidden-xs-and-down" >

                  <v-btn class="links" to="/contacto" flat >Contactenos</v-btn>
              </v-toolbar-items>
          </v-toolbar-items>



      </v-toolbar>

      <v-navigation-drawer  fixed v-model="pense"   class="gray">

          <v-expansion-panel >
              <v-expansion-panel-content
                      hide-actions

              >
                  <template v-slot:header>
                      <router-link to="/" class="links3">Inicio</router-link>
                  </template>

              </v-expansion-panel-content>
          </v-expansion-panel>

          <v-expansion-panel >
              <v-expansion-panel-content
                      hide-actions

              >
                  <template v-slot:header>
                      <router-link to="/nosotros" class="links3">Nosotros</router-link>
                  </template>

              </v-expansion-panel-content>
          </v-expansion-panel>



          <v-expansion-panel>
              <v-expansion-panel-content

              >
                  <template v-slot:header>
                      <div>Ministerios</div>
                  </template>
                  <v-card>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="minishombre" >Hombre</p>
                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="minismujeres">Mujer</p>

                          </v-list-tile>
                      </v-list>


                      <v-list dense
                      >
                          <v-list-tile
                          >
                              <p class="points" @click="matrimonio">Matrimonio</p>
                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >
                              <p class="points" @click="ninios()" >Niños</p>
                          </v-list-tile>
                      </v-list>


                      <v-list dense
                      >
                          <v-list-tile
                          >
                              <p class="points" @click="jovenes()" >Jovenes</p>
                          </v-list-tile>
                      </v-list>



                  </v-card>

              </v-expansion-panel-content>
          </v-expansion-panel>


          <v-expansion-panel>
              <v-expansion-panel-content

              >
                  <template v-slot:header>
                      <div>Anuncios</div>
                  </template>
                  <v-card>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="predicas10" >Predica</p>
                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="devocionales10" >Devocional</p>

                          </v-list-tile>
                      </v-list>

                      <v-list dense
                      >
                          <v-list-tile
                          >

                              <p class="points" @click="eventos10" >Eventos</p>

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
                      <router-link to="/ofrendar" class="links3">Ofrendar</router-link>
                  </template>

              </v-expansion-panel-content>
          </v-expansion-panel>




          <v-expansion-panel >
              <v-expansion-panel-content
                      hide-actions

              >
                  <template v-slot:header>
                      <router-link to="/contacto" class="links3">Contactenos</router-link>
                  </template>

              </v-expansion-panel-content>
          </v-expansion-panel>


          <v-btn small dark color="#3F51B5" @click="ocul">Ocultar</v-btn>


      </v-navigation-drawer>

  </div>
</template>

<script>
    export default {
        name: "header10.vue",
        data(){

            return{

                pense:false,

            }
        },

        methods:{
            // getmenber(){
            //     var _this = this;
            //
            //
            //
            //     this.axios.get('http://127.0.0.1:8081/api/publicidad/indexpublicidad')
            //         .then(function (response) {
            //
            //             _this.publicidad = response.data;
            //
            //             console.log(_this.publicidad )
            //
            //
            //
            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //         });
            //
            // },

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

            eventos10(){

                this.$router.push('/eventos')
            },

            predicas10(){

                this.$router.push('/predicas')
            },

            devocionales10(){

                this.$router.push('/devocionales')
            },

            minishombre(){

                this.$router.push('/minishombres')


            },



            minismujeres(){

                this.$router.push('/minismujeres')


            },

            matrimonio(){

                this.$router.push('/minismatrimonio')


            },

            ninios(){

                this.$router.push('/minisninios')


            },

            jovenes(){

                this.$router.push('/minisjovenes')


            },



            // contacto(){
            //
            //     this.$router.push('/contacto')
            // },
        }
    }
</script>

<style scoped>

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



    @media screen and (max-width: 1264px) and (min-width: 961px){

        .links{
            font-size: 12px;
            padding: 2px;
            width: 75px;
            min-width: 20px;
            text-align: left;

        }



    }

    @media screen and (max-width: 960px) and (min-width: 601px){


        .ime{
            width:50px;
            height: 50px;


        }


        .links{
            font-size: 10px;
            padding: 2px;
            width: 75px;
            min-width: 20px;
            text-align: left;

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



    }

</style>
