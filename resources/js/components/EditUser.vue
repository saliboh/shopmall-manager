<template>
    <div>
        <h4 class="text-center">Edit Users</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateUser" >
                    <div class="form-group">
                        <input type="hidden" class="form-control" v-model="user.id">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label>Passwords</label>
                        <input type="password" class="form-control" v-model="user.password">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" v-model="user.role">
                            <option value="shop-manager">Shop Manager</option>
                            <option value="store-owner">Store Owner</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/admin/users/edit/${this.$route.params.id}`)
                .then(response => {
                    this.user = response.data;
                    console.log(this.user);
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateUser() {
            this.$axios.patch(`/api/admin/users/update`, this.user)
                .then(response => {
                    this.$router.push({name: 'users'});
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
