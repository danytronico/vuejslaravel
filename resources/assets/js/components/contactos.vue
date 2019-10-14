<template>
    <v-app>

        <header10></header10>
        <img src="../../../../public/images/contacto.jpg" class="images04" data-aos="fade">

        <v-card color="#FFFFFF" data-aos="fade">


            <v-layout row wrap align-center justify-center>
                <v-flex xs12 sm12 md12>

                    <v-progress-linear v-if="ifvalue" v-model="valueDeterminate"></v-progress-linear>


                    <v-alert
                            :value="alert"
                            type="success"
                            dismissible

                    >
                        {{alert2}}

                    </v-alert>




                    <v-container>
                        <v-layout row wrap justify-center>
                            <v-flex xs12 sm6 md4>



                                <v-layout row wrap justify-center>
                                    <v-flex xs12 sm6 md4>
                                        <v-card-title class="emp">Contactenos</v-card-title>
                                    </v-flex>
                                </v-layout>
                                <v-form
                                        ref="form"
                                        v-model="valid"
                                        lazy-validation

                                >

                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md12>
                                            <input

                                                    v-model="form.tabla"
                                                    type="hidden"


                                            />
                                        </v-flex>
                                    </v-layout>


                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md12>
                                            <v-text-field
                                                    label="Nombre"
                                                    v-model="form.nombre"
                                                    type="text"
                                                    :rules="nameRules"


                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>

                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md12>
                                            <v-text-field
                                                    label="Teléfono"
                                                    v-model="form.telefono"
                                                    type="text"
                                                    :rules="telRules"

                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>


                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md12>
                                            <v-text-field
                                                    label="Correo"
                                                    v-model="form.correo"
                                                    type="text"
                                                    :rules="emailRules"

                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>

                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md12>
                                            <v-textarea
                                                    label="Comentario"
                                                    v-model="form.comentario"
                                                    :rules="commentRules"


                                            ></v-textarea>
                                        </v-flex>
                                    </v-layout>

                                    <v-layout row wrap justify-center>
                                        <v-flex xs4 sm4 md4 >
                                            <v-btn dark color="rgb(63, 81, 181)"  @click="submit">Enviar</v-btn>
                                        </v-flex>

                                        <v-flex xs4 sm4 md4 >
                                            <v-btn dark color="error" @click="reset">reiniciar</v-btn>
                                        </v-flex>
                                    </v-layout>


                                </v-form>

                            </v-flex>

                        </v-layout>
                    </v-container>


                </v-flex>

            </v-layout>

        </v-card>

        <footer10></footer10>
    </v-app>


</template>

<script>
    import header10 from './header10'
    import footer10 from './footer10'

    export default {
        name: "contactos.vue",
        components:{header10,footer10},
        data(){

            return{

                ifvalue:false,

                valueDeterminate: 0,

                alert: false,
                alert2: '',

                valid: true,

                form:{nombre:'',telefono:'',correo:'',comentario:'',tabla:'contactos'},
                nameRules: [
                    v => !!v || 'El Nombre es requerido',
                    v => (v && v.length <= 70) || 'El nombre debe tener un maximo 20 caracteres'
                ],

                telRules: [
                    v => !!v || 'El Teléfono es requerido',
                    v => (v && v.length <= 20) || 'El telefono debe tener un maximo 20 caracteres'
                ],

                emailRules: [
                    v => !!v || 'El E-mail es requerido',
                    v => /.+@.+/.test(v) || 'E-mail debe ser valido'
                ],

                commentRules: [
                    v => !!v || 'El comentario es requerido',
                    v => (v && v.length <= 499) || 'El comentario debe tener un maximo 200 caracteres'
                ],


            }
        },

        methods:{


            submit(){
                if (this.$refs.form.validate()) {

                    var _this = this;

                    var logForm = this.toFormData(this.form);
                    this.axios.post('./api/contacto/create', logForm , {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },

                        onUploadProgress(uploadEvent){

                            _this.ifvalue = true;

                           _this.valueDeterminate = Math.round((uploadEvent.loaded / uploadEvent.total)*100);

                           console.log(_this.valueDeterminate)
                        }


                    })
                        .then(function(response){
                            _this.alert = true;
                            _this.alert2 = response.data;

                            console.log( response.data);


                            _this.$refs.form.reset();

                            setTimeout(function () {
                                _this.alert = false;
                                _this.ifvalue = false;

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
        }

    }
</script>

<style scoped>

    .images04{

        width: 100%;
        height: 600px;
        padding-top: 60px;

    }

    .emp{

        font-size: 32px;
        font-weight: bold;
    }




    @media screen and (max-width: 1264px) and (min-width: 961px){
        .images04{

            width: 100%;
            height: 600px;
            padding-top: 60px;

        }


    }

    @media screen and (max-width: 960px) and (min-width: 601px){
        .images04{

            width: 100%;
            height: 400px;
            padding-top: 48px;

        }


    }

    @media screen and (max-width: 600px){

        .images04{

            width: 100%;
            height: 300px;

        }

    }
</style>
