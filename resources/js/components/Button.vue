<template>
    <button type="button" class="d-flex justify-content-center align-items-center btn" :class="buttonColor">
        <img v-if="imageSource" :src="`/img/${imageSource}`" :alt=alternateText>
        <span v-if="imageSource" class="ms-2">{{buttonText}}</span>
        <span v-else>{{buttonText}}</span>
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
            default: ""
        }
    }

}
</script>

<style scoped>
button {
    transition: 0.2s ease-in-out;
}

img{
    width: 1.2rem;
}

span {
    white-space: nowrap
}
</style>
