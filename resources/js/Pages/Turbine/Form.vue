<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
  turbine: Object,
});
const formData = useForm(props.turbine ?? {
  name: null,
  blade_grade: 1,
  rotor_grade: 1,
  hub_grade: 1,
  generator_grade: 1,
});
const submit = () => {
  if (props.turbine) {
    formData.put(route('turbine.update', props.turbine.id));
  } else {
    formData.post(route('turbine.store'));
  }
};
</script>

<template>
    <form @submit.prevent="submit">
        <div class="flex flex-col gap-5">
            <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                <TextInput label="Name" placeholder="Turbine #32-A" id="name" v-model="formData.name"
                           :error="formData.errors.name"></TextInput>
            </div>

            <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                <span>Blade Grade: <b>{{ formData.blade_grade }}</b></span>
                <input type="range" v-model="formData.blade_grade" min="1" max="5"
                       class="border-1 border-gray-200 rounded-lg">
            </div>

            <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                <span>Rotor Grade: <b>{{ formData.rotor_grade }}</b></span>
                <input type="range" v-model="formData.rotor_grade" min="1" max="5"
                       class="border-1 border-gray-200 rounded-lg">
            </div>

            <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                <span>Hub Grade: <b>{{ formData.hub_grade }}</b></span>
                <input type="range" v-model="formData.hub_grade" min="1" max="5"
                       class="border-1 border-gray-200 rounded-lg">
            </div>

            <div class="flex flex-col sm:w-full lg:w-1/2 xl:w-1/4">
                <span>Generator Grade: <b>{{ formData.generator_grade }}</b></span>
                <input type="range" v-model="formData.generator_grade" min="1" max="5"
                       class="border-1 border-gray-200 rounded-lg">
            </div>

            <div class="flex flex-col sm:w-full md:w-fit mt-4">
                <button type="submit" class="bg-indigo-400 text-white px-4 py-2 rounded-xl shadow-lg">
                    Save
                </button>
            </div>
        </div>
    </form>
</template>

<style scoped>

</style>
