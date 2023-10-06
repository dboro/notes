<script setup>
import NotesTable from "../components/NotesTable.vue"
import {ref} from "vue";

const loading = ref(true)
</script>

<template>
    <v-container>
        <v-card :loading="loading">
            <v-card-title class="d-flex">
                <span>Notes</span>

                <v-spacer/>

                <v-btn
                    color="primary"
                    variant="tonal"
                    :to="{name: 'add-note'}"
                >
                    Add Note
                </v-btn>
            </v-card-title>

            <v-card-text>
                <NotesTable @loaded="loading = false"></NotesTable>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<style scoped>

</style>
