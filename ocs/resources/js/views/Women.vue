<template>
      <div class="mainContent">
        <side-bar  class="sideBar"/>
        <div class="productsContainer"> 
            <clothes-by-gender :genderId="id" />
        </div>
    </div>
</template>

<script>
import ClothesByGender from "../components/ClothesByGender.vue";
import SideBar from "../components/SideBar.vue";

export default {
    components: { ClothesByGender, SideBar },
    data: function () {
        return {
            id: 2, //  women
        };
    },
};
</script>

<style lang='scss' scoped>

@import '/css/men_women.scss';

</style>
