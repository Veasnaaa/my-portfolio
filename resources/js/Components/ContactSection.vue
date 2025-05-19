<script setup>

import {useForm} from "@inertiajs/vue3";

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    subject: '',
    message: '',
});

const submit = () => {
    console.log('Submitting form with data:', form);
    form.post(route('store'), {  // Changed from 'contact.store' to 'store'
        preserveScroll: true,
        onSuccess: () => {
            console.log('Form submission successful');
            form.reset();
        },
        onError: (errors) => {
            console.error('Form submission failed with errors:', errors);
        },
        onFinish: () => {
            console.log('Form submission finished');
        }
    });
};
</script>

<template>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-hidden shadow-sm sm:rounded-lg p-0.5">
            <div class="relative z-20 bg-gradient-to-tr from-[#17171A] border border-slate-800 p-6 rounded-lg">
                <h1 class="text-cyan-500 text-2xl font-bold mb-6">Contact Me</h1>

                <!-- Success Message -->
                <div v-if="$page.props.flash.success" class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ $page.props.flash.success }}
                </div>

                <form @submit.prevent="submit">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-300">First Name</label>
                            <input
                                id="first_name"
                                v-model="form.first_name"
                                type="text"
                                autocomplete="off"
                                class="mt-1 px-2 h-10 bg-transparent text-white w-full rounded-md border border-gray-500 focus:border-gray-400 outline-none"
                                :class="{ 'border-red-500': form.errors.first_name }"
                            />
                            <div v-if="form.errors.first_name" class="text-red-500 text-sm mt-1">{{ form.errors.first_name }}</div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-300">Last Name</label>
                            <input
                                id="last_name"
                                v-model="form.last_name"
                                type="text"
                                autocomplete="off"
                                class="mt-1 px-2 h-10 bg-transparent text-white w-full rounded-md border border-gray-500 focus:border-gray-400 outline-none"
                                :class="{ 'border-red-500' : form.errors.last_name }"
                            />
                            <div v-if="form.errors.last_name" class="text-red-500 text-sm mt-1">{{ form.errors.last_name }}</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                        <input
                            id="email"
                            v-model="form.email"
                            type="email"
                            autocomplete="off"
                            class="mt-1 px-2 h-10 bg-transparent text-white w-full rounded-md border border-gray-500 focus:border-gray-400 outline-none"
                            :class="{ 'border-red-500': form.errors.email }"
                        />
                        <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</div>
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-300">Subject</label>
                        <input
                            id="subject"
                            v-model="form.subject"
                            type="text"
                            autocomplete="off"
                            class="mt-1 px-2 h-10 bg-transparent text-white w-full rounded-md border border-gray-500 focus:border-gray-400 outline-none"
                            :class="{ 'border-red-500': form.errors.subject }"
                        />
                        <div v-if="form.errors.subject" class="text-red-500 text-sm mt-1">{{ form.errors.subject }}</div>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-300">Message</label>
                        <textarea
                            id="message"
                            v-model="form.message"
                            rows="5"
                            class="mt-1 px-2 min-h-10 bg-transparent text-white w-full rounded-md border border-gray-500 focus:border-gray-400 outline-none"
                            :class="{ 'border-red-500': form.errors.message }"
                        ></textarea>
                        <div v-if="form.errors.message" class="text-red-500 text-sm mt-1">{{ form.errors.message }}</div>
                    </div>

                    <hr class="border-gray-500">

                    <div class="flex items-center justify-end mt-4">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 disabled:opacity-50"
                            :disabled="form.processing"
                        >
                            <span v-if="form.processing">Sending...</span>
                            <span v-else>Send Message</span>
                        </button>
                    </div>
                </form>
            </div>
<!--            <div class="absolute z-10 top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 bg-gradient-to-t from-pink-600 to-red-700 w-full h-full animate-spin rounded-lg"></div>-->
<!--            <div class="absolute z-10 top-0 bg-gradient-to-t from-pink-600 to-red-700 w-full h-full rounded-lg"></div>-->
        </div>
    </div>
</template>

<style scoped>

@keyframes spin {
    to { transform: rotate(360deg);     }
}
.animate-spin {
    animation: spin 4s linear infinite;
}

.animate-spin2 {
    animation: spin 3s linear infinite;
}
</style>
