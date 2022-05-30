<template>
    <Navbar show-logout show-add-student/>
    <div class="container-md px-5 pt-5 pb-3">
        <h1 class="text-light">Edit Student</h1>
    </div>
    <Form :form-fields="arr" @submitForm="updateData"/>
</template>

<script>
import Navbar from "../components/Navbar";
import Form from "../components/Form";
export default {
    name: "EditStudent",
    components: {Navbar, Form},

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

    async created() {
        let apiCall = await axios.get(`/api/student/${this.$route.params.studentID}`).then(response => response.data)
        this.arr[0].inputFieldValue = apiCall["first_name"]
        this.arr[1].inputFieldValue = apiCall["last_name"]
        this.arr[2].inputFieldValue = apiCall["email"]
        this.arr[3].inputFieldValue = apiCall["mobile_number"]
    },

    methods: {
        async updateData() {
            let reply = await axios.put(`/api/student/${this.$route.params.studentID}`,
                {
                    first_name: this.arr[0].inputFieldValue,
                    last_name: this.arr[1].inputFieldValue,
                    email: this.arr[2].inputFieldValue,
                    mobile_number: this.arr[3].inputFieldValue
                })
                .then((response) => response.status)
                .catch((response) => response.status)

            if(reply === 200){
                alert("Updated Successfully")
                await this.$router.push("/")
            }else{
                alert("Couldn't Update")
            }
        }
    }
}
</script>
