<template>
    <div class="split-screen">
        <div class="left">
            <div class="txt-content">
                <h2>Join our community</h2>
                <p>Over 1000 discount offers for registered users.</p>
            </div>
        </div>
        <div class="right">
            <div class="loginForm">
                <h2 id="title">Login</h2>
                <div class="alert alert-success" v-show="success">
                    Successfully logged in.
                </div>
                <div class="input-container name">
                    <label for="email">Email</label>
                    <input type="email" name="email" v-model="user.email" />
                    <div
                        class="alert alert-danger"
                        v-if="errors.email && errors"
                    >
                        {{ errors.email[0] }}
                    </div>

                    <label for="password">Password</label>
                    <input
                        type="password"
                        name="password"
                        v-model="user.password"
                    />
                    <div
                        class="alert alert-danger"
                        v-if="errors.password && errors"
                    >
                        {{ errors.password[0] }}
                    </div>
                    <div class="createAccount">
                        <p>Don't have an account?</p>
                        <router-link to="register">Create one</router-link>
                    </div>

                    <button id="btn" type="submit" @click.prevent="loginUser">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
    <Footer />
</template>

<script>
import Footer from '../components/Footer.vue';

export default {
    components: {Footer},
    data: function () {
        return {
            user: {
                email: "",
                password: "",
            },
            errors: {},
            success: false,
        };
    },

    methods: {
        loginUser() {
            this.success = false;
            this.errors = "";
            axios
                .post("/api/login", this.user)
                .then((res) => {
                    console.log("logged");
                    this.success = true;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                    console.log("Error has occured.");
                });
        }
        ,
    },
};
</script>

<style scoped>
.split-screen {
    margin-top: 83px;
    display: flex;
    flex-direction: column;
}



.left,
.right {
    display: flex;
    justify-content: center;
    align-items: center;
}
.left {
    background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
        url("/images/register_img.jpg");
    height: 80vh;
    background-size: cover;
    border-right: 0.2px solid gray;
}
.txt-content {
    color: white;
    text-align: center;
    -webkit-font-smoothing: antialiased;
    text-transform: uppercase;
}
.txt-content h2 {
    font-family: Poppins, Montserrat, Helvetica, Arial;
    font-size: 38px;
    text-shadow: 2px 2px black;
    font-weight: bolder;
    letter-spacing: 5px;
}
.loginForm {
    padding: 50px 0;
    color: black;
    text-align: center;
    width: 328px;
}

.loginForm input {
    display: block;
    width: 100%;
    box-sizing: border-box;
    border-radius: 8px;
    border: 1px solid #c4c4c4;
    padding: 1em;
    margin-bottom: 1.25rem;
    font-size: 0.875;
}

.loginForm label {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 0.75rem;
}
.createAccount {
    display: flex;
    justify-content: center;
}

.createAccount a {
    padding-left: 5px;
}
#title {
    padding-bottom: 20px;
    font-family: 'Montserrat';
    text-transform: uppercase;
}

#btn {
    display: block;
    width: 100%;
    background-color: black;
    color: white;
    font-weight: 700;
    border: none;
    padding: 1rem;
    border-radius: 8px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

#btn:hover {
    background-color: rgb(53, 53, 53);
    cursor: pointer;
}
@media screen and (min-width: 900px) {
    .split-screen {
        flex-direction: row;
        height: 100vh;
    }
    .left,
    .right {
        display: flex;
        width: 50%;
        height: auto;
    }
}
</style>
