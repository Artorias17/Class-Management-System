<template>
    <Navbar show-logout show-add-student/>
    <CardContainer />
</template>

<script>
import CardContainer from "../components/CardContainer";
import Navbar from "../components/Navbar";
export default {
    name: "Home",
    components: {CardContainer, Navbar},

}
</script>

