<template>
    <div class="col col-lg-12">
        <div class="card mt-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">QR code builder page</h5>
                <div>
                    <button class="btn btn-danger" @click="logout">Logout</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6">
                        <form @submit.prevent="handle">
                            <div class="form-group mb-2">
                                <input
                                    type="text"
                                    name="content"
                                    v-model="formData.content"
                                    placeholder="Content"
                                    :class="[{'is-invalid': errors['password']}, 'form-control']"
                                >
                                <error-list :errors="errors['email']"></error-list>
                            </div>
                            <div class="form-group mb-2">
                                <input
                                    type="number"
                                    name="size"
                                    v-model="formData.size"
                                    placeholder="Size"
                                    min="0"
                                    :class="[{'is-invalid': errors['password']}, 'form-control']"
                                >
                                <error-list :errors="errors['size']"></error-list>
                            </div>
                            <button class="btn btn-primary" type="submit">Generate</button>
                        </form>
                    </div>
                    <div class="col col-md-6">
                        Preview
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "QR",
    data() {
        return {
            formData: {
                content: '',
                size: 0,
                background_color: '',
                fill_color: ''
            },
            errors: []
        }
    },
    methods: {
        logout() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/logout').then(response => {
                    this.$router.push('login');
                });
            })
        },
        handle() {
            this.errors = [];
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/qr/generate', this.formData).then(response => {
                    console.log(response);
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            })
        }
    }
}
</script>
