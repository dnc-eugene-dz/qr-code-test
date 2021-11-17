<template>
    <div v-if="errors" class="invalid-feedback">
        <span v-for="error in errors">
            {{ error }}
        </span>
    </div>
</template>

<script>
export default {
    name: "ErrorList",
    props: ['errors']
}
</script>

<style scoped>

</style>
