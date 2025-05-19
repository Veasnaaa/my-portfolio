<script setup>

</script>

<template>
    <div class="space-y-2 text-white pb-10">
        <h2 class="text-cyan-500 font-bold text-2xl text-left">
            About Me
        </h2>
        <p>Those are my skills that I have learned from college and myself also!</p>
    </div>
    <div class="flex flex-col md:flex-row items-start gap-8 md:gap-3.5">
        <div class="h-full flex flex-row md:flex-col justify-between items-start gap-16">
            <h2 class="text-8xl text-cyan-500 font-bold ">
                1+
            </h2>
            <p class="w-1/2 text-white text-lg">Year working experience</p>
        </div>
        <div class="flex flex-col items-start gap-3.5 text-white w-full overflow-x-auto">
            <p class="w-9/12">I am a student at Panha Chiet University. This is my own
                portfolio, which I am building to showcase the skills I have
                learned from school or through self-learning.
            </p>
            <div class="">
                <div class="flex items-center gap-3.5">
                    <div
                        v-for="i in 3"
                        :key="i"
                        class="shrink-0"
                    >
                        <div
                            class="bg-slate-800 flex flex-col justify-center items-center text-center gap-3 rounded-md w-52 h-52 p-2">
                            <div class="bg-white w-10 h-10 rounded-md"></div>
                            <p class="font-medium">Product Design</p>
                            <p class="text-gray-400">
                                I am a student at Panha Chiet University. This is my own portfolio.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
