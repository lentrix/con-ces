<template>
    <form @submit.prevent="search">
        <input type="text" v-model="searchForm.key"
            class="rounded-full bg-transparent min-w-[300px] border-1 border-gray-400 text-gray-400 pe-8" >
        <i class="fa fa-search search text-gray-400"></i>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const searchForm = useForm({
    key:''
})
    
function search() {
    searchForm.post('/patients/search')
}

</script>

<style scoped>

form {
    position: relative;
}

.search {
    position: absolute;
    right: 10px;
    top: 12px;
}
    
</style>