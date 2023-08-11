<script setup>
import Form from "@/Pages/Turbine/Form.vue";
import Layout from "@/Layouts/Layout.vue";
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <Layout title="Dashboard">
        <template #header>
            <div class="breadcrumb mb-4">
                <Link :href="route('dashboard')">Turbines</Link>
                <span>New Turbine</span>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Turbine
            </h2>
        </template>

        <Form></Form>
    </Layout>
</template>

<style scoped>

</style>
