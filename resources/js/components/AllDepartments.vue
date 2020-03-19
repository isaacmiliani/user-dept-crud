<template>
    <div>
        <h3 class="text-center">All Departments</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="department in departments" :key="department.id">
                <td>{{ department.id }}</td>
                <td>{{ department.name }}</td>
                <td>{{ department.description }}</td>
                <td>{{ department.created_at }}</td>
                <td>{{ department.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: department.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteDepartment(department.id)">Delete</button>
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
                departments: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/departments')
                .then(response => {
                    this.departments = response.data;
                });
        },
        methods: {
            deleteDepartment(id) {
                this.axios
                    .delete(`http://localhost:8000/api/department/delete/${id}`)
                    .then(response => {
                        let i = this.departments.map(item => item.id).indexOf(id); // find index of your object
                        this.departments.splice(i, 1)
                    });
            }
        }
    }
</script>
