<template>
    <v-footer

            height="auto"
    >
        <v-card

                tile
                color="#A8B4BC"
                class="upper"

        >
            <v-layout row wrap justify-space-around>

                <v-flex xs12 sm3 md3>
                    <img src="../../../../public/images/logo_iglesia-07.png" class="ime10">
                </v-flex>

                <v-flex xs12 sm3 md3>
                    <h1>Horarios</h1>

                    <ul  class="foot">



                        <li>
                            <p>Jueves   7:30 pm</p>
                        </li>

                        <li>
                            <p>Domingos 9:30 am</p>
                        </li>







                    </ul>
                </v-flex>

                <v-flex xs12 sm3 md3>

                    <h1>Contactos</h1>

                    <ul  class="foot">


                        <li>
                            <p>Direccion: Santiago:
                                Cerros de Gurabo II,
                                Calle 4, #12, Santiago ,República Dominicana.</p>
                        </li>



                        <li>
                            <p>Telefonos: +1 809-247-4811 </p>
                        </li>

                        <li>
                            <p>Correo: decasystem@hotmail.com </p>
                        </li>

                    </ul>
                </v-flex>
            </v-layout>
            <v-card color="#888E93" flat>

                <v-layout row wrap justify-center>
                    <v-flex xs12 sm6 md4>
                        <h2 style="color: black; text-align: center">© copyright. Todos los derechos reservados. Congregacion Cristiana</h2>
                    </v-flex>

                </v-layout>
            </v-card>

        </v-card>
    </v-footer>
</template>

<script>
    export default {
        name: "footer10.vue"
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
        width:200px;
        height: 200px;


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
            width:200px;
            height: 200px;


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
            width:200px;
            height: 200px;


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

        .ime10{
            width:95%;
            height: 95%;


        }

    }
</style>
