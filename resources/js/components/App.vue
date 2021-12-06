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