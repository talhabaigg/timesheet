<template>
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div v-if="user">
      <Sidebar :user="user" />
    </div>
   

    <!-- Main content area -->
    <div class="flex-grow flex flex-col">
      <!-- Header -->
      <!-- <header class="border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
        <div class="container mx-auto">
          <nav class="p-4 flex items-center justify-between">
            <div class="text-lg font-medium">
              <Link :href="route('listing.index')">Listings</Link>
            </div>
            <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
              <Link :href="route('listing.index')">LaraZillow</Link>
            </div>
            <div>
              <Link :href="route('listing.create')" class="btn-primary">+ New Listing</Link>
            </div>
          </nav>
        </div>
      </header> -->

      <!-- Main content -->
      <main class="container mx-auto p-4 flex-grow">
        <div v-if="flashsuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
          {{ flashsuccess }}
        </div>
        <slot>Default</slot>
      </main>
    </div>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Sidebar from '@/Components/Sidebar.vue'

const page = usePage()
const flashsuccess = computed(() => page.props.flash.success)
const user = computed(
  () => page.props.user,
)
</script>

<style scoped>
/* Ensure the layout takes full height */
html, body, #app {
  height: 100%;
  margin: 0;
}
</style>
