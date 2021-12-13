<template>
    <h1>yo</h1>
</template>

<script>
export default {
    data: function () {
        return {
            product: [],
        };
    },
    props: ["productId"],

    methods: {
        getSingleProduct() {
            axios
                .get("/api/getSingleProduct/" + 1)
                .then((res) => {
                    this.product = res.data.product;
                })
                .catch((err) => {
                    console.log(err.data);
                });
        },
    },

    mounted: function () {
        this.getSingleProduct();
    },
};
</script>

<style></style>
