<template>
    <Navbar show-logout show-add-student/>
    <div class="container-md px-5 pt-5 pb-3">
        <h1 class="text-light">Student Details</h1>
    </div>
    <div class="container-md px-5 py-2">
        <div class="container-fluid form-control bg-dark bg-opacity-75 text-light row">
            <div class="container my-4 mx-2 row">
                <h4 class="col-3">First Name:</h4>
                <h4 class="col">{{ details["first_name"] }}</h4>
            </div>
            <div class="container my-4 mx-2 row">
                <h4 class="col-3">Last Name:</h4>
                <h4 class="col">{{ details["last_name"] }}</h4>
            </div>
            <div class="container my-4 mx-2 row">
                <h4 class="col-3">Email:</h4>
                <h4 class="col">{{ details["email"] }}</h4>
            </div>
            <div class="container my-4 mx-2 row">
                <h4 class="col-3">Phone Number:</h4>
                <h4 class="col">{{ details["mobile_number"] }}</h4>
            </div>
        </div>
    </div>
    <div class="container-md px-5 pt-5 pb-3">
        <h3 class="text-light">Tuition History</h3>
        <p class="text-light">{{ `From ${getProperDate(details["created_at"], {month: "long"})} ${getProperDate(details["created_at"], {year: "numeric"})} to ${getProperDate(Date.now(), {month: "long"})} ${getProperDate(Date.now(), {year: "numeric"})}` }}</p>
    </div>
    <div class="container-md px-5 py-2">
        <div class="container-fluid form-control bg-dark bg-opacity-75 row p-5">
            <table class="table text-light m-auto">
                <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Month</th>
                    <th scope="col">Year</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(value, key) in tuitionData">
                    <th scope="row">{{ value.id }}</th>
                    <td>{{ getProperDate(key, {month: 'long'}) }}</td>
                    <td>{{ getProperDate(key, {year: 'numeric'}) }}</td>
                    <td>
                        <span v-if="value.paid" class="badge badge-success bg-success">Paid</span>
                        <span v-else class="badge badge-warning bg-warning text-dark">Due</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Navbar from "../components/Navbar";

export default {
    name: "StudentDetails",
    components: {Navbar},
    data() {
        return{
            details: Proxy,
            tuitionData: {}
        }
    },

    async created(){
        this.details = await window.axios.get(`/api/student/${this.$route.params.studentID}`)
            .then(res => res.data)
            .catch(err => err.response.data)

        let totalMonths = (new Date().getFullYear() - new Date(this.details["created_at"]).getFullYear()) * 12
        totalMonths += (new Date().getMonth() - new Date(this.details["created_at"]).getMonth()) + 1

        for(let currentMonth = 0; currentMonth < totalMonths; currentMonth++){
            let date = new Date()
            date.setDate(1)
            date.setMonth(date.getMonth() - currentMonth)
            this.tuitionData[`${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`] = {id: currentMonth+1, paid: false};
        }

        for(const item in this.details.tuition){
            let date = new Date(this.details.tuition[item]["created_at"])
            date.setDate(1)
            this.tuitionData[`${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`].paid = true;
        }

    },

    methods: {
        getProperDate(date, option){
            date = new Date(date).toLocaleString("default", option)
            return date
        },
    }
}
</script>

<style scoped>
tbody > tr:hover {
    background-color: var(--)
}
</style>
