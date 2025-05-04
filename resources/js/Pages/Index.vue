<script setup>
import {ref, nextTick} from "vue";
import CircleProgress from "../Components/CircleProgress.vue";
import FacebookIcon from "../Icons/FacebookIcon.vue";
import InstagramIcon from "../Icons/InstagramIcon.vue";
import GithupIcon from "../Icons/GithupIcon.vue";
import HtmlIcon from "../Icons/HtmlIcon.vue";
import CssIcon from "../Icons/CssIcon.vue";
import JavascriptIcon from "../Icons/JavascriptIcon.vue";
import VueIcon from "../Icons/VueIcon.vue";
import GitIcon from "../Icons/GitIcon.vue";

const homeSection = ref(null);
const skillsSection = ref(null);
const projectSection = ref(null);
const aboutSection = ref(null);
const contactSection = ref(null);

const navItems = [
    {name: "Home", id: "home"},
    {name: "Skills", id: "skills"},
    {name: "Project", id: "project"},
    {name: "About", id: "about"},
    {name: "Contact", id: "contact"},
];

const sections = {
    home: homeSection,
    skills: skillsSection,
    project: projectSection,
    about: aboutSection,
    contact: contactSection,
};

const scrollToSection = async (id) => {
    await nextTick();
    const section = sections[id].value;
    const navbarHeight = document.querySelector(".navbar").offsetHeight;
    if (section) {
        window.scrollTo({
            top: section.offsetTop - navbarHeight,
            behavior: "smooth",
        });
    } else {
        console.log(`Section ${id} not found`);
    }
};

const image = [
    {src: "/src/assets/image/alibaba.jpg"},
    {src: "/src/assets/image/freepik.jpg"},
    {src: "/src/assets/image/project_swc.jpg"},
    {src: "/src/assets/image/veasna.jpg"},
];

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
    <div
        class="bg-gradient-to-br from-black to-slate-950 scroll-smooth min-h-screen"
    >
        <div
            class="bg-[#1E1E1E] border-b sticky z-20 top-0 border-gray-700"
        >
            <div class="container navbar mx-auto h-20 flex justify-between items-center px-3">
                <h1 class="text-white text-xl font-bold hover:cursor-pointer">
                    VEASNA
                </h1>
                <div class="text-white">
                    <ul class="flex lg:gap-10 gap-3">
                        <li v-for="(item, index) in navItems" :key="index">
                            <a
                                @click.prevent="scrollToSection(item.id)"
                                href="#"
                                class="hover:no-underline text-[16px] lg:text-lg group text-white hover:text-yellow-500 transition hover:cursor-pointer duration-300"
                            >{{ item.name }}
                                <span
                                    class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 lg:h-[3px] bg-yellow-600"
                                ></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div ref="homeSection" class="section">
            <div class="flex justify-center items-center h-screen">
                <div
                    class="flex flex-col-reverse lg:flex-row gap-8 justify-between items-center text-center lg:text-left px-9 lg:px-32"
                >
                    <div class="basis-1/2 flex flex-col gap-2 lg:gap-4 relative">
                        <div class="absolute z-0 bg-cyan-800 rounded-full w-52 h-52 blur-3xl"></div>
                        <div class="pb-0 md:pb-4 font-bold text-white text-lg lg:text-2xl z-10">
                            <div
                                class="text-center flex items-center justify-center lg:justify-start gap-4 lg:text-left"
                            >
                                <div class="text-3xl md:text-5xl">👋</div>
                                Hi I'm <span class="text-2xl md:text-4xl text-yellow-400">VEASNA</span>
                            </div>
                            <p
                                class="font-bold text-3xl lg:text-[40px] text-white pt-0 md:pt-3"
                            >
                                Web Developer <span class="animate-pulse">|</span>
                            </p>
                        </div>
                        <span class="text-lg text-white lg:text-lg z-10">
              I’m a student at Panha Chiet University, building this portfolio to showcase the skills I’ve gained from school and self-learning. Feel free to contact me if interested. Enjoy!
            </span>
                        <div class="flex items-center gap-4">
                            <p class="text-white">Follow me on</p>
                            <div class="flex items-center gap-3">
                                <FacebookIcon/>
                                <InstagramIcon/>
                                <GithupIcon/>
                            </div>
                        </div>
                        <div class="flex justify-start items-center gap-4">
                            <button
                                class="w-fit bg-gray-300 py-2 px-8 rounded-md hover:scale-105 transition-all ease-in">
                                Download CV
                            </button>
                            <button
                                class="w-fit bg-gradient-to-bl from-yellow-600 to-yellow-400 text-white py-2 px-8 rounded-md hover:scale-105 transition-all ease-in">
                                Contact Me
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-40 h-40 lg:w-96 lg:h-96 flex justify-center items-center"
                    >
                        <div
                            class="bg-black hover:rotate-90 duration-500 shadow-lg shadow-white rounded-full w-full h-full"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
        <div ref="skillsSection" class="bg-slate-900 py-10 md:py-20 px-3">
            <div class="container mx-auto">
                <div class="space-y-2 text-white pb-10">
                    <h2 class="text-yellow-600 font-bold text-2xl text-left">
                        Skills
                    </h2>
                    <p>Those are my skills that I have learned from college and myself also!</p>
                </div>
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
            </div>
        </div>
        <div ref="projectSection" class="py-10 md:py-20 px-3">
            <div class="container mx-auto">
                <div class="space-y-2 text-white pb-10">
                    <h2 class="text-yellow-600 font-bold text-2xl text-left">
                        PROJECT
                    </h2>
                    <p>Those are my skills that I have learned from college and myself also!</p>
                </div>
                <!--                <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">-->
                <!--                    <div-->
                <!--                        class="bg-transparent rounded-lg border-2 border-cyan-600 h-96 overflow-hidden"-->
                <!--                    >-->
                <!--                        <img class="w-full h-full object-cover" src="/src/assets/image/alibaba.jpg" alt="">-->
                <!--                    </div>-->
                <!--                    <div-->
                <!--                        class="bg-transparent rounded-lg border-2 border-cyan-600 col-span-2 h-96 overflow-hidden"-->
                <!--                    >-->
                <!--                        <img class="w-full h-full object-cover" src="/src/assets/image/freepik.jpg" alt="">-->
                <!--                    </div>-->
                <!--                    <div-->
                <!--                        class="bg-transparent rounded-lg border-2 border-cyan-600 col-span-2 h-96 overflow-hidden"-->
                <!--                    >-->
                <!--                        <img class="w-full h-full object-cover" src="/src/assets/image/freepik.jpg" alt="">-->
                <!--                    </div>-->
                <!--                    <div-->
                <!--                        class="bg-transparent rounded-lg border-2 border-cyan-600 h-96 overflow-hidden"-->
                <!--                    >-->
                <!--                        <img class="w-full h-full object-cover" src="/src/assets/image/veasna.jpg" alt="">-->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
        </div>

        <div ref="aboutSection" class="bg-slate-900 py-10 md:py-20 px-3">
            <div class="container mx-auto">
                <div class="space-y-2 text-white pb-10">
                    <h2 class="text-yellow-600 font-bold text-2xl text-left">
                        About Me
                    </h2>
                    <p>Those are my skills that I have learned from college and myself also!</p>
                </div>
                <div class="flex flex-col md:flex-row items-start gap-8 md:gap-3.5">
                    <div class="h-full flex flex-row md:flex-col justify-between items-start gap-16">
                        <h2 class="text-8xl text-yellow-600 font-bold ">
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
            </div>
        </div>
    </div>
</template>
<style scoped>
.h-screen {
    height: calc(100vh - 120px);
}
</style>
