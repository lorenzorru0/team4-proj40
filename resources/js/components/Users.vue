<template>
    <div class="users-container">
        <!-- <div class="d-flex justify-content-end">
            <div>
                <button type="button" class="btn btn-secondary" @click='openMenu = !openMenu'>MENU</button>

                <transition name="menu">
                    <div class="menu" v-if="openMenu">

                        <div class="form-group row">
                            <h3 class="col-md-3 col-form-label text-md-left">Tipologie</h3>
                            <div class="col-md-10 mx-auto">
                                <div class="row"> 
                                    <div class="col-6">
                                        <transition-group appear name="types">

                                            <div v-for="type in types" :key="type.id" class="custom-control custom-checkbox">
                                                <template v-if="type.id % 2 == 1">
                                                    <input name="types[]" :value="type.id" type="checkbox" class="custom-control-input" :id="'type-' + type.id">
                                                    <label class="custom-control-label" :for="'type-' + type.id">{{type.name}}</label>
                                                </template>
                                            </div>

                                        </transition-group>
                                    </div>
                                    <div class="col-6">
                                        <transition-group appear name="types">

                                            <div v-for="type in types" :key="type.id" class="custom-control custom-checkbox">
                                                <template v-if="type.id % 2 == 0">
                                                    <input name="types[]" :value="type.id" type="checkbox" class="custom-control-input" :id="'type-' + type.id">
                                                    <label class="custom-control-label" :for="'type-' + type.id">{{type.name}}</label>
                                                </template>
                                            </div>

                                        </transition-group>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </div> -->
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Ricerca i ristoranti tramite le tipologie
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <div class="col-4 d-flex justify-content-center">
                        <div>
                            <div v-for="(type, index) in types" :key="type.id" v-show="index < (types.length / 3)" class="custom-control custom-checkbox">
                                <input v-model="typesSelected" :value="type.id" type="checkbox" class="custom-control-input" :id="'type-' + type.id">
                                <label class="custom-control-label" :for="'type-' + type.id">{{type.name}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                        <div>
                            <div v-for="(type, index) in types" :key="type.id" v-show="index >= (types.length / 3) && index < (types.length / 3) * 2" class="custom-control custom-checkbox">
                                <input v-model="typesSelected" :value="type.id" type="checkbox" class="custom-control-input" :id="'type-' + type.id">
                                <label class="custom-control-label" :for="'type-' + type.id">{{type.name}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                        <div>
                            <div v-for="(type, index) in types" :key="type.id" v-show="index >= (types.length / 3) * 2" class="custom-control custom-checkbox">
                                <input v-model="typesSelected" :value="type.id" type="checkbox" class="custom-control-input" :id="'type-' + type.id">
                                <label class="custom-control-label" :for="'type-' + type.id">{{type.name}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <UserCard v-for="user in restaurantsFiltered" :key="user.id" :data="user"/>
        </div>
    </div>
</template>

<script>
import UserCard from './UserCard';

export default {
    name: 'Users',
    data () {
        return {
            users: [],
            types: [],
            usersTypes: [],
            typesSelected: []
        }
    },
    components: {
        UserCard
    },
    created() {
        axios.get("/api/users")
        .then((response) => {
            this.users = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        });

        axios.get('/api/users/types')
        .then((response) => {
            this.types = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        });

        axios.get('/api/users/typesAll')
        .then((response) => {
            this.usersTypes = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        });
    },
    computed: {
        restaurantsFiltered() {
            let arrayFiltered = [];
            if (this.typesSelected.length == 0) {
                arrayFiltered = this.users;
            } else {
                let arr = [];

                this.usersTypes.forEach((elm, index) => {
                    if (this.typesSelected.every(elem => elm.includes(elem))) {
                        arr.push(index);
                    }
                });

                this.users.forEach((elm, index) => {
                    if (arr.includes(index)) {
                        arrayFiltered.push(elm);
                    }
                });
            }
            return arrayFiltered;
        }
    }
}
</script>

<style lang="scss" scoped>
.users-container {
    
    width: 80%;
    margin: auto;
    padding: 20px; 

    // MENU-OPEN
    // .menu{
    //     width: 31.25rem;
    //     background-color: rgba($color: #ffff, $alpha: .9);
    //     position: absolute;
    //     right: 0;
    //     z-index: 50;
    //     border-radius: 10px;

        
        
    // }
    // MENU-TRANSITION
    // .menu{
    //     &-enter, &-leave-to {
    //         opacity: 0;
    //         transform: translateX(60px);
    //     }
    //     &-enter-active, &-leave-active{
    //         transition: all 500ms;
    //     }

    // }

    // .types{
    //     &-enter {
    //         opacity: 0;
    //         transform: translateX(60px);
    //     }
    //     &-enter-active{
    //         transition: all 500ms ease-in-out;
    //     }
    // }
}
</style>