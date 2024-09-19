<template>
  <altcha-widget
    v-show="widget !== null"
    ref="widget"
    :challengeurl="runtimeConfig.public.challengeUrl"
    debug
  />
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, type Ref } from 'vue'
import 'altcha'
import { useRuntimeConfig } from 'nuxt/app'

const runtimeConfig = useRuntimeConfig()

const widget: Ref<HTMLElement | null> = ref(null)

defineProps({
  modelValue: {
    type: String as PropType<string | null>,
    required: true
  }
})

const emit = defineEmits(['update:payload'])

const onStateChange = (e: CustomEvent | Event) => {
  if ('detail' in e) {
    const { payload, state } = e.detail
    if (state === 'verified' && payload) {
      emit('update:modelValue', payload)
    }
  }
}

onMounted(() => {
  setTimeout(() => {
    if (widget.value) {
      widget.value.addEventListener('statechange', onStateChange)
    }
  }, 10)
})

onUnmounted(() => {
  if (widget.value) {
    widget.value.removeEventListener('statechange', onStateChange)
  }
})
</script>

<style scoped lang="scss">

</style>
