<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';


    const form = useForm({
        email: '',
        password: ''
    })

    function clearForm() {
        form.email = '',
        form.password = ''
    }

    function submit() {
        form.post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };

</script>
<template>
    <Head title="CON|CES - Login" />

    <div class="container">

        <form @submit.prevent="submit">

            <div class="input-block">
                <label for="email">Email</label>
                <input type="email" id="email" v-model="form.email" autoselect autocomplete="email" required>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="input-block">
                <label for="password">Password</label>
                <input type="password" id="password" v-model="form.password" required>
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-center gap-4">
                <button class="btn primary" type="submit">Login</button>
                <button class="btn warning" type="button" @click="clearForm">Clear</button>
            </div>

        </form>
    </div>
</template>
<style scoped>
.container {
    width: 400px;
    margin-inline: auto;
    height: 100svh;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

form {
    /* border: 1px solid #aaa; */
    box-shadow: 1px 1px 5px 1px #60abc0;
    padding: 32px;
    backdrop-filter: blur(10px);
    border-radius: 20px;
}
</style>
