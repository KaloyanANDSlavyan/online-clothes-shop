<template>
    <header :class="{ 'scrolled-nav': scrolledNav }">
        <div class="announcement-bar">
            <span id="announcement-bar-content">UP TO 80% OFF</span>
        </div>
        <nav>
            <div class="branding">
                <router-link :to="{ name: 'Home' }">
                    <img id="logo" src="/images/ocs-logo.png" />
                </router-link>
            </div>
            
                <ul v-show="!mobile" class="navigation">
                    <li>
                        <router-link class="link" :to="{ name: 'Men' }">Men</router-link>
                    </li>
                    <li>
                        <router-link  class="link" :to="{ name: 'Women' }">Women</router-link>
                    </li>
                    <li>
                        <router-link  class="link" :to="{ name: 'About' }">About</router-link>
                    </li>
                    <li>
                        <router-link  class="link" :to="{ name: 'Login' }">Sign In</router-link>
                    </li>
                </ul>
                <div class="icon">
                    <i @click="toggleMobileNav" v-show="mobile" class="fa fa-bars" :class="{'icon-active' : mobileNav}"></i>
                </div>
                <transition name="mobile-nav">
                    <ul v-show="mobileNav" class="dropdown-nav">
                    <li>
                        <router-link class="link" :to="{ name: 'Men' }">Men</router-link>
                    </li>
                    <li>
                        <router-link  class="link" :to="{ name: 'Women' }">Women</router-link>
                    </li>
                    <li>
                        <router-link  class="link" :to="{ name: 'About' }">About</router-link>
                    </li>
                    <li>
                        <router-link  class="link" :to="{ name: 'Login' }">Sign In</router-link>
                    </li>
                    </ul>
                </transition>
            </nav>
    </header>
</template>

<script>
export default {
    data: function() {
        return {
            scrolledNav: null,
            mobile: null,
            mobileNav: null,
            windowWidth: null
        }
    },
    created: function() {
        window.addEventListener('resize', this.checkScreen);
        this.checkScreen();
    },
    mounted: function() {
        window.addEventListener('scroll', this.updateScroll);
    },
    methods: {
        toggleMobileNav() {
            this.mobileNav = !this.mobileNav;
        },

        checkScreen() {
            this.windowWidth = window.innerWidth;
            if(this.windowWidth <= 750) {
                this.mobile = true;
                return;
            }
            this.mobile = false;
            this.mobileNav = false
            return;
        },

        updateScroll() {
            const scrollPosition = window.scrollY;
            if(scrollPosition > 50) {
                this.scrolledNav = true;
                return;
            }
            this.scrolledNav = false;
            return;
        }
    }
};
</script>

<style lang='scss' scoped>
header {
    background-color: white;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 99;
    width: 100%;
    height: 83px;
    transition: .5s ease all;
    border-bottom: 1px solid rgb(211, 211, 211);


    .announcement-bar {
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        background: #000;
        color: white;

        #announcement-bar-content {
        transition: all 0.3s ease 0s;
        font-weight: bold;
        padding: 3.5px 0;
        }  
    }

 

    nav {
        display: flex;
        flex-direction: row;
        position: relative;
        margin: 0 auto;
        width: 100%;
        padding: 10px 10%;
        transition: .5s ease all;
        @media(min-width: 1140px) {
            max-width: 1140px;
        }
            ul,
            .link {
                font-weight: 500;
                color: #000;
                list-style: none;
                text-decoration: none;
            }

             li {
                 text-transform: uppercase;
                padding: 0 15px;
                margin-left: 16px;
            }

            .link {
                font-size: 16px;
                font-weight: bold;
                font-family: Montserrat, Helvetica, Arial;
                transition: 0.5s ease all;
                padding-bottom: 4px;
                text-transform: uppercase;
                border-bottom: 1px solid transparent;

                &:hover {
                    border-color: rgb(53, 53, 53);
                }
            }

            .branding {
                display: flex;
                align-items: center;

                img {
                  width: 100px;  
                  transition: .5s ease all;
                }
            }
            .navigation {
                display: flex;
                align-items: center;
                margin: 0 auto;
                flex: 1;
                justify-content: flex-end;
            }
            .icon {
                display: flex;
                position: absolute;
                top: 0;
                align-items: center;
                right: 24px;
                height: 100%;

                i {
                    cursor: pointer;
                    font-size: 24px;
                    transition: .8s ease all;
                }
            }

            .icon-active {
                transform: rotate(180deg);
            }

            .dropdown-nav {
                display: flex;
                flex-direction: column;
                position: fixed;
                width: 100%;
                max-width: 250px;
                height: 100%;
                background-color: white;
                top: 0;
                left: 0;

                li {
                    margin-left: 0;
                    .link {
                        color: black;
                    }
                }
            }
        .mobile-nav-enter-active,
        .mobile-nav-leave-active {
            transition: 1s ease all;
        }

        .mobile-nav-enter-from,
        .mobile-nav-leave-to {
            transform: translateX(-250px);
        }

        .mobile-nav-enter-to {
            transform: translateX(0);
        }
        
    }
}
.scrolled-nav {
        height: 0px;

    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);

    nav {
        height: 0px;
        margin: 0;
        padding: 0;
    }
    .navigation {
        display: none;
    }
    .branding {
        display: none;
    }
    .icon {
        display: none;
    }

}
</style>
