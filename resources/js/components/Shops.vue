<template>
    <div>
        <h4 class="text-center">All Shops on the Mall</h4><br/>
        <a type="button" href="csv-export" class="btn btn-info mb-2">Export CSV</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Store Owner</th>
                <th>Floor</th>
                <th>Visitors</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="shop in shops" :key="shop.id">
                <td>{{ shop.id }}</td>
                <td>{{ shop.name }}</td>
                <td>{{ shop.user_id }}</td>
                <td>{{ shop.floor_number }}</td>
                <td>{{ shop.store_visits }}</td>
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
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/shops')
                .then(response => {
                    this.shops = response.data;
                    console.log(this.shops);
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/login";
        }
        next();
    }
}
</script>
