<template>
  <div class="sidebar">
      <div class="menu-items">
          <div class="link-container">
            <div class="link">
                <div class="icon" @click="toggleCategories">
                     <i :class="{'icon-click': showCategories}" class="fa fa-angle-right"></i>
                </div>
                Categories
            </div>
            <div class="drop-down" v-show="showCategories" v-for="category in categories" :key="category.id">
                <div class="link" @click="productsByCategories(category.id)">{{ category.name }}</div>
            </div>
          </div>

          <div class="link-container">
                <div class="link">
                    <div class="icon" @click="toggleBrands">
                        <i :class="{'icon-click': showBrands}" class="fa fa-angle-right"></i>
                    </div>
                    Brands
                </div>
            <div class="drop-down" v-show="showBrands" v-for="brand in brands" :key="brand.id">
                <div class="link" @click="productsByBrands(brand.id)">{{ brand.name }}</div>
            </div>
          </div>

          <div class="link-container">
            <div class="link">
                <div class="icon" @click="toggleSizes">
                    <i :class="{'icon-click': showSizes}" class="fa fa-angle-right"></i>
                </div>
                Sizes
            </div>
            <div class="drop-down" v-show="showSizes" v-for="size in sizes" :key="size.id">
                <div class="link" @click="productsBySizes(size.id)">{{ size.size }}</div>
            </div>
          </div>
      </div>
  </div>
</template>

<script>

export default {
    data: function() {
        return {
            brands: [],
            categories: [],
            sizes: [],
            showCategories: false,
            showBrands: false,
            showSizes: false,
        }
    },
    methods: {
        toggleCategories() {
            this.showCategories = !this.showCategories;
        },
        toggleBrands() {
            this.showBrands = !this.showBrands;
        },
        toggleSizes() {
            this.showSizes = !this.showSizes;
        },
        getBrands() {
            axios.get('/api/showBrands', this.brands)
                .then((res) => {
                    this.brands = res.data.brands;
                }).catch((err) => {
                    console.log(err.data);
                })
        },
        getCategories() {
            axios.get('/api/showCategories', this.categories)
                .then((res) => {
                    this.categories = res.data.categories;
                }).catch((err) => {
                    console.log(err.data);
                })
        },
        getSizes() {
            axios.get('/api/showSizes', this.sizes)
                .then((res) => {
                    this.sizes = res.data.sizes;
                }).catch((err) => {
                    console.log(err.data);
                })
        },
        productsByCategories(id) {
            this.emitter.emit('products-by-categories', id);
        },
        productsByBrands(id) {
            this.emitter.emit('products-by-brands', id);
        },
        productsBySizes(id) {
             this.emitter.emit('products-by-sizes', id);
        }

    },
    mounted: function() {
        this.getBrands();
        this.getCategories();
        this.getSizes();
    }
}
</script>

<style lang='scss' scoped>

.sidebar {
    background-color: white;
    border-right: 1px solid rgb(211, 211, 211);
    float: left;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    bottom: 0;
    padding: 0.5em;
    overflow-x: hidden;

    transition: 0.3s ease all;

    display: flex;
    height: 100%;
    justify-content: center;
    width: 150px;
    flex-direction: column;
    .menu-items {
        margin: 0 auto;
        display: flex;
        align-items: center;
        align-content: center;
        flex-direction: column;
        transition: .5s ease all;

        .link-container {
            display: flex;
            text-transform: uppercase;
            align-items: center;
            align-content: center;
            flex-direction: column;
            .link {
                padding-left: 10px;
                
                .icon {
                    display: inline-block;
                    padding-right: 5px;
                    cursor: pointer;
                    transition: .3s ease-in;
                    .icon-click {
                        transition: .3s ease-in;
                        transform: rotate(90deg);
                    }
                }
            }
            .drop-down {
                transition: .5s ease-in;
            }
        }
    }

    .menu-items > * {
        margin-top: 20px;
    }
}
</style>