<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Link, Head, router } from '@inertiajs/vue3';
    import SearchForm from '@/Components/SearchForm.vue';


    const props = defineProps({
        patients: Array,
        title: 'Recent Patients'
    })

    function open(id) {
        router.visit('/patients/' + id)
    }
</script>
<template>
    <Head title="Patients" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-start items-center">
                <h2 class="font-semibold text-xl text-white leading-tight flex-1">Patients</h2>
                <SearchForm />
            </div>
        </template>

        <div class="py-12 px-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
                <div class="flex justify-between mb-5 bg-blur p-2 border-b border-blue-400">
                    <h2 class="text-gray-300 text-3xl">{{ title }}</h2>
                    <Link href="/patients/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </Link>
                </div>

                <div
                        @click="open(patient.id)"
                        v-for="patient in patients" :key="patient.id"
                        class="bg-blur p-4 rounded-lg mb-3 box text-gray-200 shadow-md border border-blue-400">
                    <h4 class="text-2xl uppercase">Case # {{patient.case_no}}</h4>
                    <hr>
                    <div class="flex">
                        <div class="text-2xl flex-1">{{ patient.last_name }}, {{ patient.first_name }}</div>
                        <div class="text-2xl">Age: {{ patient.age }}</div>
                    </div>
                    <div class="italic">{{ patient.address }}</div>
                    <div>Phone# {{ patient.phone }}</div>
                    <div class="flex justify-between">
                        <div>Date of birth: {{ patient.birth_date }}</div>
                        <div>Gender: {{ patient.gender }}</div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

.box {
    cursor: pointer;
}

.box:hover {
    transform: scale(1.05);
    transition-duration: 300ms;
}


</style>
