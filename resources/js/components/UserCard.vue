<template>
    <div class="user col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
        <div class="userContainer">
            <router-link data-aos="zoom-in" data-aos-delay="5000" class="link" :to="{ name: 'single-user', params: {slug: data.slug} }">
                <img class="cover" :src="'storage/' + data.url_cover" alt="">
                <div class="infoContainer">
                    <div class="grow">
                        <div class="text-center">
                            <h3>{{data.business_name}}</h3>
                        </div>
                        <div class="text-center types">
                            <span v-for="(type, index) in types" :key="type.id">
                                <template v-if="index == types.length - 1">{{type.name}} </template>
                                <template v-else>{{type.name}} - </template>
                            </span>
                        </div>
                    </div>
                </div>
            </router-link>
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
            height: 100%;
            overflow: hidden;
            box-shadow: 0 1px 4px rgb(0 0 0 / 8%), 0 0 0 1px rgb(0 0 0 / 4%);
            border-radius: 3px;
            transition: 0.1s;

            &:hover {
                transform: scale(1.01);
            }
        }

        .cover {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        h3 {
            text-transform: capitalize;
        }

        .infoContainer {
            padding: 10px; 

            .types {
                width: 80%;
                margin: 0 auto;
            }
        }

        .link {
            height: 100%;
            display: block;
            color: black;

            &:hover {
                text-decoration: none;
            }
        }
    }
    
    // Media query
    

    

    @media screen and (max-width: 992px) {
        .user .cover {
            height: 150px;
        }
    }
    
    @media screen and (max-width: 576px) {
        .user .cover {
            height: 200px;
        }
    }
    
    @media screen and (max-width: 420px) {
        .user .cover {
            height: 150px;
        }
    }

    @media screen and (min-width: 1600px) {
        .user .cover {
            height: 250px;
        }
    }

</style>

