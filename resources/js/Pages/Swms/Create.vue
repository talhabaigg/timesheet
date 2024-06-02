<template>
    <header class="bg-gray-100 py-3 rounded-lg">
      <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
          <div>
            <h1 class="text-2xl font-semibold text-gray-900">
              Create SWMS
            </h1>
          </div>
          <Link :href="route('swms.create')">
            <div class="text-xs px-2.5 py-1.5 bg-blue-500 text-white hover:bg-blue-600 focus:ring-blue-400 inline-flex items-center justify-center rounded-md border border-transparent font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 sm:w-auto">
              Create User
            </div>
          </Link>
        </nav>        
      </div>
    </header>
    <div class="flex items-center justify-center">
      <form @submit.prevent="create" class="space-y-3 mt-8 max-w-lg w-full">
        <div>
          <label for="project_name" class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" id="swms_name" name="swms_name" v-model="form.swms_name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
          <div v-if="form.errors.swms_name" class="input-error">
          {{ form.errors.swms_name }}
        </div>
        </div>
  
        <div>
          <label for="version" class="block text-sm font-medium text-gray-700">Version</label>
          <input type="text" id="version" name="version" v-model="form.version" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
          <div v-if="form.errors.version" class="input-error">
          {{ form.errors.version }}
        </div>
        </div>
  
        <div>
          <label for="project" class="block text-sm font-medium text-gray-700">Project</label>
          <select 
            v-model="form.project_id" 
            class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
          >
            <option value="">Select Project</option>
            <option v-for="project in projects" :key="project.id" :value="project.id">
              {{ project.project_name }}
            </option>
          </select>
          <div v-if="form.errors.project_id" class="input-error">
          {{ form.errors.project_id }}
        </div>
        </div>
        <div class="flex justify-left mt-6">
          <button type="submit" class="mr-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-blue-600">Create SWMS</button>
        </div>
      </form>
      <Link :href="route('swms.index')">
        <button type="button" class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-gray-400">Cancel</button>
      </Link>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    projects: Array,
  });
  
  const form = useForm({
    swms_name: '',
    version: '',
    project_id: '',
  });
  
  const create = () => form.post(route('swms.store'));
  </script>
  
  <style scoped>
  /* Your scoped styles here if needed */
  </style>
  