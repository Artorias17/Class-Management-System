import {createRouter, createWebHistory} from "vue-router"



// Lazy Loading Routes ----> https://router.vuejs.org/guide/advanced/lazy-loading.html#lazy-loading-routes

const EditStudent = () => import("../views/EditStudent");
const AddStudent = () => import("../views/AddStudent");
const Home = () => import("../views/Home");
const PageNotFound = () => import("../views/PageNotFound");
const Login = () => import("../views/Login");
const Register = () => import("../views/Register");
const StudentDetails = () => import("../views/StudentDetails");


const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
        meta: {requiresAuth: true},
        props: {msg: "", background: ""}      // Sending data for toast by props via <router-link> or <router-view> or router.push
    },
    {
        path: "/student/:studentID",
        name: "StudentDetails",
        component: StudentDetails,
        meta: {requiresAuth: true}
    },
    {
        path: "/edit-student/:studentID",
        name: "EditStudent",
        component: EditStudent,
        meta: {requiresAuth: true}
    },
    {
        path: "/add-student",
        name: "AddStudent",
        component: AddStudent,
        meta: {requiresAuth: true}
    },
    {
        path: "/:pathMatch(.*)*",
        name: "PageNotFound",
        component: PageNotFound
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
        meta: {requiresAuth: false}
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
        meta: {requiresAuth: false}
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

router.beforeEach(async (to, from) => {
    if(to.meta.requiresAuth && !await auth()){
        return {name: "Login"}
    }else if(!to.meta.requiresAuth && await auth()){
        return {name: "Home"}
    }
});

//api call works. Adjusting UI components
const auth = async () => {
    return (await axios.get("/api/user-status", {validateStatus: (status) => !(status === 401)})
        .then(() => true)
        .catch(() => false))
}

export default router
