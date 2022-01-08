<template>
  <div class="footer">
      <div class="socials">
          <div id="icons"><i class="fa fa-instagram"></i></div>
          <div id="icons"><i class="fa fa-facebook"></i></div>
          <div id="icons"><i class="fa fa-twitter"></i></div>
      </div>
      <ul class="list">
            <li>
                <router-link :to="{ name: 'Men'}">
                    Men
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'Women'}">
                    Women
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'About'}">
                    About
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'Login'}">
                    Sign In
                </router-link>
            </li>
          <li>
              <router-link :to="{ name: 'Register'}">
                    Sign Up
              </router-link>
          </li>
          <li>
              <a href="https://forms.gle/Tw2V83kxdwfjRPmj9" target="_blank" rel="noopener noreferrer">User Review</a>
          </li>
      </ul>
      <p id="copyright">2022 OCS Slavyan-Radoslav Inc.</p>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .footer {
        padding: 40px 0;
        background-color: rgb(31, 30, 30);
        color: white;
        position: relative;
        clear: both;

        .socials {
            display: flex;
            letter-spacing: 20px;
            justify-content: center;
            padding-bottom: 24px;
            font-size: 25px;

            i {
                transition: .3s ease all;
                cursor:  pointer;

                &:hover {
                    color: rgb(209, 209, 209);
                }
            }

        }
         .list {
             margin-top: 0;
             padding: 0;
             list-style: none;
             font-size: 18px;
             text-transform: uppercase;
             line-height: 1.6;
             text-align: center;
             li {
                 display: inline-block;
                 padding: 0 15px;

                 a {
                    transition: .3s ease all;
                    text-decoration: none;
                    color: rgb(209, 209, 209);

                    &:hover {
                        color: gray;
                    }
                }
             }
         }

         #copyright {
             text-align: center;
             margin-top: 20px;
             font-size: 13px;
         }
    }
</style>