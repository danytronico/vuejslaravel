<template>
    <div>
        <router-view></router-view>

    </div>
</template>

<script>
    export default {
        name: "App.vue"
    }
</script>

<style lang="scss">

    @import "../../../node_modules/ag-grid-community/dist/styles/ag-grid.css";
    @import "../../../node_modules/ag-grid-community/dist/styles/ag-theme-balham.css";

    .v-list__tile{

        height: auto;


    }

    .application--wrap{

        font-family: 'Open Sans', sans-serif;
    }

    .v-list__tile__title{
        height: auto;
    }

    .v-parallax__image{
        transform: none;
        width: 100%;
        height: 500px;

    }

    .v-responsive{

        height: auto !important;
    }

</style>
