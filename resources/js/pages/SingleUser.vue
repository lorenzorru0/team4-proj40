<template>
    <div class="size">
        <h1>{{user.business_name}}</h1>
        <p>{{user.description}}</p>
    </div>
</template>

<script>
export default {
    name: 'SingleUser',
    data() {
        return {
            user: null
        }
    },
    mounted() {
        axios.get(`/api/users/${this.$route.params.slug}`)
        .then((response) => {
            console.log(response);
            this.user = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss">

.size {
    min-height: 80vh;
}

h3 {
    padding-left: 50px;
}
   
</style>