<template>
    <header>
         <router-link :to="{ name: 'home' }">Homepage</router-link>
         <router-link :to="{ name: 'about' }">Chi Siamo</router-link>
         <router-link :to="{ name: 'contacts' }">Contatti</router-link>
    </header>
</template>

<script>

export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
header {
    padding: 10px;
}
</style>