<script setup>
import {onMounted, ref} from "vue"
import {getNotes, deleteNote} from "../service.js"
import {useRouter} from "vue-router"

const router = useRouter()

const emits = defineEmits([
    'loaded'
])

const items = ref([])

onMounted(async () => {
    items.value = await getNotes()
    emits('loaded')
})

const deleteItem = async (item) => {
    await deleteNote(item.id)
    items.value.splice(items.value.indexOf(item), 1)
}
</script>

<template>
    <v-table>
        <thead>
        <tr>
            <th class="text-left">
                Title
            </th>

            <th class="text-left">
                Content
            </th>

            <th class="text-right">
                Actions
            </th>
        </tr>
        </thead>

        <tbody>
        <tr
            v-for="item in items"
            :key="item.id"
        >
            <td>{{ item.title }}</td>

            <td>{{ item.content }}</td>

            <td class="text-right">
                <v-btn
                    density="comfortable"
                    size="small"
                    variant="tonal"
                    color="primary"
                    icon="mdi-pencil"
                    :to="{name: 'edit-note', params: {id: item.id}}"
                ></v-btn>

                <v-btn
                    class="ml-2"
                    density="comfortable"
                    size="small"
                    variant="tonal"
                    color="error"
                    icon="mdi-delete"
                    @click="deleteItem(item)"
                ></v-btn>
            </td>
        </tr>
        </tbody>
    </v-table>
</template>

<style scoped>

</style>
