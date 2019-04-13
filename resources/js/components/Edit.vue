<template>
    <div class="card">
        <div class="card-header bg-primary text-white">Edit Visitor Info</div>
        <div class="card-body">                
            <form action="/visitor" method="post">
                <div class="form-group">
                    <label for="name">Visitor Name</label>
                    <input type="text" name="name" id="name" class="form-control" autofocus required v-model="name">
                    <strong v-if="errors.name" class="text-danger">{{ errors.name[0] }}</strong>
                </div>
                <div class="form-group">
                    <label for="email">Visitor Email</label>
                    <input type="text" name="email" id="email" class="form-control" autofocus required v-model="email">
                    <strong v-if="errors.email" class="text-danger">{{ errors.email[0] }}</strong>
                </div>
                <div class="form-group">
                    <label for="details">Visitor Details</label>
                    <textarea rows="4" type="text" name="details" id="details" class="form-control" autofocus required v-model="details">  </textarea>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success" type="button" @click="updateVisitor()">Update Visitor</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id'], 
    data(){
        return {
            name: '',
            email: '',
            details: '',
            errors: [],
        }
    },
    mounted(){
        axios.get('/api/visitor/'+this.id).then(response => {
            var visitor = response.data
            this.name = visitor.name
            this.email = visitor.email
            this.details = visitor.details
        }).catch(error => {
            console.log(error)
        })
    },
    methods: {
        updateVisitor(){
            this.errors = [],
            axios.put('/api/visitor/'+this.id,{
                name: this.name,
                email: this.email,
                details: this.details,
            }).then(response => {
                console.log('hello')
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data.errors
                }
            })
        }
    }
}
</script>

<style>

</style>
