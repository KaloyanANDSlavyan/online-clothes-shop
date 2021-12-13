<template>
    <div class="announcement-bar">
        <span id="announcement-bar-content">UP TO 80% OFF</span>
    </div>
    <div class="nav-bar">
        <img id="logo" src="/images/ocs-logo.png" />
        <ul class="nav-links">
            <li><router-link to="/">Home</router-link></li>
            <li>
                <router-link to="/about">About</router-link>
            </li>
            <li>
                <router-link to="/register">Registration</router-link>
            </li>

            <li><router-link to="/login">Login</router-link></li>
        </ul>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
.nav-links {
    list-style: none;
    margin: 0;
    font-family: Montserrat, Helvetica;
    text-transform: uppercase;
    font-weight: bold;
}

.nav-links li {
    display: inline-block;
    padding: 0px 15px;
}
.nav-links a {
    transition: all 0.3s ease 0s;
    color: #000;
    text-decoration: none;
}
.nav-links a:hover {
    transition: all 0.3s ease 0s;
}
.announcement-bar {
    display: flex;
    width: 100vw - 3px;
    justify-content: center;
    align-items: center;
    align-content: center;
    background: #000;
    color: white;
}

.announcement-bar #announcement-bar-content {
    transition: all 0.3s ease 0s;
    font-weight: bold;
    padding: 3.5px 0;
}

.nav-bar {
    display: flex;
    width: 100vw - 3px;
    justify-content: space-between;
    align-content: center;
    align-items: center;
    padding: 10px 10%;
    border-bottom: 0.2px solid rgb(209, 208, 208);
}

#logo {
    cursor: pointer;
    width: 110px;
    height: 35px;
    margin: 0;
}
</style>
