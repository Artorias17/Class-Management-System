<template>
    <nav class="navbar navbar-expand-xl navbar-dark bg-primary sticky-top">
        <div class="container-md px-5 py-lg-0 py-md-2">
            <router-link class="navbar-brand mx-5" to="/">Class Management System</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul v-if="showAddStudent" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/add-student" class="nav-link active" aria-current="page" href="#">Add Student</router-link>
                    </li>
                </ul>
                <form v-if="showSearch" class="d-flex" role="search" @submit.prevent="$emit('doSearch', searchTerm)">
                    <input class="form-control me-2" type="search" placeholder="Search for student" aria-label="Search" v-model="searchTerm">
                    <Button class="mx-3 px-3 py-2 fw-bold" type="submit" :alternate-text="'search'" :button-color="'bg-success'" :button-text="'Search'" :image-source="'search.svg'"/>
                </form>
                <div v-if="showLogout" class="d-lg-flex justify-content-center align-items-center ms-auto">
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
        showSearch: Boolean,
        showLogout: Boolean
    },
    data() {
        return{
            searchTerm: ""
        }
    },
    emits: ["doSearch"],

    methods: {
        async logout() {
            await axios.post("/api/logout").then((res) => {
                this.$router.push("/login");
            })
        }
    }
}
</script>
