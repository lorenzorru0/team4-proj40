<template>
    <div id="app">
        <Header/>
        <main>
            <Hero/>
            <router-view></router-view>
        </main>
        <Footer/>
    </div>
</template>

<script>
import Header from './Header';
import Hero from './Hero';
import Footer from './Footer';

export default {
    name: 'App',
    components: {
        Header,
        Hero,
        Footer
    }
}
</script>

<style lang="scss" scoped>
main {
    min-height: calc(100vh - 20.13125rem);
}
</style>