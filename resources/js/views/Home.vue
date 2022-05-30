<template>
    <Navbar show-logout show-search show-add-student @doSearch="sendSearchToContainer"/>
    <CardContainer :search="cardFilterTerm" />
</template>

<script>
import CardContainer from "../components/CardContainer";
import Navbar from "../components/Navbar";
export default {
    name: "Home",
    components: {CardContainer, Navbar},
    data() {
        return{
            cardFilterTerm: ""
        }
    },
    methods: {
        sendSearchToContainer(searchTerm) {
            this.cardFilterTerm = searchTerm
        }
    }

}
</script>

