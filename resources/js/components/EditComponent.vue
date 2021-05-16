<template>
    <div>
       <h3 class="text-center">Edit Client</h3> 
       <div class="row mt-5">
            <div class="col-md-12">
                <form @submit.prevent="updateClient">
                  <div class="form-group">
                    <label>Name</label>   
                    <input type="text" class="form-control" v-model="client.name">
                  </div>
                  <div class="form-group">
                    <label>Address</label>   
                    <input type="text" class="form-control" v-model="client.address">
                  </div>
                  <div class="form-group">
                    <label>Phone</label>   
                    <input type="number" class="form-control" v-model="client.phone">
                  </div>
                  <div class="form-group">
                    <label>Age</label>   
                    <input type="number" class="form-control" v-model="client.age">
                  </div>
                  <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
       </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            client:{}
        }
    },
    created(){
        this.axios
            .get('http://localhost:8000/api/${this.$route.params.id}')
            .then((res) => {
                this.client = res.data;
            });
    },
    methods: {
        updateClient(){
            this.axios
                .patch('http://localhost:8000/api/edit/${this.$route.params.id}')
                .then((res) =>{
                    this.$router.push({ name: 'home'});
                });
        }
    }
}
</script>
