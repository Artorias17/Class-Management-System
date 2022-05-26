import {createRouter, createWebHistory} from "vue-router"
import EditStudent from "../views/EditStudent";
import AddStudent from "../views/AddStudent";
import Home from "../views/Home";
import PageNotFound from "../views/PageNotFound";
import Login from "../views/Login";
import Register from "../views/Register";


const routes = [
    {
        path: "/",
        name: "Home",
        component: Home
    },
    {
        path: "/edit-student/:studentID",
        name: "EditStudent",
        component: EditStudent
    },
    {
        path: "/add-student",
        name: "AddStudent",
        component: AddStudent
    },
    {
        path: "/:pathMatch(.*)*",
        name: "PageNotFound",
        component: PageNotFound
    },
    {
        path: "/login",
        name: "Login",
        component: Login
    },
    {
        path: "/register",
        name: "Register",
        component: Register
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
