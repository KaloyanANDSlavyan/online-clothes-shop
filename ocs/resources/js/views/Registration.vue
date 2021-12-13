<template>
    <div class="leftSection">
        <h2>Register</h2>
        <div class="regForm">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" v-model="user.name" />
            <div class="alert alert-danger" v-if="errors && errors.name">
                {{ errors.name[0] }}
            </div>

            <label for="username">Username</label>
            <input
                type="text"
                name="username"
                id="username"
                v-model="user.username"
            />
            <div class="alert alert-danger" v-if="errors.username && errors">
                {{ errors.username[0] }}
            </div>

            <label for="password">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                v-model="user.password"
            />
            <div class="alert alert-danger" v-if="errors.password && errors">
                {{ errors.password[0] }}
            </div>

            <label for="password_confirmation">Confirm Password</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                v-model="user.password_confirmation"
            />

            <label for="email">Email</label>
            <input type="email" name="email" id="email" v-model="user.email" />
            <div class="alert alert-danger" v-if="errors.email && errors">
                {{ errors.email[0] }}
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

            <button
                class="btn btn-primary"
                type="submit"
                @click.prevent="saveForm"
            >
                Register
            </button>
        </div>
    </div>
</template>

<script>
export default {
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
        };
    },

    methods: {
        saveForm() {
            axios
                .post("/api/register", this.user)
                .then((res) => {
                    console.log("saved");
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
.leftSection {
    display: block;
    width: 45%;
    height: 100vh;
    background-color: white;
}

.leftSection h2 {
    padding-top: 35px;
    padding-left: 50%;
}

.regForm {
    display: flex;
    width: calc(100% / 2);
    align-items: center;
    padding: 30px 0 0 45%;
    margin: auto;
}

.rightSection {
    position: absolute;
    float: right;
    width: 55%;
    height: 100vh;
    border-right: 0.2px solid gray;
}
.rightSection .img {
    display: block;
    height: 100%;
    width: 100%;
    background-image: url("/images/register_img.jpg");
    background-repeat: space;
    background-size: cover;
}
</style>
