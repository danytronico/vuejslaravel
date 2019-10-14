<template>
    <v-footer

            height="auto"
    >

            <v-card color="#888E93"                 class="upper" flat>

                <v-layout row wrap justify-space-around>

                    <v-flex xs12 sm6 md3>
                        <img src="../../../../public/images/logo_iglesia-07.png" class="ime10">
                    </v-flex>

                    <v-flex xs12 sm6 md3>
                        <h2 style="color: black; text-align: center">© copyright. Todos los derechos reservados. Congregacion Cristiana.</h2>
                    </v-flex>

                    <v-flex xs12 sm6 md3>
                        <h2 style="color: black; text-align: center" @click="logout">Cerrar Session</h2>
                    </v-flex>

                </v-layout>
            </v-card>


    </v-footer>
</template>

<script>
    import Vue from 'vue'

    import VueSession from 'vue-session'

    Vue.use(VueSession);

    export default {
        name: "footer20.vue",
        beforeCreate: function() {
            if (!this.$session.has('jwt')) {
                this.$router.push('/login')
            }
        },

        methods:{

            logout: function () {
                this.$session.destroy()
                this.$router.push('/login')
            },
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

    .images{
        width:100%;
        height: 500px;


    }

    .slider{

        padding-top: 60px;
        height: 600px !important;
        width: 100% !important;
        position: relative !important;
    }

    .images02{
        width:100%;
        height: 150px;

    }

    .lettle{
        font-size: 18px;

    }

    .heights{
        height: auto;

    }

    .pelota{

        width: 100px;
        height: 100px;
        border-radius: 100%;
    }

    .predicas{

        font-size: 18px;
        font-weight: bold;
        text-align: right;

    }

    .predicas2{

        font-size: 25px;
        font-weight: bold;
        text-decoration: underline;

    }


    .predicas3{

        font-size: 20px;
        font-weight: normal;
        text-decoration: underline;
        padding-top: 2px;
        padding-bottom: 2px;

    }

    .cas{

        font-size: 32px;
        font-weight: bold;
        text-decoration: underline;

    }

    .pad{
        padding:5px ;
        max-width: 1400px;
    }

    .ime10{
        width:80px;
        height: 80px;


    }

    .upper{

        padding: 2px !important;
        width: 100%;
        margin-top: 3px;
    }

    .foot{

        color: black; margin-top: 30px; font-size: 18px;
    }

    @media screen and (max-width: 1264px) and (min-width: 961px){

        .links{
            font-size: 12px;
            padding: 2px;
            width: 75px;
            min-width: 20px;
            text-align: left;

        }

        .images{
            width:100%;
            height: 500px;


        }

        .slider{

            padding-top: 60px;
            height: 600px !important;
            width: 100% !important;
            position: relative !important;
        }

        .pad{
            padding:5px ;
            max-width: 1000px;
        }

        .ime10{
            width:80px;
            height: 80px;


        }

    }

    @media screen and (max-width: 960px) and (min-width: 601px){

        .foot{

            color: black; margin-top: 30px; font-size: 12px;
        }

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

        .pelota{

            width: 80px;
            height: 80px;
            border-radius: 100%;
        }

        .predicas{

            font-size: 18px;
            font-weight: bold;
            text-align: right;

        }

        .predicas2{

            font-size: 20px;
            font-weight: bold;
            text-decoration: underline;

        }

        .cas{

            font-size: 32px;
            font-weight: bold;
            text-decoration: underline;

        }

        .pad{
            padding:5px ;
            max-width: 750px;
        }

        .ime10{
            width:95%;
            height: 300px;


        }


    }

    @media screen and (max-width: 600px){

        .ime10{
            width: 95%;
            height: 300px;


        }

        .ime{
            width:40px;
            height: 40px;


        }

        .links{
            display: none;
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

        .pelota{

            width: 200px;
            height: 200px;
            border-radius: 100%;
        }

        .predicas{

            font-size: 18px;
            font-weight: bold;
            text-align: right;

        }

        .predicas2{

            font-size: 25px;
            font-weight: bold;
            text-decoration: underline;

        }

        .cas{

            font-size: 32px;
            font-weight: bold;
            text-decoration: underline;

        }

        .pad{
            padding:5px ;
            max-width: 500px;
        }

    }

</style>
