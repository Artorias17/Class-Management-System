<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container-md px-5 py-lg-0 py-md-2">
            <router-link class="navbar-brand mx-5" to="/">Class Management System</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse row mt-4 my-lg-0" id="navbarSupportedContent">
                <div v-if="showAddStudent" class="col-6 d-flex justify-content-end justify-content-lg-start align-items-center">
                    <Button class="mx-3 px-3 py-2 fw-bold" @click="$router.push('/add-student')" :image-source="'add.svg'" :button-text="'Add Student'" :button-color="'bg-success'" :alternate-text="'Add Student'"/>
                </div>
                <div v-if="showLogout" class="col-6 d-flex align-items-center justify-content-start justify-content-lg-end">
                    <Button @click="logout" class="mx-3 px-3 py-2 fw-bold" :image-source="`logout.svg`" :button-text="`Logout`" :button-color="`bg-danger`" :alternate-text="`Logout`" />
                </div>
            </div>

        </div>
    </nav>
</template>

<script>
import Button from "./Button";
export default {
    name: "Navbar",
    components: {Button},
    props : {
        showAddStudent: Boolean,
        showLogout: Boolean
    },

    methods: {
        async logout() {
            await axios.post("/api/logout").then((res) => {
                this.$router.push("/login");
            })
        }
    }
}
</script>

<style scoped>
Button {
    word-break: keep-all;
}
</style>
