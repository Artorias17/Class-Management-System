<template>
    <form class="container-md px-5 py-2">
        <div class="form-control bg-dark bg-opacity-75 text-light">
            <div class="row row-cols-md-2">
                <div class="container my-2" v-for="fieldData in formFields">
                    <FormInput :input-field-type="fieldData.inputFieldType"
                               :input-field-value="fieldData.inputFieldValue"
                               :label-content="fieldData.labelContent"
                               :placeholder-content="fieldData.placeholderContent"
                    />
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import FormInput from "./FormInput";
export default {
    name: "Form",
    components: {FormInput},
    props: {
        formFields: Array
    }

}
</script>

<style scoped>

</style>
