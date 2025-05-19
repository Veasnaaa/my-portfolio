<script setup>
import App from "../Layouts/App.vue";
import {Link} from "@inertiajs/vue3";
import {data} from "autoprefixer";


const props = defineProps({
    contact: Object
})

function cleanLabel(label) {
    return label.replace(/&laquo;|&raquo;/g, '').trim()
}
</script>

<template>
    <div class="container mx-auto pt-10">
        <div class="min-h-screen bg-slate-800 p-6 rounded-lg space-y-4">
            <h1 class="text-white font-bold text-xl">Report &nbsp; <span class="bg-slate-600 rounded-full text-base font-normal p-1 px-4 leading-none">contact</span></h1>
            <table class="w-full bg-white border">
                <thead>
                <tr class="bg-slate-400 divide-x divide-gray-400 text-slate-800">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Messages</th>
                </tr>
                </thead>
                <tbody>
                <template v-if="contact.data.length" v-for="(userContact, index) in contact.data">
                    <tr class="divide-x divide-y divide-gray-400">
                        <td class="border border-gray-400 p-2">{{ index + 1 }}</td>
                        <td class="p-2">{{ userContact.first_name }} {{ userContact.last_name}}</td>
                        <td class="p-2">{{ userContact.email }}</td>
                        <td class="p-2">{{ userContact.subject }}</td>
                        <td class="p-2">{{ userContact.message }}</td>
                    </tr>
                </template>
                <template v-else>
                    <td colspan="5" class="text-center">No Data</td>
                </template>
                </tbody>
            </table>
            <div class="pt-4 flex justify-end space-x-2 text-white">
                <template v-for="(link, index) in contact.links" :key="index">
                    <component
                        :is="link.url ? Link : 'span'"
                        :href="link.url"
                        :class="['px-3 py-1 border rounded text-sm',
                        {
                            'bg-white text-gray-800': link.active,
                            'bg-gray-200 text-black': !link.active && link.url,
                            'bg-gray-200 text-black cursor-not-allowed': !link.url,
                        }
                    ]"
                        v-html="cleanLabel(link.label)"
                    />
                </template>
            </div>
        </div>
    </div>
</template>

<style scoped>
.min-h-screen {
    min-height: calc(100vh - 80px);
}
</style>
