<template>
    <div ref="toastElement" class="toast end-0 position-absolute m-4" :class="background" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header px-3 d-flex justify-content-between align-items-center">
            <img src="/img/favicon.svg" width="32" alt="CMS Icon">
            <strong class="">CMS</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body px-3 text-light">
            <strong>{{message}}</strong>
        </div>
    </div>
</template>
<script>

//Hard a hard time figuring out the import for this bootstrap toast class
import { Toast } from "bootstrap"

export default {
    name: "ToastNotification",
    props: {
        message: String,
        background: String
    },

    data() {
        return {
            toast: undefined
        }
    },

    // Had a really, really hard time figuring out why toast.show() doesn't show the toast
    // after the dom has mounted  via watchers or computed props.
    // After long ordeal came to the solution to just re-render the toast component.
    // This is done by changing the component's key special attribute on where it is being used.
    // https://vuejs.org/api/built-in-special-attributes.html#key
    mounted() {
        //getOrCreateInstance -> because Toast was already called via constructor in data
        this.toast = new Toast(this.$refs.toastElement, {autohide: true, delay: 2500, animation: true})
        if(this.message) this.toast.show()

    },

    beforeUnmount() {
        this.toast.dispose();
    }
}
</script>

<style scoped>
.toast {
    top: 10%;
}
</style>
