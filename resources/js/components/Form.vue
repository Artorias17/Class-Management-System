<template>
    <form class="container-md px-5 py-2" @submit.prevent="$emit('submitForm')">
        <div class="form-control bg-dark bg-opacity-75 text-light">
            <div class="row row-cols-md-2">
                <!--
                Custom value argument to track -> v-model:customArg
                -> child should then use customArg as prop and should add in
                emits array update:customArg and emit update:customArg
                -->
                <div class="container my-2" v-for="fieldData in formFields">
                    <FormInput :input-field-type="fieldData.inputFieldType"
                               v-model:inputFieldValue="fieldData.inputFieldValue"
                               :label-content="fieldData.labelContent"
                               :placeholder-content="fieldData.placeholderContent"
                    />
                </div>
            </div>
            <div class="container my-2 d-flex justify-content-center align-items-center my-3">
                <Button type="submit" class="btn-lg" button-color="bg-success" button-text="Submit"/>
            </div>
        </div>
    </form>
</template>

<script>
import FormInput from "./FormInput";
import Button from "./Button";
export default {
    name: "Form",
    components: {FormInput, Button},
    props: {
        //Read https://vuejs.org/guide/components/props.html#mutating-object-array-props
        //to know why formFields.inputFieldValue can be used as v-model for 2-way data binding
        // even though props are one-way
        formFields: Array
    },
    emits: {
        submitForm: null
    }

}
</script>
