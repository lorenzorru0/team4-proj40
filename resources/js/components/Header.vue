<template>
    <header>
        <div>
            <router-link class="link" :to="{ name: 'home' }">Homepage</router-link>
            <router-link class="link" :to="{ name: 'about' }">Chi Siamo</router-link>
            <router-link class="link" :to="{ name: 'contacts' }">Contatti</router-link>
        </div>
    </header>
</template>

<script>

export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>

header {
    background-color: #00CCBC;
    padding: 10px 0;

    .link {
        display: inline-block;
        margin: .3125rem;
        padding: .3125rem .9375rem;
        background-color: white;
        color: black;
        border-radius: .3125rem;
    }
}
</style>