  <template>
      <div class="flex flex-col mb-4">
        <label v-if="label">{{ label }}</label>
        <input
          class="border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500rounded-md shadow-sm w-full pl-4 py-1"
          :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"
          :placeholder="placeholder"
          v-bind="$attrs"
        />
      </div>
      
  </template>
    
    <script setup>
    // import { ref } from 'vue';
    
    const props = defineProps({
      label: {
        type: [String, Boolean],
        default: false,
      },
      modelValue: {
        type: String,
        default: "",
      },
      placeholder: {
        type: String,
        default: "",
      },
    });
    
    // const inputValue = ref(props.value);
    
    const emitInput = defineEmits(['input']);

    </script>
    