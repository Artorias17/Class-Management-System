<template>
    <div class="container-md p-5">
        <div class="card-grid row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-3">
            <div class="col"><Card student-name="John Doe" identity-number="123" :all-paid="true" email="example@example.com" phone-number="01234567891"/></div>
            <div class="col"><Card student-name="John Doe" identity-number="123" :all-paid="false" email="example@example.com" phone-number="01234567891"/></div>
            <div class="col"><Card student-name="John Doe" identity-number="123" :all-paid="false" email="example@example.com" phone-number="01234567891"/></div>
            <div class="col"><Card student-name="John Doe" identity-number="123" :all-paid="true" email="example@example.com" phone-number="01234567891"/></div>
            <div class="col"><Card student-name="John Doe" identity-number="123" :all-paid="false" email="example@example.com" phone-number="01234567891"/></div>
            <div class="col"><Card student-name="John Doe" identity-number="123" :all-paid="true" email="example@example.com" phone-number="01234567891"/></div>
        </div>
    </div>
</template>

<script>
import Card from "./Card";
export default {
    name: "CardContainer",
    components: {Card}
}
</script>
