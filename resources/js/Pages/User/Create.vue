<template>
    <header class="bg-gray-100 py-3 rounded-lg">
      <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
          <div>
            <h1 class="text-2xl font-semibold text-gray-900">
              Create User
            </h1>
          </div>
          <Link  :href="route('users.create')">
            <div class="text-xs px-2.5 py-1.5 bg-blue-500 text-white hover:bg-blue-600 focus:ring-blue-400 inline-flex items-center justify-center rounded-md border border-transparent font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 sm:w-auto">
              Create User
            </div>
          </Link>
        </nav>        
      </div>
    </header>
    <div class="flex items-center justify-center">
      <form class="space-y-3 mt-8 max-w-lg w-full">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" id="name" name="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
        </div>
  
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
        </div>
  
        <div>
          <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
          <input type="tel" id="mobile" name="mobile" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
        </div>
  
        <div>
          <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
          <input type="date" id="birthday" name="birthday" placeholder="dd/mm/yyyy" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
        </div>
  
        <div>
          <label for="employee-type" class="block text-sm font-medium text-gray-700">Employee type</label>
          <select id="employee-type" name="employee-type" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <option>Select employee type</option>
            <!-- Add your options here -->
          </select>
        </div>
  
        <div>
          <label for="swc-id" class="block text-sm font-medium text-gray-700">Superior Walls & Ceilings ID <span class="text-gray-500 text-xs">(Optional)</span></label>
          <input type="text" id="swc-id" name="swc-id" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
        </div>
  
        <div>
          <label for="greenline-id" class="block text-sm font-medium text-gray-700">Greenline ID <span class="text-gray-500 text-xs">(Optional)</span></label>
          <input type="text" id="greenline-id" name="greenline-id" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
        </div>
  
        <div class="flex items-center">
          <input id="connector-asist" name="connector-asist" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" />
          <label for="connector-asist" class="ml-2 block text-sm font-medium text-gray-700">Connector or ASIST worker</label>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
  /* Your scoped styles here if needed */
  </style>
  