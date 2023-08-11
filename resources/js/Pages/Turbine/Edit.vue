<script setup>
import { Link } from '@inertiajs/vue3';
import Form from '@/Pages/Turbine/Form.vue';
import Layout from '@/Layouts/Layout.vue';

const props = defineProps({
  turbine: Object,
});
</script>

<template>
    <Layout title="Dashboard">
        <template #header>
            <div class="breadcrumb mb-4">
                <Link :href="route('dashboard')">Turbines</Link>
                <span>Turbine #{{turbine.id}}</span>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Turbine #{{turbine.id}}
            </h2>
        </template>

        <Form :turbine="turbine"></Form>
    </Layout>
</template>

<style scoped>

</style>
