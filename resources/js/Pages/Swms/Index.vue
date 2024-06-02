<template>
    <header class="bg-gray-100 py-3 rounded-lg">
      <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
          <div>
            <h1 class="text-2xl font-semibold text-gray-900">
              SWMS
            </h1>
          </div>
          <Link  :href="route('swms.create')">
            <div class="text-xs px-2.5 py-1.5 bg-blue-500 text-white hover:bg-blue-600 focus:ring-blue-400 inline-flex items-center justify-center rounded-md border border-transparent font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 sm:w-auto">
              Create SWMS
            </div>
          </Link>
        </nav>
        
      </div>
    </header>
    <div class="mt-4 flex items-center space-x-4">
          <input 
            v-model="searchQuery" 
            type="text" 
            placeholder="Search by name" 
            class="block w-full rounded-full border border-gray-300 px-4 py-2 placeholder:text-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
          />
          <select 
            v-model="selectedProject" 
            class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
          >
            <option value="">Select Project</option>
            <option v-for="project in projects" :key="project.id" :value="project.id">
              {{ project.project_name }}
            </option>
            
          </select>
        </div>
  
    <div class="overflow-y-hidden -mx-4 mt-8 shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg overflow-x-scroll">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="md:bg-gray-100">
          <tr>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell"></th>
            <th scope="col" class="py-3 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">SWMS</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Version</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Project</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Signed by</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Unsigned</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
          <tr v-for="swms in swmss" :key="swms.id">
            <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell whitespace-nowrap">
              <!-- <div class="avatar bg-gray-500 text-white rounded-full w-8 h-8 flex items-center justify-center">
                {{ getInitial(user.name) }}
              </div> -->
            </td>
            <td class="w-full max-w-0 overflow-hidden whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
              <div class="text-blue-600 hover:text-blue-900">{{ swms.swms_name }}</div>
            </td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell whitespace-nowrap">
              {{ swms.version }}
            </td>
            <td class="hidden sm:table-cell">
              <div class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell whitespace-nowrap">
                {{ swms.project.project_name }}
              </div>
            </td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell whitespace-nowrap">
             
            </td>
            <td>
              <div class="text-blue-600 hover:text-blue-900"></div>
            </td>
          </tr>
        </tbody>
      </table>
     
    </div>
    <div class="flex justify-between items-center p-4">
        
        <button @click="prevPage" :disabled="currentPage === 1" class="relative inline-flex items-center border  px-4 py-2 text-sm font-medium focus:z-20 border-gray-300 bg-white text-gray-500  rounded-l-md disabled:opacity-50">
          Previous
        </button>
        <span class="text-sm text-gray-700 m-2">Page {{ currentPage }} of {{ totalPages }}</span>
        <button @click="nextPage" :disabled="currentPage === totalPages" class="relative inline-flex items-center border  px-4 py-2 text-sm font-medium focus:z-20 border-gray-300 bg-white text-gray-500 hover:bg-gray-50 rounded-r-md">
          Next
        </button>
      </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue';
  import { Link, usePage } from '@inertiajs/vue3';
  
  // Define props
  const props = defineProps({
    swmss: {
      type: Array,
      default: () => []
    },
    projects: {
      type: Array,
      default: () => []
    }
    
  });
  
  // Reactive state for search and filter
  const searchQuery = ref('');
  const selectedEmployeeType = ref('');
  
  // Reactive state for pagination
  const currentPage = ref(1);
  const itemsPerPage = ref(9);
  
  // Method to get the initial of a name
  // const getInitial = (name) => {
  //   return name ? name.charAt(0).toUpperCase() : '';
  // };
  
  // // Computed property to filter users based on search query and selected employee type
  // const filteredSwmss = computed(() => {
  //   return props.swmss.filter(swms => {
  //     const matchesSearchQuery = user.name.toLowerCase().includes(searchQuery.value.toLowerCase());
  //     const matchesEmployeeType = selectedEmployeeType.value === '' || user.employee_type === selectedEmployeeType.value;
  //     return matchesSearchQuery && matchesEmployeeType;
  //   });
  // });
  
  // // Computed property for paginated users
  // const paginatedSwmss = computed(() => {
  //   const start = (currentPage.value - 1) * itemsPerPage.value;
  //   const end = start + itemsPerPage.value;
  //   return filteredUsers.value.slice(start, end);
  // });
  
  // // Computed property for total pages
  // const totalPages = computed(() => {
  //   return Math.ceil(filteredUsers.value.length / itemsPerPage.value);
  // });
  
  // // Methods for pagination
  // const prevPage = () => {
  //   if (currentPage.value > 1) {
  //     currentPage.value--;
  //   }
  // };
  
  // const nextPage = () => {
  //   if (currentPage.value < totalPages.value) {
  //     currentPage.value++;
  //   }
  // };
  
  // Reactive state for dropdown (if needed)
  // const openDropdown = ref(null);
  
  // Method to toggle dropdown (if needed)
  // const toggleDropdown = (projectId) => {
  //   if (openDropdown.value === projectId) {
  //     openDropdown.value = null;
  //   } else {
  //     openDropdown.value = projectId;
  //   }
  // };
  </script>
  
  <style scoped>
  .avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
  }
  </style>
  