<script setup>
import { ref } from 'vue';


defineProps({
    collection: {
        type: Array,
        required: true
    }
})

const currentSelection = ref(1)
const selection = ref([])

const handleAddToSelection = () => {
    let alreadyExists = false
    selection.value.forEach(item => {

        if(item.id == currentSelection.value.id) {
            alreadyExists = true
            return
        }

    })

    if(alreadyExists) {
        return
    }

    selection.value.push(currentSelection.value)
}

const handleRemoveSelection = (index) => {
    selection.value = selection.value.filter(item => item.id !== index);
}

</script>


<template>
    <select v-model="currentSelection" class="rounded">
        <option v-for="(item, index) in collection" :key="index" :value="item">{{ item.name ? item.name : 'No item name' }}</option>
    </select>
    <button @click="handleAddToSelection" class="text-white bg-indigo-500 hover:bg-indigo-700 py-2 px-4 rounded ml-1">Add</button>
    <div>
        <ul>
            <li v-for="(item, index) in selection" :key="index">{{ item.name }} <span @click="handleRemoveSelection(item.id)">Remove</span></li>
        </ul>
    </div>
</template>