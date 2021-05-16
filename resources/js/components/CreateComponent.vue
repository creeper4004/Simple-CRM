<template>
  <div>
   <h3 class="text-center">Create New Client</h3> 
     <div class="row mt-5">
      <div class="col-md-12">
        <form @submit.prevent="addClient">
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
          <div class="form-group">
            <label>Image</label>   
            <input ref="file" type="file" name="image" id="image" v-on:change="onFileChange">
          </div>
          <button type="submit" class='btn btn-primary'>Create</button>
        </form>
      </div>
     </div>
  </div>
</template>
<script>
export default {
    data(){
        return{
            client: {}
        }
    },
    methods: {
        onFileChange(){
          this.client.image = this.$refs.file.files[0];
        },
        addClient(){
            /* let client = new FormData() */
            /* client.append('image', this.image) */
            /* _.each(this.client, (value, key) => { */
            /*     client.append(key,value) */
            /* })  */
            axios.post('http://localhost:8000/api/client/create', this.client)
                 .then(response => (
                    this.$router.push({ name: 'home'})
                 ))
                 .catch(err => console.log(err))
                 .finally(() => this.loading = false)
        }
    }
}
</script>
