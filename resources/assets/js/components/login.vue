<template>
    <v-app>

        <header10></header10>

        <v-parallax
                dark
                :src="require('../../../../public/images/login01.jpg')"
                class="parallaz"
                height="800px"
        >
            <v-layout row wrap align-center justify-center>
                <v-flex xs12 sm6 md4 lg4>

                    <v-alert
                            :value="alert"
                            type="success"
                            dismissible

                    >
                        {{alert2}}

                    </v-alert>

                    <v-alert
                            :value="alert3"
                            type="error"
                            dismissible

                    >
                        {{alert4}}

                    </v-alert>




                    <v-card color="#FAFAFA">
                        <v-container>
                            <v-layout>
                                <v-flex xs12 sm12 md12>


                                    <v-layout row wrap justify-center>
                                        <v-flex xs12 sm6 md6>
                                            <v-card-title class="emp">Login de la Administración </v-card-title>
                                        </v-flex>
                                    </v-layout>
                                    <v-form
                                            ref="form"
                                            v-model="valid"
                                            lazy-validation

                                    >
                                        <v-layout row wrap>
                                            <v-flex xs12 sm12 md12>
                                                <v-text-field
                                                        label="Usuario"
                                                        v-model="login.usuario"
                                                        type="text"
                                                        :rules="nameRules"
                                                        @keypress.enter="enviarlogin"

                                                ></v-text-field>
                                            </v-flex>
                                        </v-layout>

                                        <v-layout row wrap>
                                            <v-flex xs12 sm12 md12>
                                                <v-text-field
                                                        label="Clave"
                                                        v-model="login.clave"
                                                        type="password"
                                                        :rules="telRules"
                                                        @keypress.enter="enviarlogin"

                                                ></v-text-field>
                                            </v-flex>
                                        </v-layout>



                                        <v-layout row wrap justify-center>
                                            <v-flex xs4 sm4 md4 >
                                                <v-btn dark color="rgb(63, 81, 181)"  @click="enviarlogin">Enviar</v-btn>
                                            </v-flex>

                                            <v-flex xs4 sm4 md4 >
                                                <v-btn dark color="error" @click="reset">reiniciar</v-btn>
                                            </v-flex>
                                        </v-layout>


                                    </v-form>

                                </v-flex>

                            </v-layout>
                        </v-container>

                    </v-card>

                </v-flex>

            </v-layout>
        </v-parallax>

        <footer10></footer10>
    </v-app>


</template>

<script>
    import header10 from './header10'
    import footer10 from './footer10'

    import Vue from 'vue'

    import VueSession from 'vue-session'
    Vue.use(VueSession)


    export default {
        name: "login.vue",
        components:{header10,footer10},
        data(){

            return{
                alert: false,
                alert2: '',

                alert3: false,
                alert4: '',

                valid: true,

                login:{usuario:'',clave:''},
                // form:{nombre:'',telefono:'',correo:'',comentario:''},
                nameRules: [
                    v => !!v || 'El usuario es requerido',
                ],

                telRules: [
                    v => !!v || 'La clave es requerido',
                ],


            }
        },

        methods:{


            enviarlogin(){
                var _this = this;
                var logForm2 = this.toFormData(this.login);

                this.axios.post('./api/login/auth', logForm2).then(function (response3) {


                    console.log(response3.data[0].id)


                    if(response3.data === 'error'){

                        _this.alert3 = true

                        _this.alert4 = 'revisa el usuario y clave';
                    }
                    else{

                        _this.alert = true

                        _this.alert2 = 'logeado correctamente';
                        _this.login = {usuario: '', clave:''};
                        _this.$session.start();
                        _this.$session.set('jwt', response3.data[0].id);
                        _this.$session.set('jwt2', response3.data[0].usuario);

                        setTimeout(function(){
                            _this.$router.push('/principal');


                        },2000);



                    }

                }, function (err) {
                    console.log('err', err)
                })



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

        }

    }
</script>

<style scoped>




    .parallaz{
        width: 100%;
        height: 700px;
        padding-top: 60px;

    }

    .emp{

        font-size: 21px;
        font-weight: bold;
    }



    @media screen and (max-width: 1264px) and (min-width: 961px){


        .parallaz{
            width: 100%;
            height: 600px;
            padding-top: 60px;

        }




    }

    @media screen and (max-width: 960px) and (min-width: 601px){


        .parallaz{
            width: 100%;
            height: 400px;
            padding-top: 48px;

        }


    }

    @media screen and (max-width: 600px){



        .parallaz{
            width: 100%;
            height: 400px;
            padding-top: 42px;

        }

    }

</style>
