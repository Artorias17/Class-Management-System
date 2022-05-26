<template>
    <button type="button" class="d-flex justify-content-center align-items-center btn" :class="buttonColor">
        <img v-if="imageSource" :src="`/img/${imageSource}`" :alt=alternateText>
        {{buttonText}}
    </button>
</template>

<script>
export default {
    name: "Button",
    props: {
        buttonColor: String,
        imageSource: String,
        alternateText: String,
        buttonText: {
            type: String,
            default: "Submit"
        }
    }

}
</script>

<style scoped>
img{
    width: 1.2rem;
}
</style>
