<template>
<div class="split-screen">
    <div class="left">
        <div class="gallery-container">
             <div class="gallery">
                <div v-for="image in product.images" :key="image.id">
                    <img :src="`/images/${image.link}`" @click="changeImage(image.link)"/>
                </div>
            </div>
            <img  class="header" :src="`/images/${currentUrl}`" alt="">
        </div>
    </div>
    <div class="right">
        <div class="content">
            <div class="mainSection">
                <h3 id="brand">{{ computedProduct.brand }}</h3>
                <h2 id="model">{{ computedProduct.model }}</h2>
            </div>
            <div class="details">
                <p>{{ product.category }}</p>
                <p>{{ computedProduct.gender }}</p>
                <p id="price">${{ computedProduct.price }}</p>
                <div class="sizes">
                    <div v-for="obj in product" :key="obj.id" class="size">{{ obj.size }}</div>
                </div>
                <input type="number" value="1">
            </div>

            <div class="buttons">
                <button id="cartButton">Add to cart <i class="fa fa-shopping-cart"></i> </button>
                <button id="bookmarkButton">Bookmark <i class="fa fa-heart-o"></i> </button>   
            </div>

        </div>
    </div>
</div>
<Footer />
</template>

<script>
import Footer from '../components/Footer.vue'

export default {
    components: {Footer},
    data: function () {
        return {
            product: {
                brand: "",
                model: "",
                header: "",
                category: "",
                gender: "",
                price: "",
                size: "",
                images: {},
            },
            currentUrl: null,
        };
    },
    props: ["productId"],
    computed: {
        computedProduct: function () {
            return this.product.length > 0 ? this.product[0] : "";
        },
    },
    methods: {
        getSingleProduct() {
            axios
                .get(`/api/products/${this.$route.params.id}`)
                .then((res) => {
                    this.product = res.data.product;
                    this.currentUrl = res.data.product[0].header;
                })
                .then(() => this.getImages(this.product[0].id))
                .catch((err) => {
                    console.log(err.data);
                });
        },
        getImages(id) {
            axios
                .get(
                    `/api/getImagesOfProduct/images-${id}`,
                    this.product.images
                )
                .then((res) => {
                    this.product.images = res.data.images;
                })
                .catch((err) => {
                    console.log(err.data);
                });
        },

        changeImage(imgLink) {
            this.currentUrl = imgLink;
        }
    },

    mounted: function () {
        this.getSingleProduct();
    },
};
</script>

<style lang='scss' scoped>

.split-screen {
    display: flex;
    height: max-content;
    width: 90%;
    justify-content: center;
    flex-direction: column;
    margin: 100px auto 0;
    
    .left, .right {
        display: flex;
        justify-content: center;
    }

    .right {

        .content {
            width: 80%;
            .mainSection {
                margin-bottom: 60px;
                text-align: center;
                #brand {
                    font-family: 'Montserrat';
                    font-size: 34px;
                    text-transform: uppercase;
                    letter-spacing: 7px;
                    padding: 15px 0px;
                    border-bottom: 1px solid rgb(211, 211, 211); 
                }
                #model {
                    padding: 15px 0px;
                    font-family: 'Poppins';
                    font-size: 36px;
                }
            }
            .details {
                text-align: center;
                .sizes {
                        display: flex;
                        height: 100px;
                        font-size: 1.4rem;
                        justify-content: center;
                        align-items: center;
                        align-content: center;
                    .size {
                        transition: .2s ease-in;
                        background-color: rgb(255, 255, 255);
                        font-family: 'Roboto';
                        text-transform: uppercase;
                        font-weight: 600;
                        display: block;
                        width: 60px;
                        -webkit-box-align: center;
                        align-items: center;
                        border-radius: 0.2rem;
                        padding: 0px;
                        margin: 0px 0.25rem 0.5rem;
                        border: 0.1rem solid black;
                        cursor: pointer;

                        &:hover {
                            background-color: black;
                            color: white;
                        }
                    }
                }
                #price {
                    font-style: italic;
                    font-size: 16px;

                }
                input {
                    background-color: rgb(255, 255, 255);
                    width: 15%;
                    border: 0.1rem solid black;

                }
            }
            .buttons {
                display: flex;
                height:150px;
                margin-top: 70px;
                flex-direction: column;
                justify-content: space-around;
                align-content: center;
                align-items: center;
                button {
                    transition: .2s ease-in;
                    display: block;
                    width: 70%;
                    font-weight: 700;
                    border: none;
                    padding: 1rem;
                    border-radius: 50px;
                    font-size: 0.95rem;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }
                #cartButton {
                    background-color: rgb(235, 235, 235);
                    color: black;

                    &:hover {
                        background-color: rgb(192, 192, 192);
                    }
                }
                #bookmarkButton {
                    background-color: rgb(56, 102, 255);
                    color: white;

                    &:hover {
                        background-color: rgb(47, 88, 223);
                    }
                }

            }
        }
    }
}

.gallery-container {
    display: flex;
    flex-direction: column;
    width: 100%;
    .header {
        height:750px;
        width: 100%;
        margin: 10px 0;
        border: 1px solid rgb(211, 211, 211);

    }
    .gallery {
        display: inline-flex;
        justify-content: space-between;
        width: 100%;
        img {
            height: 25vh;
            vertical-align: top;
            border: 1px solid rgb(211, 211, 211);
            cursor: pointer;
        }
    }
}

@media screen and (min-width: 1000px) {
    .split-screen {
        flex-direction: row;
    }
    .left {
        width: 60%;
    }
    .right {
        width: 40%;
    }
    .left,
    .right {
        display: flex;
        height: auto;
    }
}

@media screen and (max-width: 1000px) {
   .split-screen {
       display: flex;
       height: max-content;
   }
    .left {
        margin-bottom: 50px;
    }
 
}


</style>
