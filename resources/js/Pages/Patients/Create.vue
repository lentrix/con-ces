<template>
    <Head title="Patients" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-start items-center">
                <h2 class="font-semibold text-xl text-white leading-tight flex-1">Patients</h2>
                <form @submit.prevent="search">

                    <input type="text" v-model="searchForm.key"
                        class="rounded-full bg-transparent min-w-[300px] border-1 border-gray-400 text-gray-400 pe-8" >
                    <i class="fa fa-search search text-gray-400"></i>
                </form>
            </div>
        </template>

        <div class="py-12 px-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
                <div class="flex justify-between mb-5 bg-blur p-2 border-b border-blue-400">
                    <h2 class="text-gray-300 text-3xl">New Patient</h2>
                    
                </div>

                <div
                        class="bg-blur p-4 rounded-lg mb-3 box text-gray-200 shadow-md border border-blue-400">
                    <form @submit.prevent="submit">
                        <div class="input-group mb-3">
                            <label for="case_no">Case Number</label>
                            <input type="text" id="case_no" v-model="patientForm.case_no" required>
                            <div class="text-red-600" v-if="patientForm.errors.case_no">{{ patientForm.errors.case_no}}</div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" v-model="patientForm.last_name" required>
                            <div class="text-red-600" v-if="patientForm.errors.last_name">{{ patientForm.errors.last_name}}</div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" v-model="patientForm.first_name" required>
                            <div class="text-red-600" v-if="patientForm.errors.first_name">{{ patientForm.errors.first_name}}</div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="birth_date">Birth Date</label>
                            <input type="date" id="birth_date" v-model="patientForm.birth_date" required>
                            <div class="text-red-600" v-if="patientForm.errors.birth_date">{{ patientForm.errors.birth_date}}</div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="gender">Gender</label>
                            <select type="text" id="gender" v-model="patientForm.gender" required>
                                <option value="">Select gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <div class="text-red-600" v-if="patientForm.errors.gender">{{ patientForm.errors.gender}}</div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" id="address" v-model="patientForm.address">
                        </div>
                        
                        <div class="input-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" v-model="patientForm.phone">
                        </div>

                        <div class="input-group mb-3">
                            <label for="height">Height (cm)</label>
                            <input type="text" id="height" v-model="patientForm.height" required>
                            <div class="text-red-600" v-if="patientForm.errors.height">{{ patientForm.errors.height}}</div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <label for="weight">Weight (kilos)</label>
                            <input type="text" id="weight" v-model="patientForm.weight" required>
                            <div class="text-red-600" v-if="patientForm.errors.weight">{{ patientForm.errors.weight}}</div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, Head, useForm, router } from '@inertiajs/vue3';

    const searchForm = useForm({
        key:''
    })

    const patientForm = useForm({
        last_name: null,
        first_name: null,
        birth_date: null,
        gender: null,
        address: null,
        phone: null,
        height: null,
        weight: null,
        case_no: null,
    })

    function search() {
        searchForm.post('/patients/search')
    }

    function submit() {
        patientForm.post('/patients')
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