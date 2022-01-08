<template>
    <NavBar />
    <router-view />
    
</template>

<script>
import NavBar from "./components/NavBar.vue";

export default {
    components: { NavBar },
};
</script>

<style scoped>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}
html, body {
    display: block;

    height: 100%;
}



</style>
