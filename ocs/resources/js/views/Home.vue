<template>
    <div class="mainSection">
        <div class="section-1">
            <h1>Discover your style</h1>
            <div class="buttons">
                <router-link :to="{name: 'Men'}">
                    <button id="btn" type="button">Shop men <img src="/images/arrow.png" alt=""></button>
                </router-link>
                <router-link :to="{name: 'Women'}">
                    <button id="btn" type="button">Shop women <img src="/images/arrow.png" alt=""></button>
                </router-link>

            </div>
        </div>
    </div>
    <div class="section-2">
            <h3>See our newest stock:</h3>
        <div class="content">
            <product v-for="product in products"
                    :key="product.id"
                    :product="product" class="product"/>
        </div>

        <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 230">
            <path fill="#fff" fill-opacity="1" 
            d="M0,96L48,90.7C96,85,192,75,288,90.7C384,107,480,149,576,144C672,
            139,768,85,864,90.7C960,96,1056,160,1152,186.7C1248,213,1344,203,1392,197.3L1440,192L1440,320L1392,
            320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,
            320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>
    <div class="section-3">
        <div class="left">
            <div class="txt-content">
                <h4>Our inspirations, story and goods</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore rem ullam reprehenderit, deleniti reiciendis facere inventore numquam eius maxime, sint tempora qui est perspiciatis nostrum possimus debitis obcaecati! Fugit neque voluptate eligendi explicabo itaque sit, saepe temporibus velit non exercitationem praesentium! Temporibus iure, cupiditate inventore tenetur sapiente delectus aliquid expedita, ex beatae nostrum itaque nisi! In dignissimos veritatis enim recusandae dicta nisi, perferendis, et nulla voluptatum sequi doloremque, culpa quaerat impedit repellendus deserunt corporis ea! Dignissimos perferendis alias aperiam quibusdam rem minima quisquam nisi reprehenderit corporis assumenda. Minima iusto ipsa natus, dolorum accusantium, dolore nulla ex, deserunt corporis autem necessitatibus!</p>
            </div>
        </div>
        <div class="right">
            <div class="txt-content">
                <h4>Sportswear only from top brands</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur alias dolore numquam maxime dolorem animi nostrum omnis vero perspiciatis deleniti labore distinctio nihil delectus praesentium minus asperiores vitae, architecto consequatur nisi odit nemo exercitationem sunt? Ut illo commodi aperiam molestias odio in perspiciatis dolorum dolores aspernatur, nam nisi veritatis, magnam maxime, rem vel maiores optio quam ea debitis harum. Incidunt optio non molestias ullam ducimus harum deleniti qui quis dolore commodi quasi dolorem, quibusdam a! Ad delectus quibusdam harum ullam accusantium a suscipit dolorum beatae consectetur dignissimos pariatur voluptas veritatis amet, ea similique dolore magnam vero animi omnis? Maiores, ea.</p>
            </div>
        </div>
    </div>
    <div class="signup-section">
        <div class="wrapper">
            <div class="left">
                <h2>Join us to get our discount offers</h2>
            </div>
            <div class="right">
                <router-link :to="{name: 'Register'}">
                <button id="btn" type="button">Sign up for free <img src="/images/arrow.png" alt=""></button>
                </router-link>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<script>
import Product from '../components/Product.vue';
import Footer from '../components/Footer.vue';

export default {
    components: {Product, Footer},
    data: function() {
       return {
            products: [],
        }
    },
    methods: {
        getProducts() {
            axios.get('/api/most_recent', this.products)
                .then((res) => {
                    this.products = res.data.products;
                }).catch((err) => {
                    console.log(err.data);
                })
        },
        openUserReview() {
            window.open("https://forms.gle/EByBAXJv15zovGW37", "_blank");
        }
    },
    mounted: function() {
        this.getProducts();
    }
};
</script>

<style lang="scss" scoped>
.mainSection {
    display: flex;
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
        url("/images/home_img.jpg");
        background-position: center;
    height: 100vh;
    width: 100vw;
    background-size: cover;
    max-width: 100%;
    max-height: 100%;
    justify-content: space-between;
    margin: 0 auto;
    margin-top: 83px;
    border-bottom: 5px solid white;

    .section-1 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 50px;
        height: 60%;
        align-items: center;
        animation: .8s ease-out 0s 1 slideFromLeft;


        h1 {
            font-family: Poppins, Montserrat, Helvetica, Arial;
            text-shadow: 2px 2px black;
            font-size: 46px;
            font-weight: 100;
            margin: 20px 0 10px;
            color: white;
            line-height: 1;
            text-transform: uppercase;
        }
        @keyframes slideFromLeft {
              0% {
                transform: translateX(-100%);
            }
              100% {
                transform: translateX(0);
            }
        }
        .buttons {
            display: flex;
            width: 350px;
            flex-direction: column;
        }

        a {
            text-decoration: none;
            color: white;
        }

        
    }


}
    .section-2 {
        position: relative;
        display: block;
        width: 100%;
        justify-content: center;
        padding: 100px;
        box-sizing: border-box;
        background-color: #FA8BFF;
        background-image: linear-gradient(45deg, #FA8BFF 0%, #2BD2FF 52%, #2BFF88 90%);

        h3 {
            text-align: center;
            text-shadow: 2px 2px 10px gray;
            letter-spacing: 5px;
            text-transform: uppercase;
            font-family: 'Oswald';
            color: white;
            font-size: 3rem;
                        align-items: center;
            align-content: center;
            justify-content: center;
        }

        .content {
            position: relative;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
            overflow: auto;
            z-index: 3;
            align-items: center;
            align-content: center;
            justify-items: center;

        }
        .waves {
            position: absolute;
            z-index: 2;
            bottom: 0;
            left: 0;
        }
    }
            .left, .right {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    .section-3 {
        display: flex;
        background-color: #fff;
        flex-direction: column;
        padding: 70px 0;
        .txt-content {
            width: 80%;

            h4 {
                text-transform: uppercase;
                letter-spacing: 3px;
                font-size: 18px;
                font-weight: 700;
                padding: 15px 0;
            }
        }
    }

    .signup-section {
        display: flex;
        height: auto;
        background-color: #2BFF88;

        .wrapper {
            display: flex;
            width: 50%;
            padding: 50px 0;
            flex-direction: column;
            height: inherit;
            justify-content: center;
            align-items: center;
            align-content: center;
            margin: 0 auto;
            .left {
                align-content: center;
                align-items: center;
                h2 {
                    font-family: Poppins, Montserrat, Helvetica, Arial;
                    font-size: 36px;
                    text-transform: uppercase;
                    font-weight: 70;
                }
            }
            .right {

                a {
                    text-decoration: none;
                    color: white;
                }
            }

        }
    }

    #btn {
            display: inline-flex;
            width: fit-content;
            justify-content: space-between;
            align-items: center;
            box-shadow: 4px 6px 0 white;
            font-family: Montserrat, Helvetica, Arial;
            letter-spacing: 2px;
            border: 0;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 20px;
            padding: 12px 10px;
            outline: none;
            color: #fff;
            background: black;
            cursor: pointer;
            transition: .5s ease all;

            &:hover {
                color: rgb(214, 212, 212);
                 box-shadow: 8px 10px 0 rgb(214, 212, 212);
            }

            img {
                width: 40px;
                margin-left: 5px;
                justify-content: flex-end;
            }
        }

    @media screen and (min-width: 900px) {
        .section-3 {
            flex-direction: row;
        }
        .signup-section {
            flex-direction: row;
            .wrapper {
                flex-direction: row;
            }
        }
        .left, .right {
            display: flex;
            width: 70%;
            height: auto;
        } 
    }

</style>

