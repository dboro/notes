<script setup>
import EditNoteForm from "../components/EditNoteForm.vue"
import {useRouter, useRoute} from "vue-router"
import {ref} from "vue";

const router = useRouter()
const route = useRoute()

const loading = ref(true)

</script>

<template>
    <v-container>
        <v-card :loading="loading">
            <v-card-title class="d-flex">
                <span>Edit note</span>
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
                <EditNoteForm
                    :id="route.params.id"
                    @success="router.push({name: 'notes'})"
                    @loaded="loading = false"
                ></EditNoteForm>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<style scoped>

</style>
