import { createRouter, createWebHistory } from 'vue-router';

import HomeRoutes from './routes/home';
import AboutRoutes from './routes/about';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    ...HomeRoutes,
    ...AboutRoutes,
  ]
});

export default router;