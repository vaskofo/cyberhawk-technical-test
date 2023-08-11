<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import Layout from '@/Layouts/Layout.vue';

const props = defineProps({
  turbine: Object,
});
const overallHealth = ref(0);

overallHealth.value += props.turbine.blade_grade;
overallHealth.value += props.turbine.rotor_grade;
overallHealth.value += props.turbine.hub_grade;
overallHealth.value += props.turbine.generator_grade;
overallHealth.value /= 4;

// If has decimal, round up
if (overallHealth.value % 1 !== 0) {
  overallHealth.value = overallHealth.value.toFixed(2);
}
</script>

<template>
    <Layout>
        <template #header>
            <div class="breadcrumb mb-4">
                <Link :href="route('turbine.index')">Turbines</Link>
                <span>{{ turbine.name }}</span>
            </div>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ turbine.name }}
                </h2>
                <div class="h-full flex gap-4">
                    <Link :href="route('inspection.create', turbine.id)"
                          class="bg-indigo-400 text-white px-4 py-2 rounded-lg shadow-lg"
                    >
                        Inspection
                    </link>
                    <Link :href="route('turbine.edit', turbine.id)"
                          class="bg-indigo-400 text-white px-4 py-2 rounded-lg shadow-lg"
                    >
                        Edit
                    </link>
                </div>
            </div>
        </template>
        <div class="flex gap-5">
            <img src="/images/toorbine.jpg" class="rounded-xl object-cover" alt="Turbine"
                 style="height: 300px; width: 200px">
            <div class="flex flex-col gap-2">
                <p><b>ID:</b> {{ turbine.id }}</p>
                <p><b>Name:</b> {{ turbine.name }}</p>
                <p><b>Blade Grade:</b> {{ turbine.blade_grade }}<small class="text-gray-300">/5</small></p>
                <p><b>Rotor Grade:</b> {{ turbine.rotor_grade }}<small class="text-gray-300">/5</small></p>
                <p><b>Hub Grade:</b> {{ turbine.hub_grade }}<small class="text-gray-300">/5</small></p>
                <p><b>Generator Grade:</b> {{ turbine.generator_grade }}<small class="text-gray-300">/5</small></p>
                <p><b>Overall Health:</b> {{ overallHealth }}<small class="text-gray-300">/5</small></p>
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
