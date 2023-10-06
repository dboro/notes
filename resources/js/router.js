import Notes from "./pages/Notes.vue"
import AddNote from "./pages/AddNote.vue"
import EditNote from "./pages/EditNote.vue"
import SignIn from "./pages/SignIn.vue"
import SignUp from "./pages/SignUp.vue"

import { createRouter, createWebHistory,  } from 'vue-router'


const routes = [
    { path: '/', component: Notes, name: 'notes' },
    { path: '/add-notes', component: AddNote, name: 'add-note' },
    { path: '/edit-notes/:id', component: EditNote, name: 'edit-note' },
    { path: '/', component: Notes, name: 'notes' },
    { path: '/sign-in', component: SignIn, name: 'sign-in' },
    { path: '/sign-up', component: SignUp, name: 'sign-up' }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.onError((e) => {
    console.info(e)
})

export default router


