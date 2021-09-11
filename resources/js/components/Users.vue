<template>
    <div>
        <h4 class="text-center">All Users</h4><br/>

        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error }}
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.role }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edituser', params: { id: user.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push({name: 'adduser'})">Add User</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: [],
            error: null
        }
    },
    created() {
         this.$axios.get('/api/admin/users/requester-role')
            .then(response => {
                let role = response.data.role;

                if(role != 'super-admin') {
                    this.error = 'You do not have the permission';
                } else {
                    console.log(role);
                    this.$axios.get('/api/admin/users/index')
                        .then(response => {
                            this.users = response.data;
                            console.log(this.users);
                        })
                        .catch(function (error) {
                            console.error(error);
                            this.error = 'You do not have the permission';
                        });
                }
            })
            .catch(function (error) {
                console.error(error);
            });

    },
    methods: {
        deleteUser(id) {
            this.$axios.delete(`/api/admin/users/destroy`, { params: { id } })
                .then(response => {
                    // this.$router.push({name: 'users'});
                    console.log(response);
                    window.location.href = "/admin/users/index";
                })
                .catch(function (error) {
                    console.error(error);
                });
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/login";
        }
        next();
    }
}
</script>
