<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container-md px-5 py-lg-0 py-md-2">
            <router-link class="navbar-brand mx-5" to="/">Class Management System</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 row">
                    <li v-if="showAddStudent" class="nav-item my-2 col-9 ms-4 m-lg-0">
                        <Button class="mx-3 px-3 py-2 fw-bold btn-outline-dark" @click="$router.push('/add-student')" :image-source="'add.svg'" :button-text="'Add Student'" :button-color="'bg-success'" :alternate-text="'Add Student'"/>
                    </li>
                    <li v-if="showLogout" class="nav-item my-2 ms-4 d-lg-flex justify-content-end m-lg-0" :class="showAddStudent ? 'col-3' : 'col-12'">
                        <Button @click="logout" class="mx-3 px-3 py-2 fw-bold btn-outline-dark" :image-source="`logout.svg`" :button-text="`Logout`" :button-color="`bg-danger`" :alternate-text="`Logout`" />
                    </li>
                </ul>
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
            await axios.post("/api/logout").then(() => {
                this.$router.push({name: "Login", params: {msg: "Logged Out", background: "bg-success"}});
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
