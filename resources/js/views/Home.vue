<template>
    <div>
        <Navbar show-logout show-add-student/>
        <CardContainer @toastMsg="bringToast"/>
        <ToastNotification :key="newToast" :message="msgData" :background="msgBG"/>
    </div>
</template>

<script>
import CardContainer from "../components/CardContainer";
import Navbar from "../components/Navbar";
import ToastNotification from "../components/ToastNotification";

export default {
    name: "Home",
    components: {CardContainer, Navbar, ToastNotification},
    props: {
        msg: String,
        background: String,
    },
    data(){
        return {
            newToast: 0,
            msgData: this.msg,
            msgBG: this.background
        }
    },
    methods: {
        bringToast(data) {
            this.msgData = data[0]
            this.msgBG = data[1]
            this.newToast++;
        }
    }
}
</script>

