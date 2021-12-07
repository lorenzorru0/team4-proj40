<template>
    <div class="size">
        <h1>{{user.business_name}}</h1>
        <h4>{{user.address}} {{user.street_number}}</h4>
        <p>{{user.description}}</p>
        <h4>Il nostro menù</h4>
        <ul>
            <li v-for="(plate,index) in user.plates" :key="index">
                {{plate.plate_name}} €{{plate.price}}
            </li>
        </ul>
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

<style lang="scss" scoped>

.size {
    min-height: 80vh;
    color: #440063;
    padding-left: 50px;
}
   
</style>