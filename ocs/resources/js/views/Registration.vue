<template>
    <div class="split-screen">
        <div class="left">
            <div class="text-content">
                <h2>Lorem Ipsum Dolor</h2>
                <p>lorem ipsum lorem ipsum</p>
            </div>
        </div>
        <div class="right">
            <div class="regForm">
                <h2 id="title">Register</h2>
                <div class="alert alert-success" v-show="success">
                    Successfully registered.
                </div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" v-model="user.name" />
                <div class="alert alert-danger" v-if="errors && errors.name">
                    {{ errors.name[0] }}
                </div>

                <label for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    v-model="user.email"
                />
                <div class="alert alert-danger" v-if="errors.email && errors">
                    {{ errors.email[0] }}
                </div>

                <label for="password">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    v-model="user.password"
                />
                <div
                    class="alert alert-danger"
                    v-if="errors.password && errors"
                >
                    {{ errors.password[0] }}
                </div>

                <label for="address">Address</label>
                <input
                    type="text"
                    name="address"
                    id="address"
                    v-model="user.address"
                />
                <div class="alert alert-danger" v-if="errors.address && errors">
                    {{ errors.address[0] }}
                </div>
                <br />

                <button id="btn" type="submit" @click.prevent="saveForm">
                    Register
                </button>
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
                name: "",
                username: "",
                email: "",
                password: "",
                password_confirmation: "",
                address: "",
            },

            errors: [],
            success: false,
        };
    },

    methods: {
        saveForm() {
            this.success = false;
            this.errors = "";
            axios
                .post("/api/register", this.user)
                .then((res) => {
                    console.log("saved");
                    this.success = true;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    console.log("Error occured!");
                });
        },
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

.alert {
  margin-bottom: 1px;
  height: 30px;
  line-height:30px;
  padding:0px 15px;
}

.left {
    background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
        url("/images/signup_img.jpg");
        background-position: center;
    height: 80vh;
    background-size:cover ;
    border-right: 0.2px solid gray;
}

.text-content {
    color: white;
    text-align: center;
    -webkit-font-smoothing: antialiased;
    text-transform: uppercase;
}
.text-content h2 {
    font-family: Poppins, Montserrat, Helvetica, Arial;
    font-size: 38px;
    text-shadow: 2px 2px black;
    font-weight: bolder;
    letter-spacing: 5px;
}
.regForm {
    padding: 50px 0;
    color: black;
    text-align: center;
    width: 328px;
}

.regForm input {
    display: block;
    width: 100%;
    box-sizing: border-box;
    border-radius: 8px;
    border: 1px solid #c4c4c4;
    padding: 0.6em;
    margin-bottom: 1.25rem;
    font-size: 0.875;
}
.regForm label {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 0.75rem;
}
#btn {
    display: block;
    width: 100%;
    background-color: black;
    color: white;
    font-weight: 700;
    border: none;
    padding: 0.6rem;
    border-radius: 8px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
#title {
        padding-bottom: 20px;
    font-family: 'Montserrat';
    text-transform: uppercase;
}

#btn:hover {
    background-color: rgb(53, 53, 53);
    cursor: pointer;
}

@media screen and (min-width: 900px) {
    .split-screen {
        flex-direction: row;
        height: max-content;
    }
    .left,
    .right {
        display: flex;
        width: 50%;
        height: 100vh;
    }
}
</style>
