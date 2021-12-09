<template>
    <header class="d-flex justify-content-between">
        <div>
            <router-link class="link" :to="{ name: 'home' }">Homepage</router-link>
            <router-link class="link" :to="{ name: 'about' }">Chi Siamo</router-link>
            <router-link class="link" :to="{ name: 'contacts' }">Contatti</router-link>
        </div>
        <div>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu dropdown-menu-rigth" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> -->
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Right-aligned menu
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdownContainer">
                        <div class="form-group row">
                            <p class="col-md-3 col-form-label text-md-left">Tipologie</p>
                            <div class="col-md-10 mx-auto">
                                <div class="row"> 
                                    <div class="col-6">
                                        <div v-for="type in types" :key="type.id" class="custom-control custom-checkbox">
                                            <template v-if="type.id % 2 == 1">
                                                <input name="types[]" :value="type.id" type="checkbox" class="custom-control-input" :id="'type-' + type.id">
                                                <label class="custom-control-label" :for="'type-' + type.id">{{type.name}}</label>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div v-for="type in types" :key="type.id" class="custom-control custom-checkbox">
                                            <template v-if="type.id % 2 == 0">
                                                <input name="types[]" :value="type.id" type="checkbox" class="custom-control-input" :id="'type-' + type.id">
                                                <label class="custom-control-label" :for="'type-' + type.id">{{type.name}}</label>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
    data() {
        return {
            types: []
        }
    },
    mounted() {
        axios.get('/api/users/types')
        .then((response) => {
            console.log(response);
            this.types = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss" scoped>

header {
    background-color: #00CCBC;
    padding: 10px;

    .link {
        display: inline-block;
        margin: .3125rem;
        padding: .3125rem .9375rem;
        background-color: white;
        color: black;
        border-radius: .3125rem;
    }

    .dropdown-menu {
        display: block;
        visibility: hidden;
        opacity: 0;
        transform: translateY(0px);
        transition: .5s ease-in all;

        .dropdownContainer {
            width: 500px;
        }
    }

    .dropdown-menu.show {
        display: block;
        visibility: visible;
        opacity:1;
        transform: translateX(0px);
        transition: .5s ease-in all;
    }
}
</style>