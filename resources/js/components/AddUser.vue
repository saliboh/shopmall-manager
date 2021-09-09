<template>
    <div>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error }}
        </div>

        <h4 class="text-center">Add User</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addUser">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="user.password">
                    </div>
                    <div class="form-group">
                        <label>Roles</label>
                        <select class="form-control" v-model="user.role">
                            <option value="shop-manager">Shopping Mall Manager</option>
                            <option value="store-owner">Store Owner</option>
                        </select>
                    </div>
                    <button :disabled="isAdmin" type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {},
            error: null,
            isAdmin: null
        }
    },
    created() {
         this.$axios.get('/api/admin/users/requester-role')
            .then(response => {
                let role = response.data.role;
                 this.isAdmin = false;
                if(role != 'super-admin') {
                   this.isAdmin = true;
                }
            })
            .catch(function (error) {
                console.error(error);
            });
    },
    methods: {
        addUser() {
            this.$axios.post('/api/admin/users/create', this.user)
                .then(response => {
                    this.$router.push({name: 'users'})
                })
                .catch(function (error) {
                    console.error(error);
                });
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
