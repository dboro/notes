<script setup>
import AddNoteForm from "../components/AddNoteForm.vue";
import {useRouter} from "vue-router"

const router = useRouter()

</script>

<template>
    <v-container>
        <v-card>
            <v-card-title class="d-flex">
                <span>Add note</span>
                <v-spacer/>
                <v-btn
                    color="primary"
                    variant="tonal"
                    :to="{name: 'notes'}"
                >
                    To List
                </v-btn>
            </v-card-title>

            <v-card-text class="pt-4">
                <AddNoteForm @success="router.push({name: 'notes'})"></AddNoteForm>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<style scoped>

</style>
