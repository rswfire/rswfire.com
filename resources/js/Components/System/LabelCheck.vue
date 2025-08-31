<template>
  <label :for="id" class="flex items-center gap-2 py-1 cursor-pointer select-none">
    <input
        :id="id"
        type="checkbox"
        :checked="modelValue"
        :disabled="disabled"
        @change="$emit('update:modelValue', $event.target.checked)"
        class="h-4 w-4 accent-gray-900 disabled:opacity-50"
    />
    <span class="flex flex-col">
      <span>{{ text }}</span>
      <span v-if="hint" class="text-xs text-gray-500">{{ hint }}</span>
    </span>
  </label>
</template>

<script setup>
defineProps({
  modelValue: { type: Boolean, default: false },
  text:       { type: String,  required: true },
  id:         { type: String,  default: '' },
  hint:       { type: String,  default: '' },
  disabled:   { type: Boolean, default: false },
})
defineEmits(['update:modelValue'])
</script>
