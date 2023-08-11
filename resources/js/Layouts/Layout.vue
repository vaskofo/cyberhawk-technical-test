<script setup>
import { computed, defineProps, watch } from 'vue';
import { router, usePage, Link } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const page = usePage();
const toast = useToast();

const links = [
  {
    name: 'Dashboard',
    href: route('dashboard'),
  },
  {
    name: 'Turbines',
    href: route('turbine.index'),
  },
  {
    name: 'Inspections',
    href: route('inspection.index'),
  },
];

// Not working because it returns the url without thee host
const currentUrl = computed(() => {
  let url = window.location.href;

  if (url.substr(-1) === '/') {
    url = url.substr(0, url.length - 1);
  }

  return url;
});

const flash = computed(() => (page.props.toast ? page.props.toast : null));
if (flash.value.message) {
  toast.success(flash.value.message);
}
</script>

<template>
    <div class="flex h-screen bg-slate-100">
        <div v-if="$page.props.flash?.message" class="alert">
            {{ $page.props.flash.message }}
        </div>
        <!--        <div class="w-60"></div>-->
        <div class="bg-white rounded-xl shadow-md w-60 p-8 m-8 flex flex-col justify-between">
            <div class="flex flex-col gap-4">
                <h1 class="text-center font-bold text-xl">
                    Turbhawk
                </h1>
                <Link v-for="link in links"
                      :key="link.name"
                      :href="link.href"
                      class="w-full bg-indigo-50 px-4 py-1 rounded-lg"
                      :class="{'bg-indigo-500 text-white': link.href === currentUrl}">
                    {{ link.name }}
                </Link>
            </div>
            <small class="text-gray-200 text-center">Made by <a class="text-indigo-200"
                                                                href="https://github.com/vaskofo">vaskofo</a></small>
        </div>
        <div class="p-8 w-full overflow-y-scroll">
            <slot name="header"></slot>
            <main class="mt-8">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<style scoped>

</style>
