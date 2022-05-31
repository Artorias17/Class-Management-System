<template>
    <div ref="toastElement" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="/img/favicon.svg" width="32" class="rounded me-2" alt="...">
            <strong class="me-auto">CMS</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{message}}</div>
    </div>
</template>
<script>

//Hard a hard time figuring out the import for this bootstrap toast class
import Toast from "bootstrap/js/src/toast";

export default {
    name: "ToastNotification",
    props: {
        message: String
    },
    data() {
        return {
            toaster: Toast,
        }
    },
    mounted() {
        this.toaster = new Toast(this.$refs.toastElement); // The Dom needs to be mounted first before this object can be created
        if(this.message) this.toaster.show()
    },

    // Watching is lazy. It won't work at initial prop pass, however for subsequent changes it will.
    watch:{
        message(newToast, oldToast){
            if(newToast !== oldToast) this.toaster.show()
        }
    }
}
</script>

<style scoped>

</style>
