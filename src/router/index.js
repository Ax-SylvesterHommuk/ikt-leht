import { createRouter, createWebHistory } from 'vue-router';

import HomeRoutes from './routes/home';
import EventsRoutes from './routes/events';
import EventInfoRoutes from './routes/eventinfo';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    ...HomeRoutes,
    ...EventsRoutes,
    ...EventInfoRoutes,
  ]
});

export default router;