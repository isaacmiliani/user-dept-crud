<template>
    <div>
        <h3 class="text-center">Add Department</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addDepartment">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="department.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="department.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Department</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                department: {}
            }
        },
        methods: {
            addDepartment() {

                this.axios
                    .post('http://localhost:8000/api/department/add', this.department)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
