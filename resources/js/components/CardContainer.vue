<template>
    <div class="container my-5 p-0">
        <div class="row justify-content-center align-items-center">
            <h1 class="text-light col-6" v-if="!inputFieldValue.length">Total Students: {{cardsAvailable}}</h1>
            <h1 class="text-light col-6" v-else>Search Results: Students: {{cardSearchResult}}</h1>
            <div class=" col-lg-5 container justify-content-end align-self-start">
                <FormInput class="text-light "
                           labelContent="Search"
                           placeholderContent="Search by name or by terms paid/due"
                           inputFieldType="search"
                           v-model:inputFieldValue="inputFieldValue"
                />
            </div>
        </div>

        <div class="card-grid row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-4">
            <div class="col m-0 my-2 my-md-4 my-lg-1 my-xl-3 my-xxl-2 p-0 d-flex justify-content-center align-items-center" v-for="(cardData, index) in filterCards">
                <Card :student-name="`${cardData['first_name']} ${cardData['last_name']} `"
                      :identity-number="String(cardData['id'])" :all-paid="cardData['allPaid']"
                      :email="cardData['email']" :phone-number="cardData['mobile_number']"
                      @del="deleteStudent(index)"
                />
            </div>
        </div>
    </div>
</template>

<script>
import Card from "./Card";
import Button from "./Button";
import FormInput from "./FormInput";
export default {
    name: "CardContainer",
    components: {Card, Button, FormInput},
    emits: ["toastMsg"],
    data() {
        return {
            cardContent: [],
            cardsAvailable: 0,
            cardSearchResult: 0,
            inputFieldValue: ""
        }
    },

    async created() {
         await window.axios.get("api/student").then((response) => {
             this.cardContent = response.data
             this.cardsAvailable = this.cardContent.length;
        })
        this.cardContent.forEach(user => {
            if(user.tuition.length === 0) user.allPaid = false;
            else{
                user.tuition.forEach(() => {
                    user.allPaid = (new Date().getFullYear() - new Date(user.created_at).getFullYear()) * 12
                    user.allPaid += (new Date().getMonth() - new Date(user.created_at).getMonth()) + 1
                    user.allPaid = user.allPaid <= user.tuition.length
                })
            }
        })
    },

    methods: {
        async deleteStudent(index) {
            await window.axios.delete(`api/student/${this.cardContent[index].id}`)
                .then(() => {
                    this.cardContent.splice(index, 1)
                    this.cardsAvailable--;
                    this.$emit("toastMsg", ["Student deleted successfully.", "bg-success"])
                })
                .catch(error => this.$emit("toastMsg", [error.response.data["message"], "bg-danger"]))
        }
    },

    computed: {
        filterCards(){
            let filterText = this.inputFieldValue.trim().toLowerCase()
            let filteredCards = null
            if(filterText === "paid" || filterText === "due"){
                filterText = filterText === "paid"
                filteredCards = this.cardContent.filter((item) => (item["allPaid"]=== filterText))
                this.cardSearchResult = filteredCards.length
                return filteredCards
            }else{
                filteredCards = this.cardContent.filter((item) => (
                    item["first_name"].trim().toLowerCase().includes(filterText) ||
                    item["last_name"].trim().toLowerCase().includes(filterText)))
                this.cardSearchResult = filteredCards.length
                return filteredCards
            }
        }
    }
}
</script>

<style scoped>
label {
    font-size: 1.5rem;
}

</style>
