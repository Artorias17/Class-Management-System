<template>
    <Navbar/>
    <div class="container-md px-5 pt-5 pb-3">
        <h1 class="text-light">Register</h1>
    </div>
    <form class="container-md px-5 py-2">
        <div class="form-control bg-dark bg-opacity-75 text-light w-50">
            <div class="container my-2" v-for="fieldData in formFields">
                <FormInput :input-field-type="fieldData.inputFieldType"
                           :input-field-value="fieldData.inputFieldValue"
                           :label-content="fieldData.labelContent"
                           :placeholder-content="fieldData.placeholderContent"
                />
            </div>
            <div class="container my-2 d-flex justify-content-center align-items-center my-3">
                <Button button-color="bg-success" button-text="Submit"/>
            </div>
        </div>
    </form>
</template>

<script>
import Navbar from "../components/Navbar";
import FormInput from "../components/FormInput";
import Button from "../components/Button";
export default {
    name: "Register",
    components: {Navbar, FormInput, Button},
    data() {
        return {
            formFields: [
                {
                    inputFieldType: "text",
                    inputFieldValue: "",
                    labelContent: "First Name",
                    placeholderContent: "Enter your first name here",
                },
                {
                    inputFieldType: "text",
                    inputFieldValue: "",
                    labelContent: "Last Name",
                    placeholderContent: "Enter your last name here",
                },
                {
                    inputFieldType: "email",
                    inputFieldValue: "",
                    labelContent: "Email",
                    placeholderContent: "Enter your email here",
                },
                {
                    inputFieldType: "password",
                    inputFieldValue: "",
                    labelContent: "Password",
                    placeholderContent: "Enter your password here",
                }
            ]
        }
    }
}
</script>
