<template>
    <div @click.prevent="openProduct(product.id)" class="product">
        <div class="product-inner">
            <div class="product-image-wrap">
                <img :src="`/images/${product.header}`" class="image" />
            </div>
            <div class="product-detail">
                <div class="product-text-wrap">
                <h2>{{ product.brand }}</h2>
                </div>
                <h3>{{ product.model }}</h3>
                <p>${{  product.price }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['product'],
    methods: {
        openProduct(id) {
            this.$router.push({ path: "/products/" + id }); //redirects to specific product
        },
    }
}
</script>

<style lang='scss' scoped>
 .product {
     flex: 1 1 33.333%;
     max-width: 350px;
    cursor: pointer;
     width: 100%;
     padding: 20px;
     transition: transform 0.5s;
     transform: scale(0.95);

    &:hover {
        transform: scale(0.98);
    }

 .product-inner {
     background-color: white;
     position: relative;
     padding: 25px;
     box-shadow: 0px 0px 16px rgba(0, 0, 0, .25);
     transition: box-shadow 0.5s;

     &:hover {
        box-shadow: 0px 0px 24px rgba(0, 0, 0, .45); 
     }
 }
 .product-image-wrap {
     position: relative;
     height: 250px;
     width: 100%;

     .image {
        width: 100%;
        height: 100%;
        border-radius: 6px;
    }

 }
 .product-text-wrap {

     h2 {
         color: #313131;
         font-family: 'Poppins';
         font-size: 28px;
         font-weight: 900;
     }
 }
    .product-detail {
        background-color: #FFF;
        padding: 20px;
        margin: 0px -25px -25px;

        p {
            font-size: 14px;
            line-height: 1.5;
            font-weight: 200;
            color: #676767;
        }
    }
 }
</style>