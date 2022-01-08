<template>
    <div class="container">
        <product 
            v-for="product in products" 
            :key="product.id" 
            :product="product"  class="product"/>
    </div>
</template>

<script>
import Product from '../components/Product.vue';

export default {
    components: {Product},
    props: { genderId: Number },

    data: function () {
        return {
            products: [],
            categoryId: null,
            brandId: null,
            sizeId: null,
        };
    },
    methods: {
        getProducts() {
            axios
                .get(
                    "/api/getProductsByGender/" + this.$props.genderId,
                    this.products
                )
                .then((res) => {
                    this.products = res.data.products;
                })
                .catch((err) => {
                    console.log(err.data);
                });
        },

        getProductsByCategory() {
            this.emitter.on('products-by-categories', categoryId => {
                this.categoryId = categoryId;
                   axios
                    .get(
                        "/api/genderAndCategory/" + this.$props.genderId + "-" + this.categoryId,
                        this.products
                    )
                    .then((res) => {
                        this.products = res.data.products;
                    })
                    .catch((err) => {
                        console.log(err.data);
                    });
            });
        },

        getProductsByBrand() {
            this.emitter.on('products-by-brands', brandId => {
                this.brandId = brandId;
                    axios
                     .get("/api/genderAndBrand/" + this.$props.genderId + "-" + this.brandId,
                      this.products).then((res) => {
                          this.products = res.data.products;
                      })
                      .catch((err) => {
                          console.log(err.data);
                      });
            });
        },

        getProductsBySize() {
            this.emitter.on('products-by-sizes', sizeId => {
                this.sizeId = sizeId;
                    axios
                     .get("/api/genderAndSize/" + this.$props.genderId + "-" + this.sizeId,
                     this.products).then((res) => {
                         this.products = res.data.products;
                     }).catch((err) => {
                         console.log(err.data);
                     })
            });
        }
        
    },
    mounted() {
        this.getProducts();
        this.getProductsByCategory();
        this.getProductsByBrand();
        this.getProductsBySize();
    },
};
</script>

<style lang='scss' scoped>
.container {
    width: 88vw;
    display: grid;
    justify-items: center;
    grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
    padding: 25px;
}
</style>
