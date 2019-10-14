<template>

    <v-app>
    <header10></header10>
    <img src="../../../../public/images/carousel-05.jpg" class="images04" data-aos="fade">

    <footer10></footer10>

    </v-app>
</template>

<script>
    import header10 from './header10'
    import footer10 from './footer10'

    export default {
        name: "ofrendar.vue",
        components:{header10,footer10},

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
            height: 270px;
            padding-top: 56px;


        }

    }

</style>
