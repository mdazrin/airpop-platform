<!-- <template>
    <div @click="handleClickOutside">
      <h1>This is Filtered Prototype</h1>
      <div class="border rounded-lg relative" @click.stop> 
        <ul class="flex items-center">
          <li v-for="(item, index) in tagRows" :key="index">
            <button 
              class="border rounded-lg p-2 bg-sky-400 text-white"
              type="button"
              @click="removeItem(index)">
              {{ item.name }}
            </button>
          </li>
          <li class="w-full" @click="showFilteredRows">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Search by Campaign Name..."
              class="w-full border-0 focus:outline-none focus:ring-0"
              @blur="handleInputBlur"
            />
          </li>
        </ul>
        <div class="absolute right-0 w-full bg-white border rounded-lg shadow-lg z-20" v-if="showFiltered" @click.stop>
          <div>
            <ul class="">
              <li v-for="(item, index) in filteredRows" :key="index" class="w-full">
                <button 
                  v-if="!item.checkedValue"
                  class="w-full" 
                  type="button"
                  @click.stop="addItem(index)">
                  {{ item.name }}
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
    { name: 'USA', countryValue: 'us', checkedValue: false },
    { name: 'India', countryValue: 'in', checkedValue: false },
    { name: 'Italy', countryValue: 'it', checkedValue: false }
  ]);
  
  const searchQuery = ref(''); 
  
  const tagRows = computed(() => {
    let rows = shallowRows.value.slice();
    return rows.filter(item => item.checkedValue === true);
  });
  
  const filteredRows = computed(() => {
    let rows = shallowRows.value.slice();
  
    if (searchQuery.value) {
      const query = searchQuery.value.toLowerCase();
      rows = rows.filter((item) => {
        const nameColumnValue = item.name.toLowerCase();
        return nameColumnValue.includes(query);
      });
    }
  
    return rows;
  });
  
  const addItem = (index) => {
    // Update the checkedValue of the clicked item to true
    shallowRows.value[index].checkedValue = true;
  };
  
  const removeItem = (index) => {
    // Update the checkedValue of the clicked item to false
    tagRows.value[index].checkedValue = false;
  };
  
  const showFilteredRows = () => {
    showFiltered.value = true;
  };
  const handleClickOutside = (event) => {
    alert ('handleClickOutside called');
  // Check if the click event is outside of the component
  if (!event.target.closest('.relative')) {
    showFiltered.value = false;
    alert('Clicked outside');
  }
};
</script> -->

<template>
  <div @click="handleClickOutside">
    <h1>{{ title }}</h1>
    <div class="border rounded-lg relative" @click.stop>
      <ul class="flex items-center">
        <li v-for="(item, index) in tagRows" :key="index">
          <button
            class="border rounded-lg p-2 bg-sky-400 text-white"
            type="button"
            @click="removeItem(index)"
          >
            {{ item.name }}
          </button>
        </li>
        <li class="w-full" @click="showFilteredRows">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Search by Campaign Name..."
            class="w-full border-0 focus:outline-none focus:ring-0"
            @blur="handleInputBlur"
          />
        </li>
      </ul>
      <div class="absolute right-0 w-full bg-white border rounded-lg shadow-lg z-20" v-if="showFiltered" @click.stop>
        <div>
          <ul class="">
            <li v-for="(item, index) in filteredRows" :key="index" class="w-full">
              <button
                v-if="!item.checkedValue"
                class="w-full"
                type="button"
                @click.stop="addItem(index)"
              >
                {{ item.name }}
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed} from 'vue';

const props = defineProps({
  title: String,
  data: Object,
});

const showFiltered = ref(false);
const searchQuery = ref('');
const tagRows = computed(() => {
  return props.data.filter(item => item.checkedValue === true);
});
const filteredRows = computed(() => {
  let rows = props.data.slice();

  if (searchQuery.value) {
    const query = searchQuery.value.toLowerCase();
    rows = rows.filter((item) => {
      const nameColumnValue = item.name.toLowerCase();
      return nameColumnValue.includes(query);
    });
  }

  return rows;
});

const addItem = (index) => {
  // Update the checkedValue of the clicked item to true
  props.data[index].checkedValue = true;
};

const removeItem = (index) => {
  // Update the checkedValue of the clicked item to false
  props.data[index].checkedValue = false;
};

const showFilteredRows = () => {
  showFiltered.value = true;
};

const handleClickOutside = (event) => {
  alert('handleClickOutside called');
  // Check if the click event is outside of the component
  if (!event.target.closest('.relative')) {
    showFiltered.value = false;
    alert('Clicked outside');
  }
};
</script>
