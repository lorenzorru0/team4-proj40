<template>
    <div class="users-container">
        <div class="row">
            <UserCard v-for="user in users" :key="user.id" :data="user"/>
        </div>
    </div>
</template>

<script>
import UserCard from './UserCard';

export default {
    name: 'Users',
    data () {
        return {
            users: []
        }
    },
    components: {
        UserCard
    },
    mounted() {
        axios.get("/api/users")
        .then((response) => {
            console.log(response);
            this.users = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        })
    }
}
</script>

<style lang="scss" scoped>
.users-container{
    width: 80%;
    margin: auto;
    padding: 20px; 
}
</style>