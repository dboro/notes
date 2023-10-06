<script setup>

import {ref} from "vue";
import {signUp} from "../service.js";
import { useRouter } from "vue-router"

const router = useRouter()

const model = ref({
    email: '',
    password: '',
})

const errors = ref({})

const loading = ref(false)

const valid = ref(true)

const submit = async () => {
    loading.value = true
    try {
        await signUp(model.value)
        router.push({name: 'notes'})
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
    <div class="d-flex justify-center align-center" style="height: 100%">
        <v-card>
            <v-card-text>
                <v-form @submit.prevent="submit">
                    <v-card-text class="pa-2" style="width: 300px">
                        <v-text-field
                            autofocus
                            density="comfortable"
                            variant="outlined"
                            v-model="model.name"
                            label="Логин"
                            :error-messages="errors.name"
                            class="mb-3"
                        ></v-text-field>

                        <v-text-field
                            density="comfortable"
                            variant="outlined"
                            v-model="model.email"
                            label="Email"
                            :error-messages="errors.email"
                            class="mb-3"
                        ></v-text-field>

                        <v-text-field
                            density="comfortable"
                            variant="outlined"
                            type="password"
                            v-model="model.password"
                            label="Password"
                            :error-messages="errors.password"
                            class="mb-3"
                        ></v-text-field>

                        <v-text-field
                            density="comfortable"
                            variant="outlined"
                            type="password"
                            v-model="model.password_confirmation"
                            label="Confirm password"
                            :error-messages="errors.password_confirmation"
                            class="mb-3"
                        ></v-text-field>
                    </v-card-text>

                    <v-card-actions class="mb-3">
                        <v-btn
                            type="submit"
                            variant="tonal"
                            color="primary"
                            :loading="loading"
                            :disabled="!valid"
                        >
                            Sign Un
                        </v-btn>
                    </v-card-actions>
                </v-form>
            </v-card-text>
        </v-card>
    </div>
</template>

<style scoped>

</style>
