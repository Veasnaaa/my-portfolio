<script setup>
const prop = defineProps({
    color: {
        type: String,
        default: "#FFFFFF",
    },
    size: {
        type: String,
        default: 10,
    },
});
</script>
<template>
    <svg
        :width="size"
        :height="size"
        viewBox="0 0 18 14"
        :fill="color"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M10.4697 0.46967C10.7626 0.176777 11.2374 0.176777 11.5303 0.46967L17.5303 6.46967C17.8232 6.76256 17.8232 7.23744 17.5303 7.53033L11.5303 13.5303C11.2374 13.8232 10.7626 13.8232 10.4697 13.5303C10.1768 13.2374 10.1768 12.7626 10.4697 12.4697L15.1893 7.75H1C0.585786 7.75 0.25 7.41421 0.25 7C0.25 6.58579 0.585786 6.25 1 6.25H15.1893L10.4697 1.53033C10.1768 1.23744 10.1768 0.762563 10.4697 0.46967Z"
        />
    </svg>
</template>

<style></style>
