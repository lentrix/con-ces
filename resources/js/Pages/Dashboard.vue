<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SearchForm from '@/Components/SearchForm.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps({
    data: Object
})

onMounted(()=>console.log(props.data))
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-start items-center">
                <h2 class="font-semibold text-xl text-white leading-tight flex-1">Dashboard</h2>
                <SearchForm />
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4 z-10">
                <div class="bg-blur overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-300 flex flex-col items-center justify-center">
                        <h2 class="text-3xl">
                            PATIENTS RECORDS
                        </h2>
                        <h3 class="text-8xl">
                            {{ data.patient_count }}
                        </h3>
                    </div>
                </div>

                <div class="bg-blur overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-300 flex flex-col items-center justify-center">
                        <h2 class="text-3xl">
                            RECORDED SERVICES
                        </h2>
                        <h3 class="text-8xl">
                            {{ data.services_count }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
