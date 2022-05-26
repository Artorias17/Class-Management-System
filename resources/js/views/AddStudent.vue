<template>
    <Navbar/>
    <div class="container-md px-5 pt-5 pb-3">
        <h1 class="text-light">Add Student</h1>
    </div>
    <Form :form-fields="arr"/>
</template>

<script>
import Form from "../components/Form";
import Navbar from "../components/Navbar";

export default {
    name: "AddStudent",
    components: {Form, Navbar},
    data() {
        return {
            arr: [
                {
                    labelContent: "First Name",
                    placeholderContent: "John",
                    inputFieldType: "text",
                    inputFieldValue: ""
                },
                {
                    labelContent: "Last Name",
                    placeholderContent: "Doe",
                    inputFieldType: "text",
                    inputFieldValue: ""
                },
                {
                    labelContent: "Email",
                    placeholderContent: "example@example.com",
                    inputFieldType: "email",
                    inputFieldValue: ""
                },
                {
                    labelContent: "Phone Number",
                    placeholderContent: "01234567891",
                    inputFieldType: "tel",
                    inputFieldValue: ""
                },
            ]
        }
    }
}
</script>

<style scoped>

</style>
