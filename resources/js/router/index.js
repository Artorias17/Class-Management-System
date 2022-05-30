import {createRouter, createWebHistory} from "vue-router"
import EditStudent from "../views/EditStudent";
import AddStudent from "../views/AddStudent";
import Home from "../views/Home";
import PageNotFound from "../views/PageNotFound";
import Login from "../views/Login";
import Register from "../views/Register";
import StudentDetails from "../views/StudentDetails";


const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
        meta: {requiresAuth: true},
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
