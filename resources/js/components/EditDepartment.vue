<template>
    <div>
        <h3 class="text-center">Edit Department</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateDepartment">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="department.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="department.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Department</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/department/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.department = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateDepartment() {
                this.axios
                    .post(`http://localhost:8000/api/department/update/${this.$route.params.id}`, this.department)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>
