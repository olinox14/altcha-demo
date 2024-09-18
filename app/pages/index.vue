<template>
  <div class="container">
    <h1>Altcha Demo</h1>

    <div class="status">
      Status : {{ verified ? 'Verified' : 'Unknown' }}
    </div>

    <AltchaValidation @verified="verified = true" />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import type { Ref } from 'vue'

const verified: Ref<boolean> = ref(false)

</script>

<style lang="scss" scoped>

.container {
  margin: 20px auto;
  max-width: 800px;
}

.status {
  margin-bottom: 18px;
}
</style>
