<script setup>

import CircleProgress from "./CircleProgress.vue";
import {Vue3Marquee} from "vue3-marquee";
import HtmlIcon from "../Icons/HtmlIcon.vue";
import CssIcon from "../Icons/CssIcon.vue";
import JavascriptIcon from "../Icons/JavascriptIcon.vue";
import VueIcon from "../Icons/VueIcon.vue";
import GitIcon from "../Icons/GitIcon.vue";

const skill = [
    {logo: HtmlIcon, percent: '98',},
    {logo: CssIcon, percent: '80',},
    {logo: JavascriptIcon, percent: '60',},
    {logo: VueIcon, percent: '87',},
    {logo: GitIcon, percent: '80',},
    {logo: GitIcon, percent: '80',},
    {logo: GitIcon, percent: '80',},
]
</script>

<template>
    <div class="space-y-2 text-white pb-10">
        <h2 class="font-bold text-2xl text-left">
            My<span class="text-cyan-500 pl-2">Skills</span>
        </h2>
        <p>Those are my skills that I have learned from college and self-learning</p>
    </div>
    <vue3-marquee :pause-on-hover="true" :duration="30">
        <div class="grid grid-flow-col auto-cols-max items-center gap-8 overflow-x-auto">
            <div class="w-48 h-48 md:w-60 md:h-60"
                 v-for="skills in skill"
                 :key="skills"
            >
                <CircleProgress
                    class="text-white"
                    :value="skills.percent"
                    :max="100"
                    :icon="skills.logo"
                    unit="%"
                />
            </div>
        </div>
    </vue3-marquee>
</template>

<style scoped>

</style>
