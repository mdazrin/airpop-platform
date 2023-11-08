<template>
    <div>
      <h1>This is Filtered Prototype</h1>
      <div class="border rounded-lg relative">
        <ul class="flex items-center">
          <li v-for="(category, index) in addCategory" :key="index">
            <button 
              class="border rounded-lg p-2 bg-sky-400 text-white"
              type="button"
              @click="removeCategory(index)">
              {{ category }}
            </button>
          </li>
          <li class="w-full" @click="showFilteredRows">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Search by Campaign Name..."
              class="w-full border-0 focus:outline-none focus:ring-0"
            />
          </li>
        </ul>
        <div class="absolute right-0 w-full bg-white border rounded-lg shadow-lg z-20" v-if="showFiltered">
          <div>
            <ul>
              <li v-for="category in categories" :key="category">
                <button
                  class="w-full"
                  type="button"
                  @click="nice(category)"
                >
                  {{ category }}
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue';
  
  const showFiltered = ref(false);
  
  const shallowRows = ref([
    { category: 'Fruit', name: 'Apple' },
    { category: 'Fruit', name: 'Banana' },
    { category: 'Vegetable', name: 'Carrot' },
    { category: 'Vegetable', name: 'Broccoli' },
    { category: 'Meat', name: 'Chicken' },
    { category: 'Meat', name: 'Beef' },
  ]);
  
  const searchQuery = ref(''); 
  
  const tagRows = computed(() => {
    let rows = shallowRows.value.slice();
    return rows.filter(item => item.checkedValue === true);
  });
  
  const categories = computed(() => {
    const rows = shallowRows.value.slice();
    const uniqueCategories = new Set(rows.map(item => item.category));
    return Array.from(uniqueCategories);
  });
  
  const addCategory = ref([]); // Initialize addCategory as an empty array
  
  const nice = (category) => {
    // Push the clicked category into the addCategory array
    addCategory.value.push(category);
  };
  
  const addItem = (index) => {
    // Update the checkedValue of the clicked item to true
    shallowRows.value[index].checkedValue = true;
  };
  
  const removeCategory = (index) => {
    // Remove a category from the addCategory array
    addCategory.value.splice(index, 1);
  };
  
  const showFilteredRows = () => {
    showFiltered.value = true;
  };
  </script>
  