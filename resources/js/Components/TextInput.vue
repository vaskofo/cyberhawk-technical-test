<script setup>
import { onMounted, ref } from 'vue';
import InputLabel from "../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/InputLabel.vue";
import InputError from "../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/InputError.vue";

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div>
        <InputLabel :value="$attrs.label" :for="$attrs.id" />
        <input
            ref="input"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            :placeholder="$attrs.placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        >
        <InputError :message="$attrs.error" class="mt-2" />
    </div>
</template>
