<template>
    <div v-if="swms" class="w-full h-1/2">
      <object
        :data="swms.swms_filepath"
        type="application/pdf"
        class="w-full h-full"
      >
        <p>
          Alternative text - include a link
          <a :href="swms.swms_filepath">to the PDF!</a>
        </p>
      </object>
    </div>

    <form @submit.prevent="create">
      <div class="grid grid-cols-1 gap-6 mt-5">
        <div>
          <label class="block text-sm font-medium text-gray-700">First Name</label>
          <input  v-model="form.first_name" type="text"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Last Name</label>
          <input  v-model="form.last_name" type="text"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          
        </div>
        <div class="flex items-center">
          
          <label class="ml-2 block text-sm text-gray-900">This SWMS has been developed in consultation and cooperation with employee/workers and relevant Employer/Persons Conducting Business or Undertaking (PCBU).</label>
        </div>

        <div class="flex items-center">
          <input type="checkbox" v-model="form.acknowledged" :true-value="1" :false-value="0" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
          <label for="completed" class="ml-2 block text-sm text-gray-900">I have read the above SWMS and I understand its contents. I confirm that I have the skills and training, including relevant certification to conduct the task as described. I agree to comply with safety requirements within this SWMS including risk control measures, safe work instructions and PPE described. *</label>
        </div>

        <div class="flex justify-end mt-6">
          <button type="submit" class="mr-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-blue-600">Submit</button>
          <Link :href="route('project.index')">
            <button type="button" class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-gray-400">Cancel</button>
          </Link>
        </div>
        
      </div>
    </form>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  import { Link } from '@inertiajs/vue3';

  const form = useForm({
  first_name: "",
  last_name: "",
  acknowledged: "",
});

  defineProps({
    swms: {
      type: Object,
      required: true
    }
  });

  const create = () => {
  console.log('Form Data:', form.data());
  form.post(route('project.store'));
};
  
  </script>
  
  <style scoped>
  /* Add any styles you need for your component here */
  </style>
  