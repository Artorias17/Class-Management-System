<template>
    <Navbar/>
    <div class="container-md px-5 pt-5 pb-3">
        <h1 class="text-light">Login</h1>
    </div>
    <form @submit.prevent="loginHandler()" class="container-md px-5 py-2">
        <div class="form-control bg-dark bg-opacity-75 text-light w-50">
            <div class="container my-2" v-for="fieldData in formFields">
                <FormInput :input-field-type="fieldData.inputFieldType"
                           v-model:inputFieldValue="fieldData.inputFieldValue"
                           :label-content="fieldData.labelContent"
                           :placeholder-content="fieldData.placeholderContent"
                />
            </div>
            <div class="container my-2 d-flex justify-content-center align-items-center my-3">
                <Button type="submit" class="btn-lg" button-color="bg-success" button-text="Submit"/>
            </div>
            <div class="container my-2 d-flex justify-content-center align-items-center mt-5 mb-3">
                <h5>Don't have an account? <span><RouterLink class="link-primary" to="/register">Register</RouterLink></span></h5>
            </div>
        </div>
    </form>
</template>

<script>
import Navbar from "../components/Navbar";
import FormInput from "../components/FormInput";
import Button from "../components/Button";
export default {
    name: "Login",
    components: {Navbar, FormInput, Button},
    data() {
        return {
            formFields: [
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
    },

    methods: {
        async loginHandler() {
            let loginCredentials = {email: this.formFields[0].inputFieldValue, password: this.formFields[1].inputFieldValue}

            await axios.get("sanctum/csrf-cookie")
                .then(() => {
                    axios.post("api/login", loginCredentials)
                        .then(() => this.$router.push("/"))
                        .catch(err => console.log(err))
                })
                .catch(err => console.log(err))
        }
    }
}
</script>
