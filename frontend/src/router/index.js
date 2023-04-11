import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Books from '../views/Books/Index.vue'
import CreateBook from '../views/Books/Create.vue'
import EditBook from '../views/Books/Edit.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // {
    //   path: '/',
    //   name: 'home',
    //   component: HomeView
    // },
    {
      path: '/books',
      name: 'books',
      component: Books
    },
    {
      path: '/books/create',
      name: 'create-book',
      component: CreateBook
    },
    {
      path: '/book/:id/edit',
      name: 'edit-book',
      component: EditBook
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
