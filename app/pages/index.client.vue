<template>
  <div class="container">
    <h1>Altcha Demo</h1>

    <div class="status">
      Status : {{ status }}
    </div>

    <altcha-widget
      ref="altchaWidget"
      debug
      test
    />
<!--    <altcha-widget-->
<!--      ref="altchaWidget"-->
<!--      :challengeurl="runtimeConfig.challengeUrl"-->
<!--      debug-->
<!--    />-->
  </div>
</template>

<script setup lang="ts">
import 'altcha'
import { ref } from 'vue'
import type { Ref } from 'vue'
import { useRuntimeConfig } from 'nuxt/app'

const STATUS_UNKNOWN: string = 'Unknown'
const STATUS_VERIFIED: string = 'Verified'
const STATUS_UNVERIFIED: string = 'Unverified'

const runtimeConfig = useRuntimeConfig()

const status: Ref<STATUS_UNKNOWN | STATUS_VERIFIED | STATUS_UNVERIFIED> = ref(STATUS_UNKNOWN)

const onButtonClick = () => {
}
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
