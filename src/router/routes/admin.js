import Admin from "@/views/Admin.vue";
import AdminDashboard from "@/views/subviews/AdminDashboard.vue";

export default [
    {
        path: "/admin",
        component: Admin,
    },
    {
        path: "/admin/dashboard",
        component: AdminDashboard,
    }
];