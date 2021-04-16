import Vue from 'vue'
import Router from 'vue-router'

import Index from './views/index';
import TopConfirmed from './views/topConfirmed';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Index
        },
        {
            path: '/top/confirmed',
            component: TopConfirmed,
            props(Route) {
                return {
                    observation_date: Route.query.observation_date,
                    max_results: parseInt(Route.query.max_results)
                };
            }
        }
    ]
})

