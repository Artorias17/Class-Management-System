<template>
    <Navbar/>
    <div class="container-md px-5 pt-5 pb-3">
        <h1 class="text-light">Register</h1>
    </div>
    <form @submit.prevent="doRegister" class="container-md px-5 py-2">
        <div class="form-control bg-dark bg-opacity-75 text-light w-50">
            <div class="container my-2" v-for="fieldData in formFields">
                <FormInput :input-field-type="fieldData.inputFieldType"
                           v-model:inputFieldValue="fieldData.inputFieldValue"
                           :label-content="fieldData.labelContent"
                           :placeholder-content="fieldData.placeholderContent"
                />
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                <Button type="submit" class="btn-lg" button-color="bg-success" button-text="Submit"/>
            </div>
            <div class="container my-3 d-flex justify-content-center align-items-center">
                <h5>Already have an account? <span><RouterLink class="link-primary" to="/login">Login</RouterLink></span></h5>
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
                },
                {
                    inputFieldType: "password",
                    inputFieldValue: "",
                    labelContent: "Confirm Password",
                    placeholderContent: "Enter your password here again",
                }
            ]
        }
    },
    methods: {
        doRegister() {
            const payload = {
                first_name: this.formFields[0].inputFieldValue,
                last_name: this.formFields[1].inputFieldValue,
                email: this.formFields[2].inputFieldValue,
                password: this.formFields[3].inputFieldValue,
                confirm_password: this.formFields[4].inputFieldValue
            }

            console.log(payload)
        }
    }
}
</script>
