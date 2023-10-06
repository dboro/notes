<script setup>
import {onMounted, ref} from "vue";
import {storeNote} from "../service.js";

const emits = defineEmits([
    'success'
])

const model = ref({})

const errors = ref({})

const loading = ref(false)

onMounted(async () => {

})

const submit = async () => {
    loading.value = true
    try {
        await storeNote(model.value)
        emits('success')
    } catch (error) {
        if (error.response.status === 422) {
            errors.value = error.response.data.errors
        }
    } finally {
        loading.value = false
    }
}
</script>

<template>
    <v-form @submit.prevent="submit">
        <v-text-field
            autofocus
            density="comfortable"
            variant="outlined"
            v-model="model.title"
            label="Title"
            :error-messages="errors.title"
            class="mb-3"
        ></v-text-field>

        <v-text-field
            density="comfortable"
            variant="outlined"
            v-model="model.content"
            label="Content"
            :error-messages="errors.content"
            class="mb-3"
        ></v-text-field>

        <v-btn
            type="submit"
            variant="tonal"
            color="primary"
            :loading="loading"
        >
            Save
        </v-btn>
    </v-form>
</template>

<style scoped>

</style>
