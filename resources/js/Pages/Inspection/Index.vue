<script setup>
import { ref } from 'vue';
import { DateTime } from 'luxon';
import { Link } from '@inertiajs/vue3';
import Layout from '@/Layouts/Layout.vue';

const props = defineProps({
  inspections: Object,
});
const inspectionHealth = ref([]);

props.inspections.forEach((inspection) => {
  let health = 0;
  health += inspection.blade_grade;
  health += inspection.rotor_grade;
  health += inspection.hub_grade;
  health += inspection.generator_grade;
  health /= 4;
  health = health.toFixed();

  let healthClass = 'bg-red-200';

  if (health >= 4) {
    healthClass = 'bg-green-200';
  } else if (health > 2) {
    healthClass = 'bg-yellow-200';
  }

  inspectionHealth.value[inspection.id] = {
    value: health,
    class: healthClass,
  };
});
</script>

<template>
    <Layout>
        <template #header>
            <div class="breadcrumb mb-4">
                <span>Inspections</span>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Inspections
            </h2>
        </template>

        <div v-if="inspections.length === 0">
            <h1 class="text-3xl text-center">There are no inspections. To create one, click on a turbine.</h1>
        </div>

        <div v-else>
            <table class="table-card table-auto w-full text-sm">
                <thead>
                <tr class="text-left">
                    <th class="bg-white p-4">ID</th>
                    <th class="bg-white p-4">Turbine Name</th>
                    <th class="bg-white p-4">Overall Health</th>
                    <th class="bg-white p-4">Date</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="inspection in inspections"
                    class="">
                    <td class="p-4">{{ inspection.id }}</td>
                    <td class="p-4">
                        <Link :href="route('turbine.show', inspection.turbine.id)" class="text-indigo-500">
                            {{ inspection.turbine.name }}
                        </Link>
                    </td>
                    <td>
                        <span class="rounded-full px-6 py-1" :class="inspectionHealth[inspection.id].class">
                            {{inspectionHealth[inspection.id].value}}
                        </span>
                    </td>
                    <td>
                        {{ DateTime.fromISO(inspection.created_at).toLocaleString(DateTime.DATETIME_MED) }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>

<style scoped>

</style>
