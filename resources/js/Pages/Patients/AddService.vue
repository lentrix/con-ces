<template>
    <Head title="Patients" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-start items-center">
                <h2 class="font-semibold text-xl text-white leading-tight flex-1">Record Service</h2>
                <form @submit.prevent="search">

                    <input type="text" v-model="searchForm.key"
                        class="rounded-full bg-transparent min-w-[200px] border-1 border-gray-400 text-gray-400 pe-8" >
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
                    <h3 class="text-2xl">Add Service Form</h3>
                    <hr class="border-blue-300 mb-3">
                    <form @submit.prevent="addService">
                        <div class="input-group mb-3">
                            <label for="date">Date</label>
                            <input type="date" required v-model="serviceForm.date">
                        </div>
                        <div class="input-group mb-3">
                            <label for="complaints">Complaints</label>
                            <textarea id="complaints" rows="3" required v-model="serviceForm.complaints"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <label for="temp">Temperature (celsius)</label>
                            <input type="number" step="0.1" required v-model="serviceForm.temp">
                        </div>
                        <div class="input-group mb-3">
                            <label for="sys">Systolic</label>
                            <input type="number" v-model="serviceForm.sys">
                        </div>
                        <div class="input-group mb-3">
                            <label for="dias">Diastolic</label>
                            <input type="number" v-model="serviceForm.dias">
                        </div>
                        <div class="input-group mb-3">
                            <label for="rr">Respiratory Rate</label>
                            <input type="text" v-model="serviceForm.rr">
                        </div>
                        <div class="input-group mb-3">
                            <label for="pr">Pulse Rate</label>
                            <input type="text" v-model="serviceForm.pr">
                        </div>
                        <div class="input-group mb-3">
                            <label for="cbs">CBS</label>
                            <input type="text" v-model="serviceForm.cbs">
                        </div>
                        <div class="input-group mb-3">
                            <label for="bmi">BMI</label>
                            <input type="number" step="0.01" v-model="serviceForm.bmi">
                        </div>
                        <button class="btn primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
    const props = defineProps({
        patient: Object
    })
    const searchForm = useForm({
        key:''
    })

    const serviceForm = useForm({
        date: '',
        complaints: '',
        remarks: '',
        temp: null,
        sys: null,
        dias: null,
        rr: null,
        pr: null,
        cbs: null,
        bmi: null,
        patient_id: props.patient?.id,
    })

    function search() {
        searchForm.post('/patients/search')
    }

    function addService() {
        serviceForm.post('/patients/' + props.patient?.id + "/add-service")
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