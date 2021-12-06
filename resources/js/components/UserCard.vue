<template>
    <div class="user">
        <h3>{{data.business_name}}</h3>
        <router-link :to="{ name: 'single-user', params: {slug: data.slug} }">Vai al ristorante</router-link>
    </div>
</template>

<script>

export default {
    name: 'UserCard',
    props: {
        data: Object
    }
}

</script>

<style lang="scss" scoped>
    .user {
        width: calc(100% / 2 - 30px);
        margin: 5px 15px;
        background-color: #F6BB16;
        text-align: center; 
        padding: 30px; 
        border: 2px solid white;
        border-radius: 20px;
    }
    p {
        color: white;
        padding: 50px; 
    }
    h3 {
        color: white;
        padding: 10px; 
    }

</style>

