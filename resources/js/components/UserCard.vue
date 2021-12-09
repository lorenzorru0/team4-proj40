<template>
    <div class="user col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
        <div class="userContainer">
            <img :src="'storage/' + data.url_cover" alt="">
            <div class="infoContainer">
                <h3>{{data.business_name}}</h3>
                <div>
                    <span v-for="(type, index) in types" :key="type.id">
                        <template v-if="index == types.length - 1">{{type.name}} </template>
                        <template v-else>{{type.name}} - </template>
                    </span>
                </div>
                <div class="d-flex justify-content-center">
                    <router-link class="infoButton" :to="{ name: 'single-user', params: {slug: data.slug} }">Vai al ristorante</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'UserCard',
    data() {
        return {
            types: []
        }
    },
    props: {
        data: Object
    },
    created() {
        axios.get(`/api/users/${this.data.slug}/types`)
        .then((response) => {
            this.types = response.data.data;
            console.log(this.types);
        })
        .catch((error) => {
            console.log(error);
        })
    }
}

</script>

<style lang="scss" scoped>
    .user {
        margin: .625rem 0;
        padding: 0 .625rem;

        .userContainer {
            overflow: hidden;
            box-shadow: 0 1px 4px rgb(0 0 0 / 8%), 0 0 0 1px rgb(0 0 0 / 4%);
            border-radius: 3px;
        }

        img {
            width: 100%;
        }

        h3 {
            text-transform: capitalize;
        }

        .infoContainer {
            padding: 10px; 
        }

        .infoButton {
            display: inline-block;
            margin: .3125rem 0;
            padding: .3125rem .9375rem;
            background-color: #00CCBC;
            color: white;
            border-radius: .3125rem;
        }
    }
    

</style>

