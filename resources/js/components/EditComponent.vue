<template>
  <div>
   <h3 class="text-center">Edit Client</h3> 
     <div class="row mt-5">
      <div class="col-md-12">
        <form  method="POST" @submit="updateClient" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>   
            <input name="name" type="text" class="form-control" v-model="client.name">
          </div>
          <div class="form-group">
            <label>Address</label>   
            <input name="address" type="text" class="form-control" v-model="client.address">
          </div>
          <div class="form-group">
            <label>Phone</label>   
            <input name="phone" type="number" class="form-control" v-model="client.phone">
          </div>
          <div class="form-group">
            <label>Age</label>   
            <input name="age" type="number" class="form-control" v-model="client.age">
          </div>
          <div class="form-group">
            <label>Image</label>   
            <input  name="image" type="file" class="form-control" v-on:change="onFileChange">
          </div>
          <button type="submit" class='btn btn-primary'>Edit</button>
        </form>
      </div>
     </div>
  </div>
</template>
<script>
export default {
    data(){
        return{
            client: []
            /* id: '', */
            /* name: '', */
            /* address: '', */
            /* phone: '', */
            /* age: '', */
            /* image: '' */
        };
    },
    mounted() {
        this.axios.get(`http://localhost:8000/api/client/edit/${this.$route.params.id}`)
             .then((res) => {
                this.client = res.data;
        });
    },
    methods: {
        onFileChange(e){
            this.client.image = e.target.files[0];
        },
        updateClient(e){
            e.preventDefault();
            const config = {headers: { 'content-type': 'multipart/form-data' }}
            let formData = new FormData();
            formData.append('name', this.client.name);
            formData.append('address', this.client.address);
            formData.append('phone', this.client.phone);
            formData.append('age', this.client.age);
            formData.append('image', this.client.image);
            axios.post(`http://localhost:8000/api/client/update/${this.$route.params.id}`, formData, config)
                 .then((res) =>{
                    this.$router.push({ name: 'home'});
            });
        }
    }
}
</script>
