<script setup>
import { ref, onMounted } from "vue";

const props = defineProps({
    value: {
        type: [Number, String],
        default: 0,
    },
    max: {
        type: Number,
        default: 100,
    },
    unit: {
        type: String,
        default: "",
    },
    icon: {
        type: [Object, Function],
        default: null,
    },
});

const progress = ref(0);
const displayValue = ref(1);
let animationFrame = null;

onMounted(() => {
    const targetValue = Number(props.value);
    const step = targetValue / 100; // Adjust the step to control speed
    let current = 1;

    // Update progress
    const percentage = (props.value / props.max) * 100;
    setTimeout(() => {
        progress.value = percentage;
    }, 100);

    // Animate the value change
    const animateValue = () => {
        if (current < targetValue) {
            current += step;
            displayValue.value = current.toFixed(1);
            animationFrame = requestAnimationFrame(animateValue);
        } else {
            displayValue.value = targetValue.toFixed(1);
            cancelAnimationFrame(animationFrame);
        }
    };

    animateValue();
});
</script>
<template>
    <div class="relative flex items-center justify-center w-full h-full">
        <svg class="absolute w-full h-full" viewBox="0 0 36 36">
            <defs>
                <linearGradient id="progressGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#ca8a04" />
                    <stop offset="100%" stop-color="#facc15" />
                </linearGradient>
            </defs>
            <!-- Background Path -->
            <path
                class="text-white"
                d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                fill="none"
                stroke="currentColor"
                stroke-width=""
            />
            <!-- Progress Path with Gradient -->
            <path
                :style="`stroke-dasharray: ${progress}, 100;`"
                d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                fill="none"
                stroke="url(#progressGradient)"
                stroke-width="1.3"
                stroke-linecap="round"
                class="transition-all duration-1000 ease-out"
            />
            <!-- Start Point -->
        </svg>
        <div class="absolute flex flex-col items-center">
            <transition name="fade" mode="out-in">
                <div class="flex flex-col gap-3 justify-center items-center">
                    <!-- Icon here -->
                    <component :is="icon" v-if="icon" />
                    <span key="value" class="text-lg font-bold text-white"
                    >{{ displayValue }} {{ unit }}</span
                    >
                </div>
            </transition>
        </div>
    </div>
</template>

<style scoped>
svg {
    transform: rotate(
        0deg
    ); /* This rotates the starting point to the horizontal center */
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
