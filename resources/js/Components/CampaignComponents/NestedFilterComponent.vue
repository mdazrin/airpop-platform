<!-- <template>
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
   -->


   <!-- <template>
    <div>
      <input
        v-model="searchQuery"
        type="text"
        placeholder="Search..."
        @input="filterItems"
      />
      <ul>
        <li v-for="(item, index) in filteredItems" :key="index">
          {{ item }}
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  // Define the props
  const props = defineProps({
    items: Array,
  });
  
  // Define the reactive data
  const searchQuery = ref('');
  const filteredItems = ref(props.items);
  
  // Function to filter items based on the search query
  const filterItems = () => {
    const query = searchQuery.value.toLowerCase();
    filteredItems.value = props.items.filter(item => item.toLowerCase().includes(query));
  };
  </script>
       -->

       <!-- <template>
        <div>
          <div v-for="(category, index) in categories" :key="index">
            <h3>{{ category.name }}</h3>
            <input
              v-model="category.searchQuery"
              type="text"
              placeholder="Search..."
              @input="filterItems(category)"
            />
            <ul>
              <li v-for="(item, i) in category.filteredItems" :key="i">
                {{ item }}
              </li>
            </ul>
          </div>
        </div>
      </template>
      
      <script setup>
      import { ref } from 'vue';
      
      // Define the props
      const props = defineProps({
        items: Array,
        categories: Array,
      });
      
      // Initialize categories with searchQuery and filteredItems
      const categories = ref(
        props.categories.map(category => ({
          ...category,
          searchQuery: '',
          filteredItems: props.items,
        }))
      );
      
      // Function to filter items based on the search query for a category
      const filterItems = (category) => {
        const query = category.searchQuery.toLowerCase();
        category.filteredItems = props.items.filter(item =>
          item.toLowerCase().includes(query)
        );
      };
      </script>
       -->
<!-- FilteredComponent.vue -->
<!-- FilteredComponent.vue -->
<template>
  <div>
    <h3>{{ title }}</h3>
    <label for="categoryFilter">Filter by Category:</label>
    <select id="categoryFilter" v-model="selectedCategory">
      <option value="">All</option>
      <option v-for="category in categories" :key="category">{{ category }}</option>
    </select>

    <label for="allFilter">Show All Items:</label>
    <input type="checkbox" id="allFilter" v-model="showAll" :disabled="disableShowAll" />

    <ul>
      <li v-for="item in filteredItems" :key="item.name">{{ item.name }}</li>
    </ul>
  </div>
</template>

<script setup>
import { ref, computed, defineProps } from 'vue';

const props = defineProps({
  items: Array,
  title: String,
});

const selectedCategory = ref('');
const showAll = ref(false);

const categories = computed(() => [...new Set(props.items.map(item => item.category))]);

const filteredItems = computed(() => {
  if (showAll) {
    return props.items;
  }
  return selectedCategory ? props.items.filter(item => item.category === selectedCategory) : props.items;
});

const disableShowAll = computed(() => !selectedCategory);
</script>
