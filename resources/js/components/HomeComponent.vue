<template>
    <div>
        <h2 class="text-center">Clients List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Image</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="client in clients" :key="client.id">
                <td>{{ client.id }}</td>
                <td>{{ client.name }}</td>
                <td>{{ client.address}}</td>
                <td>{{ client.phone}}</td>
                <td>{{ client.age}}</td>
                <td>{{ client.image }}</td>
                <img v-bind:src="'/public/images/' + client.image" /> 
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: client.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(client.id)">Delete</button>
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
                clients: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/clients')
                .then(response => {
                    this.clients = response.data;
                    console.log(this.clients)
                });
        },
        methods: {
            deleteProduct(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/client/delete/${id}`)
                    .then(response => {
                        let i = this.clients.map(data => data.id).indexOf(id);
                        this.clients.splice(i, 1)
                    });
            }
        }
    }
</script>
