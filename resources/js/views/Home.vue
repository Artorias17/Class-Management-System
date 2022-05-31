<template>
    <div>
        <Navbar show-logout show-add-student/>
        <CardContainer />
        <ToastNotification message="Hello"/>
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
        message: String
    }

}
</script>

