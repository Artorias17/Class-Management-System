<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container-md px-5 py-2">
            <router-link to="/" class="navbar-brand mx-5" href="#">Class Management System</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul v-if="showAddStudent" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/add-student" class="nav-link active" aria-current="page" href="#">Add Student</router-link>
                    </li>
                </ul>
                <form v-if="showSearch" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search for student" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
    props : {
        showAddStudent: Boolean,
        showSearch: Boolean
    }
}
</script>
