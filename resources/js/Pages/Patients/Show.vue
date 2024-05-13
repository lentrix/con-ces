<template>
    <Head title="Patient View" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-start items-center">
                <h2 class="font-semibold text-xl text-white leading-tight flex-1">Patient View</h2>
                <form @submit.prevent="search">

                    <input type="text" v-model="searchForm.key"
                        class="rounded-full bg-transparent min-w-[270px] border-1 border-gray-400 text-gray-400 pe-8" >
                    <i class="fa fa-search search text-gray-400"></i>
                </form>
            </div>
        </template>

        <div class="py-12 px-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
                <div class="bg-blur p-4 rounded-lg mb-3 box text-gray-200 shadow-md border border-blue-400">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl">{{ patient.first_name }} {{ patient.last_name }}</h3>
                        <h3 class="text-right font-bold text-blue-300 rounded">Case # {{ patient.case_no }}</h3>
                    </div>
                    <div>{{ patient.address }}</div>
                    <div class="mb-3">Phone# {{ patient.phone }}</div>
                    <div class="flex justify-between">
                        <div>Gender: {{ patient.gender }}</div>
                        <div>Birth Date: {{ patient.birth_date }}</div>
                        <div>Age: {{ patient.age }}</div>
                    </div>
                    <div class="flex justify-between">
                        <div>Height: {{ patient.height }}</div>
                        <div>Weight: {{ patient.weight }}</div>
                    </div>

                </div>

                <div class="bg-blur p-4 rounded-lg mb-3 box text-gray-200 shadow-md border border-blue-400">
                    <div class="flex justify-between mb-2">
                        <h3 class="text-2xl text-white">Service History</h3>
                        <Link :href="'/patients/' + patient.id + '/add-service'"
                                class="bg-blue-400 border-blue-300 border rounded flex items-center px-2">
                            <i class="fa fa-plus"></i>
                        </Link>
                    </div>   
                    <hr class="border-blue-300 mb-2">
                    <div v-for="service in patient.services">
                        <div class="border border-blue-300 p-2 rounded bg-blue-900 mb-2">
                            <div class="mb-2 flex justify-between">
                                <div><div class="font-bold inline text-blue-300">Date:</div> {{ service.date }}</div>

                                <div class="del-button">
                                    <button class="text-red-500" @click="() => attemptDelete(service.id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>

                            </div> 
                            <div class="mb-2">
                                <div class="font-bold inline text-blue-300">Complaints:</div> {{ service.complaints }}
                            </div> 
                            <div class="mb-2">
                                <div class="font-bold inline text-blue-300">Remarks:</div> {{ service.remarks }}
                            </div> 
                            <div class="flex justify-between">
                                <div class="p-1 bg-blue-600 shadow rounded" v-if="service.temp">
                                    <i class="fa-solid fa-temperature-half"></i> {{ service.temp }}
                                </div>
                                <div class="p-1 bg-blue-600 shadow rounded" v-if="service.dias">
                                    <i class="fa-solid fa-stethoscope"></i> {{ service.sys }}/{{ service.dias }}
                                </div>
                                <div class="p-1 bg-blue-600 shadow rounded" v-if="service.pr">
                                    <i class="fa-solid fa-heart-pulse"></i> {{ service.pr }}
                                </div>
                                <div class="p-1 bg-blue-600 shadow rounded" v-if="service.rr">
                                    <i class="fa-solid fa-lungs"></i> {{ service.rr }}
                                </div>
                                <div class="p-1 bg-blue-600 shadow rounded" v-if="service.cbs">
                                    <i class="fa-solid fa-vial"></i> {{ service.cbs }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    patient: Object
})

const searchForm = useForm({
    key:''
})

function search() {
    searchForm.post('/patients/search')
}

function attemptDelete(id) {
    let deleteConfirmation = confirm("You are about to delete this service record. Shall we proceed?")
    
    if(deleteConfirmation) {
        router.delete('/services/' + id)
    }
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