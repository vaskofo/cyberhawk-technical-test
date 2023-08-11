<script setup>
import { useForm } from '@inertiajs/vue3';
import Layout from '@/Layouts/Layout.vue';
import Form from "@/Pages/Turbine/Form.vue";

const props = defineProps({
  turbine: Object,
});
const formData = useForm({
  turbine_id: props.turbine.id,
  blade_grade: props.turbine.blade_grade,
  rotor_grade: props.turbine.rotor_grade,
  hub_grade: props.turbine.hub_grade,
  generator_grade: props.turbine.generator_grade,
});
</script>

<template>
    <Layout>
        <template #header>
            <div class="breadcrumb mb-4">
                <Link :href="route('dashboard')">Inspections</Link>
                <span>New Inspection</span>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Inspection
            </h2>
        </template>

        <form @submit.prevent="formData.post(route('inspection.store'))">
            <div class="flex flex-col gap-5">
                <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                    <span>Blade Grade: <b>{{ formData.blade_grade }}</b></span>
                    <input type="range"
                           v-model="formData.blade_grade"
                           min="1"
                           max="5"
                           class="border-1 border-gray-200 rounded-lg">
                </div>

                <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                    <span>Rotor Grade: <b>{{ formData.rotor_grade }}</b></span>
                    <input type="range"
                           v-model="formData.rotor_grade"
                           min="1"
                           max="5"
                           class="border-1 border-gray-200 rounded-lg">
                </div>

                <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                    <span>Hub Grade: <b>{{ formData.hub_grade }}</b></span>
                    <input type="range"
                           v-model="formData.hub_grade"
                           min="1"
                           max="5"
                           class="border-1 border-gray-200 rounded-lg">
                </div>

                <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                    <span>Generator Grade: <b>{{ formData.generator_grade }}</b></span>
                    <input type="range"
                           v-model="formData.generator_grade"
                           min="1"
                           max="5"
                           class="border-1 border-gray-200 rounded-lg">
                </div>

                <div class="sm:w-full md:w-fit mt-4">
                    <button type="submit" class="bg-indigo-400 text-white px-4 py-2 rounded-xl shadow-lg">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </Layout>
</template>

<style scoped>

</style>
