<template>
    <div>
        <h4 class="text-center">All Shops on the Mall</h4><br/>
        <a type="button" href="csv-export" class="btn btn-info mb-2">Export CSV</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Store Owner ID</th>
                <th>Floor</th>
                <th>Visitors</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="shop in shops" :key="shop.id">
                <td>{{ shop.id }}</td>
                <td>{{ shop.name }}</td>
                <td>{{ shop.user_id }}</td>
                <td>{{ shop.floor }}</td>
                <td>{{ shop.visit }}</td>
                <td>
                    <div class="btn-group" role="group">

                        <button class="btn btn-danger" @click="deleteShop(shop.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>


    </div>
</template>
<script>
export default {
    data() {
        return {
            shops: []
        }
    },
    created() {
        this.$axios.get('/api/admin/users/requester-role')
            .then(response => {
                let role = response.data.role;
                let url = '/api/shops/admin/retrieve-stores';

                if(role == 'store-owner') {
                     url = '/api/shops/retrieve-stores';
                }
                console.log(role);
                console.log(url);
                this.$axios.post(url, '0')
                    .then(response => {
                        this.shops = response.data.shops;
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
            .catch(function (error) {
                console.error(error);
            });
    },
    methods: {
        deleteShop(id) {
            this.$axios.delete(`/api/shops/admin/destroy`, { params: { id } })
                .then(response => {
                    console.log(response);
                    window.location.href = "/shops";
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
