<template>
    <Head title="Patients" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-start items-center">
                <h2 class="font-semibold text-xl text-white leading-tight flex-1">Record Service</h2>
                <SearchForm />
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
import SearchForm from '@/Components/SearchForm.vue';
import { Head, useForm } from '@inertiajs/vue3';
    const props = defineProps({
        patient: Object
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

    function addService() {
        serviceForm.post('/patients/' + props.patient?.id + "/add-service")
    }

    
</script>
