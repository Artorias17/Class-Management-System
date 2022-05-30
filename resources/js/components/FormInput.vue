<template>
    <label class="container-fluid form-label">{{labelContent}}
        <input :type="inputFieldType" class="form-control my-3 bg-dark bg-opacity-25 text-light"
               :placeholder="placeholderContent" :value="inputFieldValue"
               @input="bubbleUpEvent"
        >
    </label>
</template>

<script>
export default {
    name: "FormInput",
    props: {
        labelContent: String,
        placeholderContent: String,
        inputFieldType: String,
        inputFieldValue: String // ---> v-model value binding.  Since custom name was used as argument for v-model value in parent,
                                // this prop acts as the value.
    },
    emits:["update:inputFieldValue"],  // ---> custom event that will be emitted and will be received by v-model update.
    methods: {
        bubbleUpEvent(evt){
            this.$emit("update:inputFieldValue", evt.target.value)
        }
    }
}
</script>
