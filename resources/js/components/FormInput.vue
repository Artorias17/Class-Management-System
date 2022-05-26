<template>
    <label class="container-fluid form-label">{{labelContent}}
        <input :type="inputFieldType" class="form-control mt-3 bg-dark bg-opacity-25 text-light" :placeholder="placeholderContent" v-if="inputFieldValue" :value="inputFieldValue">
        <input :type="inputFieldType" class="form-control mt-3 bg-dark bg-opacity-25 text-light" :placeholder="placeholderContent">
    </label>
</template>

<script>
export default {
    name: "FormInput",
    props: {
        labelContent: String,
        placeholderContent: String,
        inputFieldType: String,
        inputFieldValue: String
    }
}
</script>

<style scoped>

</style>
