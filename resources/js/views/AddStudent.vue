<template>
    <div>
        <Navbar show-logout/>
        <div class="container-md px-5 pt-5 pb-3">
            <h1 class="text-light">Add Student</h1>
        </div>
        <Form :form-fields="arr" @submitForm="addData"/>
        <ToastNotification :background="toastBG" :message="toastMsg" :key="failedAttempts"/>
    </div>
</template>

<script>
import Form from "../components/Form";
import Navbar from "../components/Navbar";
import ToastNotification from "../components/ToastNotification";

export default {
    name: "AddStudent",
    components: {Form, Navbar, ToastNotification},
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
            ],
            toastMsg: "",
            toastBG: "",
            failedAttempts: 0
        }
    },
    methods: {
        async addData() {
            let reply = await axios.post(`/api/student`,
                {
                    first_name: this.arr[0].inputFieldValue,
                    last_name: this.arr[1].inputFieldValue,
                    email: this.arr[2].inputFieldValue,
                    mobile_number: this.arr[3].inputFieldValue
                })
                .then((response) => response)
                .catch((err) => err.response)

            if(reply.status === 200){
                await this.$router.replace({name: "Home", params:{msg: "Student added successfully.", background: "bg-success"}})
            }else{
                this.toastMsg = reply.data.message
                this.toastBG = "bg-danger"
                this.failedAttempts++
            }
        }
    }
}
</script>
