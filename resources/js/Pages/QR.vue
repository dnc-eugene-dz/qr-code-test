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
                        <form @submit.prevent>
                            <div class="form-group mb-2">
                                <label for="size">Content</label>
                                <input
                                    type="text"
                                    name="content"
                                    v-model="formData.content"
                                    :class="[{'is-invalid': errors['content']}, 'form-control']"
                                >
                                <error-list :errors="errors['content']"></error-list>
                            </div>
                            <label for="size">Size, px</label>
                            <div class="form-group">
                                <input
                                    type="number"
                                    name="size"
                                    id="size"
                                    v-model="formData.size"
                                    min="0"
                                    :class="[{'is-invalid': errors['size']}, 'form-control']"
                                >
                                <error-list :errors="errors['size']"></error-list>
                            </div>
                            <div class="row">
                                <div class="col col-xs-6 mt-2">
                                    <label>Fill color</label>
                                    <error-list :errors="errors['fill_color']"></error-list>
                                    <sketch-picker
                                        v-model="fill_color"
                                        @input="updateColor('fill_color')"
                                    ></sketch-picker>
                                </div>
                                <div class="col col-xs-6 mt-2">
                                    <label>Background color</label>
                                    <error-list :errors="errors['background_color']"></error-list>
                                    <sketch-picker
                                        v-model="background_color"
                                        @input="updateColor('background_color')"
                                    ></sketch-picker>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-4" type="button" @click="handle">Generate</button>
                        </form>
                    </div>
                    <div class="col col-md-6">
                        <error-list :errors="errors['image']"></error-list>
                        <div class="mb-3" v-if="previewData.content">
                            <h5>Preview data</h5>
                            <strong>Content:</strong> {{ previewData.content }}<br/>
                            <strong>Size:</strong> {{ previewData.size }}<br/>
                            <strong>Fill color:</strong> {{ displayColor(previewData.fill_color) }}<br/>
                            <strong>Background color:</strong> {{ displayColor(previewData.background_color) }}
                        </div>
                        <h5>QR Code:</h5>
                        <img class="qr-code" v-if="image" :src="image" alt="QR Code" />
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
                background_color: { r: 255, g: 255, b: 255, a: 1 },
                fill_color: { r: 0, g: 0, b: 0, a: 1 }
            },
            previewData: {
                content: '',
                size: 0,
                background_color: 'rgba(255,255,255,1)',
                fill_color: 'rgba(0,0,0,1)'
            },
            errors: [],
            fill_color: { r: 0, g: 0, b: 0, a: 1 },
            background_color: { r: 255, g: 255, b: 255, a: 1 },
            image: ''
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
                    this.image = `data:image/png;base64, ${response.data}`;
                    this.previewData = {...this.formData}
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    } else {
                        this.errors = {
                            image: ["QR Code generation failed"]
                        }
                    }
                });
            })
        },
        updateColor(color) {
            let rgba = this[color].rgba;
            this.formData[color] = {r:rgba.r, g:rgba.g, b:rgba.b, a:rgba.a}
        },
        displayColor(color) {
            return `rgba(${color.r},${color.g},${color.b},${color.a})`;
        }
    }
}
</script>

<style scoped>
    .qr-code {
        max-width: 100%;
    }
    .invalid-feedback {
        display: block!important;
    }
</style>
