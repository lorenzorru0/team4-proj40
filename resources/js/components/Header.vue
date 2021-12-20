<template>
    <header class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-3 justify-content-sm-center">
                <img class="logo" src="http://localhost:3000/images/logoTipoDeliveboo.png" alt="logoTipo Deliveboo">
            </div>
            <div class="col-xs-12 col-sm-9 justify-content-sm-end buttons">
                <router-link class="link" :to="{ name: 'home' }">Homepage</router-link>
                <router-link class="link" :to="{ name: 'about' }">Chi Siamo</router-link>
                <router-link class="link" :to="{ name: 'contacts' }">Contatti</router-link>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
    data() {
        return {
            types: [],
            openMenu: false
        }
    },
    mounted() {
        axios.get('/api/users/types')
        .then((response) => {
            this.types = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss" scoped>
.row {
    margin-right: 0;
    margin-left: 0;
}
header {
    background-color: #73d29ef8;
    padding: 10px;

    .link {
        display: inline-flex;
        margin: .3125rem;
        padding: .3125rem .9375rem;
        background-color: coral;
        color: white;
        border-radius: .3125rem;
        text-decoration: none;
    }
    .link:hover {
        background-color: #00BAE8;
        transition: 1s;
    }
}

.logo {
    width:160px;
    display: flex;
    padding:10px;
}

.buttons {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}
</style>