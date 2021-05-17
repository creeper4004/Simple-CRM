<template>
  <div>
   <h3 class="text-center">Create New Client</h3> 
     <div class="row mt-5">
      <div class="col-md-12">
        <form  method="POST" @submit="addClient" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>   
            <input name="name" type="text" class="form-control" v-model="name">
          </div>
          <div class="form-group">
            <label>Address</label>   
            <input name="address" type="text" class="form-control" v-model="address">
          </div>
          <div class="form-group">
            <label>Phone</label>   
            <input name="phone" type="number" class="form-control" v-model="phone">
          </div>
          <div class="form-group">
            <label>Age</label>   
            <input name="age" type="number" class="form-control" v-model="age">
          </div>
          <div class="form-group">
            <label>Image</label>   
            <input name="image" type="file" class="form-control" v-on:change="onFileChange">
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
            /* id: '', */
            name: '',
            address: '',
            phone: '',
            age: '',
            image: ''
        };
    },
    methods: {
        onFileChange(e){
            this.image = e.target.files[0];
        },
        addClient(e){
            e.preventDefault();
            const config = {headers: { 'content-type': 'multipart/form-data' }}
            let formData = new FormData();
            formData.append('name', this.name);
            formData.append('address', this.address);
            formData.append('phone', this.phone);
            formData.append('age', this.age);
            formData.append('image', this.image);
            axios.post('http://localhost:8000/api/client/create', formData, config)
                 .then(response => (
                    this.$router.push({ name: 'home'})
                 ))
                 .catch(err => console.log(err))
                 .finally(() => this.loading = false)
        }
    }
}
</script>
