<script setup>
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'
import {ref, watch} from "vue";
import axios from "axios";

const props = defineProps({
    redirectUrl: {
        type: String,
        default: 'Index'
    }
});

const emit = defineEmits(['close', 'login-success']);
const model = defineModel()

// watch(() => props.isOpen, (newVal) => {
//     modelValue.value = newVal;
// });

const error = ref();
const isSubmitting = ref(false);
const form = ref({username:'',password:''})

const closeModal = () => {
    model.value = false;
};

const submitForm = async () => {
    isSubmitting.value = true;
    error.value = '';

    try {
        const response = await axios.post('/login', form.value);

        if (response.data.success) {
            emit('login-success');

            if (response.data.redirect) {
                window.location.href = response.data.redirect;
            }
        }
    } catch (err) {
        if (err.response && err.response.data && err.response.data.message) {
            error.value = err.response.data.message;
        } else {
            error.value = 'An error occurred. Please try again.';
        }
    } finally {
        isSubmitting.value = false;
    }
}
</script>
<template>
    <TransitionRoot appear :show="model" as="template">
        <Dialog as="div" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black/70" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-2xl bg-gradient-to-tr from-[#17171A] to-black border border-slate-800 p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <DialogTitle
                                as="h3"
                                class="w-full text-center text-3xl font-bold leading-6 text-cyan-500 pb-10"
                            >
                                Login
                            </DialogTitle>
                            <form @submit.prevent="submitForm">
                                <div class="mb-4">
                                    <label for="username" class="block text-sm font-medium text-gray-300">Username</label>
                                    <input
                                        id="username"
                                        v-model="form.username"
                                        type="text"
                                        autocomplete="off"
                                        class="mt-1 px-2 h-10 bg-transparent text-white w-full rounded-md border border-gray-500 focus:border-gray-400 outline-none"
                                    />
                                    <div v-if="error" class="text-red-500 text-sm mt-1">{{ error }}</div>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                                    <input
                                        id="password"
                                        v-model="form.password"
                                        type="password"
                                        autocomplete="off"
                                        class="mt-1 px-2 h-10 bg-transparent text-white w-full rounded-md border border-gray-500 focus:border-gray-400 outline-none"
                                    />
                                    <div v-if="error" class="text-red-500 text-sm mt-1">{{ error }}</div>
                                </div>
                                <div class="flex justify-end items-center gap-2">
                                    <button
                                        type="button"
                                        class="mr-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 rounded-md shadow-sm"
                                        @click="closeModal"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        type="submit"
                                        :disabled="isSubmitting"
                                        class="rounded-md bg-gradient-to-r from-[#194BFD] to-[#AD13FB] px-8 py-2 text-sm font-medium text-white"
                                    >
                                        {{ isSubmitting ? 'Loading...' : 'Confirm' }}
                                    </button>
                                </div>
                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
