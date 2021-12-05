<template>
    <h1>Ristorante Il Gambero</h1>
</template>

<script>

export default {
    name: 'User',
    data () {
        return {
            users: []
        }
    },
    // components: {
    //     PostCard
    // },
    mounted() {
        axios.get("/api/users")
        .then((response) => {
            this.users = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss">
.album-container{
    width: 80%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    padding: 20px; 
}
</style>