<template>
    <div ref="toastElement" class="toast end-0 position-absolute m-4 show" :class="background" role="alert" aria-live="assertive" aria-atomic="true">
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
    emits: ["isVisible"],
    mounted() {
        if(this.message) this.display()
    },

    // Watching is lazy. It won't work at initial prop pass, however for subsequent changes it will.
    watch:{
        message(newToast){
            if(newToast) this.display()
        }
    },
    methods: {
        display(){
            // The Dom needs to be mounted first before this object can be created
            let toaster = new Toast(this.$refs.toastElement);
            toaster.show()
        }
    }
}
</script>

<style scoped>
.toast {
    top: 10%;
}
</style>
