<script setup>
import { Link, router } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import Layout from '@/Layouts/Layout.vue';

const props = defineProps({
  turbines: Object,
});

const turbineHealth = ref([]);

// Make this a component/global
props.turbines.forEach((turbine) => {
  let health = 0;
  health += turbine.blade_grade;
  health += turbine.rotor_grade;
  health += turbine.hub_grade;
  health += turbine.generator_grade;
  health /= 4;
  health = health.toFixed();

  let healthClass = 'bg-red-200';

  if (health >= 4) {
    healthClass = 'bg-green-200';
  } else if (health > 2) {
    healthClass = 'bg-yellow-200';
  }

  turbineHealth.value[turbine.id] = {
    value: health,
    class: healthClass,
  };
});
</script>

<template>
    <Layout>
        <template #header>
            <div class="breadcrumb mb-4">
                <Link :href="route('dashboard')">Turbines</Link>
            </div>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Turbines
                </h2>
                <Link :href="route('turbine.create')"
                    class="bg-indigo-400 text-white px-4 py-2 rounded-lg shadow-lg"
                >
                    + New Turbine
                </link>
            </div>
        </template>

        <div v-if="turbines.length === 0">
            <h1 class="text-3xl text-center">There are no turbines. How about <Link :href="route('turbine.create')" class="text-indigo-500">creating one</Link>?</h1>
        </div>

        <table v-else class="table-card table-auto w-full text-sm">
            <thead>
                <tr class="text-left">
                    <th class="bg-white p-4">ID</th>
                    <th class="bg-white p-4">Name</th>
                    <th class="bg-white p-4">Overall Health</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="turbine in turbines"
                    class="cursor-pointer"
                    :key="turbine.id"
                    @click="router.get(route('turbine.show', turbine.id))">
                    <td class="p-4">{{ turbine.id }}</td>
                    <td class="p-4">{{ turbine.name }}</td>
                    <td>
                        <span class="rounded-full px-6 py-1" :class="turbineHealth[turbine.id].class">
                            {{turbineHealth[turbine.id].value}}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </Layout>
</template>

<style scoped>
</style>
