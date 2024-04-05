import { createRouter, createWebHistory } from 'vue-router';

import HomeRoutes from './routes/home';
import EventsRoutes from './routes/events';
import EventInfoRoutes from './routes/eventinfo';
import PraktikaRoutes from './routes/praktika';
import ErialadRoutes from './routes/erialad';
import TunnustusedRoutes from './routes/tunnustused';
import TunniplaanRoutes from './routes/tunniplaan.js'
import KontaktRoutes from './routes/kontakt.js'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    ...HomeRoutes,
    ...EventsRoutes,
    ...EventInfoRoutes,
    ...PraktikaRoutes,
    ...TunnustusedRoutes,
    ...TunniplaanRoutes,
    ...ErialadRoutes,
    ...KontaktRoutes
  ]
});

export default router;