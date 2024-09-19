<template>
  <div class="container">
    <h1>Altcha Demo</h1>

    <div class="status">
      Status :
      <span v-if="!payload && !payloadVerified">Unknown</span>
      <span v-else-if="!payloadVerified">Payload generated</span>
      <span v-else>Payload generated and verified</span>
    </div>

    <AltchaValidation v-model="payload" />

    <button :disabled="!payload" @click="submit">
      Verify
    </button>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import type { Ref } from 'vue'
import { useRuntimeConfig } from 'nuxt/app'

const runtimeConfig = useRuntimeConfig()

const payload: Ref<string | null> = ref(null)

const payloadVerified: Ref<boolean> = ref(false)

const submit = async (event) => {
  event.preventDefault()

  const url = runtimeConfig.public.challengeUrl

  const headers = {
    'Content-Type': 'application/ld+json'
  }
  const body = {
    payload: payload.value
  }

  try {
    const response = await fetch(url, {
      method: 'POST',
      headers,
      body: JSON.stringify(body)
    })

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`)
    }

    const verifiedChallenge = await response.json()

    payloadVerified.value = verifiedChallenge.verified
  } catch (error) {
    console.error('There was a problem with the fetch operation: ', error)
  }
}


</script>

<style lang="scss" scoped>

.container {
  margin: 20px auto;
  max-width: 800px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.status {
  margin-bottom: 18px;
}

altcha-widget {
  min-width: 260px;
}

button {
  width: 160px;
  height: 36px;
  margin: 12px auto;
}
</style>
