<script setup>
import Layout from '@/Layouts/Layout.vue';
import {ref} from "vue";

const props = defineProps({
  card_info: Object,
});

const healthClass = ref('bg-red-200');

if (props.card_info.turbine_grade_avg > 2) {
  healthClass.value = 'bg-yellow-200';
} else if (props.card_info.turbine_grade_avg > 3) {
  healthClass.value = 'bg-green-200';
}
</script>

<template>
    <Layout>
        <template #header>
            <div class="breadcrumb mb-4">
                <span>Dashboard</span>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="flex gap-8 h-full">
            <div class="bg-white rounded-xl w-full md:w-1/2 h-auto flex flex-col justify-around p-4">
                <div class="text-xl mb-4">Total Turbines</div>
                <div class="text-xl">{{ card_info.turbine_count }}</div>
            </div>
            <div class="bg-white rounded-xl w-full md:w-1/2 h-auto flex flex-col justify-around p-4">
                <div class="text-xl mb-4">Average Grade</div>
                <div class="w-fit">
                    <div class="text-xl rounded-full px-6 py-1" :class="healthClass">{{ card_info.turbine_grade_avg }}</div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
</style>
