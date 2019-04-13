<template>
    <div class="card">
        <div class="card-header">Add a New Visitor</div>
        <div class="card-body">                 
            <form action="/visitor" method="post">
                <div class="form-group">
                    <label for="name">Visitor Name</label>
                    <input type="text" name="name" id="name" class="form-control"  autofocus required v-model="name">
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
                    <button class="btn btn-success" type="button" v-on:click="addNewVisitor()">Add Visitor</button>
                </div>
            </form>               
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            name: '',
            email: '',
            details: '',
            errors: [],
        }
    },
    methods: {
        addNewVisitor(){
            this.errors = [],
            // passing data to api
            axios.post('/api/visitor', {
                name: this.name,
                email: this.email,
                details: this.details,
            }).then( response => {
                this.name= ''
                this.email= ''
                this.details= ''
            }).catch( error => {
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
