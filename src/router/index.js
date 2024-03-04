import { createRouter, createWebHistory } from 'vue-router';

import HomeRoutes from './routes/home';
import EventsRoutes from './routes/events';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    ...HomeRoutes,
    ...EventsRoutes,
  ]
});

export default router;