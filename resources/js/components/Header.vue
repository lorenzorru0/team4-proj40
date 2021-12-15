<template>
    <header class="d-flex justify-content-between">
        <div>
	        <img class="logo" src="images/logoTipoDeliveboo.png" alt="logoTipo Deliveboo">
        </div>
        <div>
            <router-link class="link" :to="{ name: 'home' }">Homepage</router-link>
            <router-link class="link" :to="{ name: 'about' }">Chi Siamo</router-link>
            <router-link class="link" :to="{ name: 'contacts' }">Contatti</router-link>
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

header {
    // background-color: #43c6bf73;
    background-color: #000000ce;
    padding: 10px;

    .link {
        display: inline-block;
        margin: .3125rem;
        padding: .3125rem .9375rem;
        background-color: white;
        color: black;
        border-radius: .3125rem;
    }


    
    // MENU-OPEN
    .menu{
        width: 31.25rem;
        background-color: rgba($color: #ffff, $alpha: .9);
        position: absolute;
        right: 0;
        z-index: 50;
        border-radius: 10px;

        
        
    }
    // MENU-TRANSITION
    .menu{
        &-enter, &-leave-to {
            opacity: 0;
            transform: translateX(60px);
        }
        &-enter-active, &-leave-active{
            transition: all 500ms;
        }

    }

    .types{
        &-enter {
            opacity: 0;
            transform: translateX(60px);
        }
        &-enter-active{
            transition: all 500ms ease-in-out;
        }
    }
}

.logo {
    width:160px;
    display: flex;
    padding:10px;
}
</style>