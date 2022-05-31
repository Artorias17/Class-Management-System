<template>
    <Navbar show-logout/>
    <div class="container-md px-5 pt-5 pb-3">
        <h1 class="text-light">Add Student</h1>
    </div>
    <Form :form-fields="arr" @submitForm="addData"/>
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
                .then((response) => response.status)
                .catch((response) => response.status)

            if(reply === 200){
                alert("Added Successfully")
                await this.$router.replace("/")
            }else{
                alert("Couldn't Add")
            }
        }
    }
}
</script>
