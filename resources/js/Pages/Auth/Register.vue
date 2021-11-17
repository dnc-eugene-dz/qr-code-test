<template>
    <div class="col col-lg-6 col-md-8">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Register</h5>
                <form @submit.prevent="handle">
                    <div class="form-group mb-2">
                        <input
                            type="text"
                            name="name"
                            v-model="formData.name"
                            placeholder="Name"
                            :class="[{'is-invalid': errors['name']}, 'form-control']"
                        >
                        <error-list :errors="errors['name']"></error-list>
                    </div>
                    <div class="form-group mb-2">
                        <input
                            type="email"
                            name="email"
                            v-model="formData.email"
                            placeholder="Email address"
                            :class="[{'is-invalid': errors['email']}, 'form-control']"
                        >
                        <error-list :errors="errors['email']"></error-list>
                    </div>
                    <div class="form-group mb-2">
                        <input
                            type="password"
                            v-model="formData.password"
                            placeholder="Password"
                            :class="[{'is-invalid': errors['password']}, 'form-control']"
                        >
                        <error-list :errors="errors['password']"></error-list>
                    </div>
                    <div class="form-group mb-2">
                        <input
                            type="password"
                            v-model="formData.password_confirmation"
                            placeholder="Repeat Password"
                            :class="[{'is-invalid': errors['password']}, 'form-control']"
                        >
                        <error-list :errors="errors['password_confirmation']"></error-list>
                    </div>
                    <button class="btn btn-primary" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            formData: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors: []
        }
    },
    methods: {
        handle() {
            this.errors = [];
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/register', this.formData).then(response => {
                    axios.get('/api/user').then(response => {
                        this.$router.push({name: 'qr'});
                    });
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
