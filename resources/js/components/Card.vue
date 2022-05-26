<template>
    <div class="student-card card justify-content-center align-items-center w-100 bg-dark bg-opacity-75 text-light">
        <img src="/img/student.svg" class="student-image img-fluid card-img-top pt-3" alt="Student Image">
        <div class="card-body">
            <h5 class="card-title text-center">{{studentName}}</h5>
        </div>
        <ul class="container-fluid p-2 list-group list-group-flush">
            <li class="list-group-item d-flex flex-nowrap align-items-center bg-dark bg-opacity-75  text-light">
                <img class="img-fluid me-3" width="32" src="/img/id.svg" alt="ID">
                <p class="my-1">{{ identityNumber }}</p>
            </li>
            <li class="list-group-item d-flex flex-nowrap align-items-center bg-dark bg-opacity-75  text-light">
                <img class="img-fluid me-3" width="32" src="/img/phone.svg" alt="Phone">
                <p class="my-1">{{ phoneNumber }}</p>
            </li>
            <li class="list-group-item d-flex flex-nowrap align-items-center bg-dark bg-opacity-75  text-light">
                <img class="img-fluid me-3" width="32" src="/img/email.svg" alt="Email">
                <p class="my-1">{{email}}</p>
            </li>
            <li v-if="allPaid" :class="`list-group-item d-flex flex-nowrap align-items-center bg-success text-light`">
                <img class="img-fluid me-3" width="32" src="/img/tuition.svg" alt="Tuition Status">
                <p class="my-1">Paid</p>
            </li>
            <li v-else :class="`list-group-item d-flex flex-nowrap align-items-center bg-danger text-light`">
                <img class="img-fluid me-3" width="32" src="/img/tuition.svg" alt="Tuition Status">
                <p class="my-1">Due</p>
            </li>
        </ul>
        <div class="card-body container-fluid d-flex justify-content-center align-items-center">
            <Button button-text="Edit" button-color="bg-warning" image-source="edit.svg" alternate-text="Edit" class="mx-3 px-3 py-2"/>
            <Button button-text="Delete" button-color="bg-danger" image-source="delete.svg" alternate-text="Delete" class="mx-3 px-3 py-2"/>
        </div>
    </div>
</template>

<script>
import Button from "./Button";

export default {
    name: "Card",
    components: {
        Button
    },
    props: {
        identityNumber: String,
        studentName: String,
        allPaid: Boolean,
        email: String,
        phoneNumber: String,
    }

}
</script>

<style>
.student-image {
    width: 128px !important;

}

.student-card {
    min-width: 18rem !important;
}
</style>
