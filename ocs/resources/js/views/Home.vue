<template>
    <div class="home-content">
        <h6>Home page</h6>
        <div v-for="product in products" :key="product.id">
            <img :src="`images/${product.link}`" alt="" />
            <span>{{ product.brand }}</span> <br />
            <span>{{ product.model }}</span> <br />
            <span>{{ product.price }}</span> <br />
            <span>{{ product.gender }}</span> <br />
            <span>{{ product.category }}</span> <br />
            <span>{{ product.size }}</span> <br />
            <br />
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            products: [],
        };
    },
    methods: {
        getProducts() {
            axios
                .get("/api/index", this.products)
                .then((res) => {
                    this.products = res.data.products;
                })
                .catch((err) => console.log(err.data));
        },
    },
    mounted: function () {
        this.getProducts();
    },
};
</script>

<style scoped></style>
