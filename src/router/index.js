import { createRouter, createWebHistory } from 'vue-router';

import HomeRoutes from './routes/home';
import EventsRoutes from './routes/events';
import EventInfoRoutes from './routes/eventinfo';
import PraktikaRoutes from './routes/praktika';
import TunnustusedRoutes from './routes/tunnustused';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    ...HomeRoutes,
    ...EventsRoutes,
    ...EventInfoRoutes,
    ...PraktikaRoutes,
    ...TunnustusedRoutes,
  ]
});

export default router;