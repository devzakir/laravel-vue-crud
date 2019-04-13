<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <p class="mb-0">See All Visitors</p>
            <a href="visitor/create" class="btn btn-sm btn-primary">Add a New Visitor</a>
        </div>  
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Details </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(visitor,index) in visitors" :key="visitor.id">
                        <td> {{ visitor.name }} </td>
                        <td> {{ visitor.email }} </td>
                        <td> {{ visitor.details }} </td>
                        <td class="d-flex">
                            <a :href="'/visitor/'+visitor.id+'/edit/'" class="btn btn-primary btn-sm mr-1"> Edit </a>
                            <button type="button" @click="deleteVisitor(visitor.id, index)" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" @click="fetchPaginateData(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">Previews</button>
                <span class="btn btn-secondary"> Page {{ pagination.current_page }} of {{ pagination.last_page }}</span>
                <button type="button" class="btn btn-secondary" @click="fetchPaginateData(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data (){
        return{
            visitors: [],
            visitor: {
                id: 0,
                name: '',
                email: '',
                details: '',
                user_id: '',
            },
            url: '/api/visitor',
            pagination: [],
        }
    },
    mounted(){
        this.getVisitors()
    },
    methods: {
        getVisitors(){
            let $this = this

            axios.get(this.url).then( response => {
                this.visitors= response.data.data;
                $this.makePagination(response.data)
            })
        },
        deleteVisitor(id, index){
            axios.delete('/api/visitor/'+id).then(response => {
                this.visitors.splice(index, 1)
            }).catch(err =>{
                console.log(err)
            })
        },
        makePagination(data){
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url,
            }

            this.pagination = pagination
        },

        fetchPaginateData(url){
            this.url = url
            this.getVisitors()
        }
    }
}
</script>

<style>

</style>
