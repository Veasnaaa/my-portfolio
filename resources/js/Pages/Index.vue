<script setup>
import {ref, nextTick, onMounted, computed} from "vue";
import FacebookIcon from "../Icons/FacebookIcon.vue";
import InstagramIcon from "../Icons/InstagramIcon.vue";
import GithupIcon from "../Icons/GithupIcon.vue";
import ContactSection from "../Components/ContactSection.vue";
import SkillsSection from "../Components/SkillsSection.vue"
import ProjectSection from "../Components/ProjectSection.vue";
import AboutSection from "../Components/AboutSection.vue";
import LoginModal from "../Components/LoginModal.vue";
import {router, usePage} from "@inertiajs/vue3";
import axios from "axios";

const user = computed(() => usePage().props.auth.user);

const home = ref(null);
const skills = ref(null);
const project = ref(null);
const about = ref(null);
const contact = ref(null);

const navItems = [
    { name: "Home", id: "home" },
    { name: "Skills", id: "skills" },
    { name: "Project", id: "project" },
    { name: "About", id: "about" },
    { name: "Contact", id: "contact" },
];

const sections = {
    home: home,
    skills: skills,
    project: project,
    about: about,
    contact: contact,
};

const activeIndex = ref(null)

const scrollToSection = async (id) => {
    await nextTick();
    const section = sections[id]?.value;
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

const handleClick = async (index, id) => {
    activeIndex.value = index
    localStorage.setItem('activeIndex', index)
    await scrollToSection(id)
}


onMounted(async () => {
    const saved = localStorage.getItem('activeIndex')
    if (saved !== null) {
        activeIndex.value = parseInt(saved)
        await nextTick()
        // await scrollToSection(navItems.value[activeIndex.value].id)
    } else {
        activeIndex.value = 0
    }
})

const openLoginModal = ref(false);
const isOpenLoginModal = () => {
    openLoginModal.value = true
}

const logout = async () => {
    try {
        await axios.post(route('logout'));
        router.visit('/', { replace: true }); // or router.reload()
    } catch (error) {
        console.error('Logout failed', error);
    }
};
</script>

<template>
    <div
        class="bg-gradient-to-tr from-black to-slate-900 scroll-smooth min-h-screen"
    >
        <div
            class="bg-black/40 border-b sticky z-50 top-0 border-gray-700 backdrop-blur-xl"
        >
            <div class="container navbar mx-auto h-20 flex justify-between items-center px-3">
                <h1 class="text-white text-xl font-bold hover:cursor-pointer">
                    VEASNA
                </h1>
                <div v-if="$page.props.auth" class="text-white">
                    <ul class="hidden lg:flex lg:gap-10 gap-3">
                        <li v-for="(item, index) in navItems" :key="index">
                            <span
                                @click.prevent="handleClick(index, item.id)"
                                class="hover:no-underline text-[16px] lg:text-lg group hover:text-white transition hover:cursor-pointer duration-300"
                                :class="[ activeIndex === index ? 'text-white' : 'text-gray-400']"
                            >
                                {{ item.name }}
                                <span class="block group-hover:max-w-full transition-all duration-500 h-0.5 lg:h-[3px] bg-white"
                                      :class="[ activeIndex === index ? 'max-w-full' : 'max-w-0']"
                                />
                            </span>
                        </li>
                    </ul>
                    <div class="block md:hidden">
                        <img class="size-7" src="/assets/icons/humberger.svg" alt="">
                    </div>
                </div>
                <div v-if="$page.props.auth.user" class="flex items-center gap-3">
                    <button
                        @click="logout"
                        class="bg-white font-medium rounded-md p-1.5 px-10"
                    >
                        Logout
                    </button>
                    <p class="text-white">Welcome &nbsp;<span class="underline">{{ user.username }}</span></p>
                </div>

                <button
                    v-else
                    @click="isOpenLoginModal"
                    class="bg-white font-medium rounded-md p-1.5 px-10"
                >
                    Login
                </button>
            </div>

            <LoginModal
                v-model="openLoginModal"
                @login-success="isOpenLoginModal"/>
        </div>
        <div ref="home" class="section">
            <div class="flex justify-center items-center h-screen">
                <div
                    class="flex flex-col-reverse lg:flex-row gap-8 justify-between items-center text-center lg:text-left px-9 lg:px-32"
                >
                    <div class="basis-1/2 flex flex-col gap-2 lg:gap-4 relative">
                        <div class="hidden md:block absolute z-0 bg-blue-950 rounded-full w-52 h-52 blur-3xl"></div>
                        <div class="pb-0 md:pb-4 font-bold text-white text-lg lg:text-2xl z-10">
                            <div class="text-center flex items-center justify-center lg:justify-start gap-4 lg:text-left">
                                <div class="text-3xl md:text-5xl">👋</div>
                                Hi I'm <span class="text-2xl md:text-4xl text-cyan-500">VEASNA</span>
                            </div>
                            <p class="font-bold text-3xl lg:text-[40px] text-white pt-0 md:pt-3">
                                Web Developer <span class="animate-pulse">|</span>
                            </p>
                        </div>
                        <span class="hidden md:block text-lg text-white lg:text-lg z-10">
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
                                class="w-fit bg-gray-300 py-2 px-3 md:px-8 rounded-md hover:scale-105 transition-all ease-in">
                                Download CV
                            </button>
                            <button
                                class="w-fit bg-gradient-to-r from-[#194BFD] to-[#AD13FB] text-white py-2 px-3 md:px-8 rounded-md hover:scale-105 transition-all ease-in">
                                Contact Me
                            </button>
                        </div>
                    </div>
                    <div
                        class="w-40 h-40 lg:w-96 lg:h-96 flex justify-center items-center"
                    >
                        <div
                            class="bg-black duration-500 shadow-white shadow-lg hover:shadow-xl hover:shadow-white rounded-full w-full h-full animate-spin"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
        <div ref="skills" class="bg-gradient-to-tr from-black py-10 md:py-20 px-3">
            <div class="container mx-auto">
                <SkillsSection/>
            </div>
        </div>
        <div ref="project" class="py-10 md:py-20 px-3">
            <div class="container mx-auto">
                <ProjectSection/>
            </div>
        </div>

        <div ref="about" class="bg-slate-900 py-10 md:py-20 px-3">
            <div class="container mx-auto">
                <AboutSection/>
            </div>
        </div>

        <div ref="contact" class="py-10 md:py-20 px-3">
            <div class="py-12">
                <ContactSection/>
            </div>
        </div>
    </div>
</template>
<style scoped>
.h-screen {
    height: calc(100vh - 120px);
}
</style>
