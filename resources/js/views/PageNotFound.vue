<template>
    <div class="container text-light d-flex flex-column justify-content-center align-items-center my-5">
        <h1 class="my-2">404</h1>
        <h2 class="my-2">Page Not Found !!!</h2>
        <Button @click="$router.push('/')" class="my-2 btn-lg fw-semibold text-light px-3 py-2" :alternate-text="btnData.alternateText"
        :button-color="btnData.buttonColor"
        :button-text="btnData.buttonText"
        :image-source="btnData.imageSource"></Button>
    </div>
</template>

<script>
import Button from "../components/Button";
export default {
    name: "PageNotFound",
    components: {Button},
    data() {
        return {
            btnData: {
                buttonColor: "bg-danger",
                imageSource: "go_back.svg",
                alternateText: "",
                buttonText: "Home"
                }
        }
    }
}
</script>
