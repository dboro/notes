<script setup>

import {ref} from "vue"
import {signIn} from "../service.js"

import { useRouter } from "vue-router"

const router = useRouter()

const model = ref({
    email: '',
    password: '',
})

const errors = ref({})

const loading = ref(false)

const submit = async () => {
    loading.value = true
    try {
        await signIn(model.value)
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
                            v-model="model.email"
                            label="Email"
                            :error-messages="errors.email"
                            class="mb-2"
                        ></v-text-field>

                        <v-text-field
                            density="comfortable"
                            variant="outlined"
                            type="password"
                            v-model="model.password"
                            label="Password"
                            :error-messages="errors.password"
                        ></v-text-field>
                    </v-card-text>

                    <v-card-actions class="mb-2">
                        <v-btn
                            type="submit"
                            variant="tonal"
                            color="primary"
                            :loading="loading"
                        >
                            Sign In
                        </v-btn>

                        <v-spacer/>

                        <v-btn
                            variant="tonal"
                            color="primary"
                            :to="{name: 'sign-up'}"
                        >
                            Sign Up
                        </v-btn>
                    </v-card-actions>
                </v-form>
            </v-card-text>
        </v-card>
    </div>
</template>

<style scoped>

</style>
