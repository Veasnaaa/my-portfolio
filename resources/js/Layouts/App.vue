<template>
    <div class="min-h-screen bg-slate-800">
        <header class="bg-black shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-white">{{ title }}</h1>
            </div>
        </header>

        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <slot />
            </div>
        </main>
    </div>
</template>

<script setup>
defineProps({
    title: String
})
</script>
