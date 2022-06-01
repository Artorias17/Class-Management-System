<template>
    <Navbar show-logout show-add-student/>
    <div class="container-md px-5 pt-5 pb-3">
        <h1 class="text-light">Edit Student</h1>
    </div>
    <Form :form-fields="arr" @submitForm="updateData"/>
    <ToastNotification :background="toastBG" :message="toastMsg" :key="failedAttempts"/>
</template>

<script>
import Navbar from "../components/Navbar";
import Form from "../components/Form";
import ToastNotification from "../components/ToastNotification";
export default {
    name: "EditStudent",
    components: {Navbar, Form, ToastNotification},
    props: {
        studentID: Number
    },

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

    async created() {
        let apiCall = await axios.get(`/api/student/${this.studentID}`)
            .then(response => response.data)
            .catch(async () => await this.$router.push({name: "PageNotFound"}))

        this.arr[0].inputFieldValue = apiCall["first_name"]
        this.arr[1].inputFieldValue = apiCall["last_name"]
        this.arr[2].inputFieldValue = apiCall["email"]
        this.arr[3].inputFieldValue = apiCall["mobile_number"]
    },

    methods: {
        async updateData() {
            let reply = await axios.put(`/api/student/${this.studentID}`,
                {
                    id: this.studentID,
                    first_name: this.arr[0].inputFieldValue,
                    last_name: this.arr[1].inputFieldValue,
                    email: this.arr[2].inputFieldValue,
                    mobile_number: this.arr[3].inputFieldValue
                })
                .then((response) => response)
                .catch((error) => error.response)

            if(reply.status === 200){
                await this.$router.replace({name: "Home", params:{msg: "Student updated successfully.", background: "bg-success"}})
            }else{
                this.toastMsg = reply.data.message
                this.toastBG = "bg-danger"
                this.failedAttempts++
            }
        }
    }
}
</script>
