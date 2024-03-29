<template>
  <div>
    <Head :title="form.name" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/brands">Brands</Link>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.name }}
    </h1>
    <trashed-message v-if="brand.deleted_at" class="mb-6" @restore="restore"> This brand has been deleted. </trashed-message>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!brand.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Brand</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Brand</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import Layout from '@/Shared/Layout.vue'
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'
import TrashedMessage from '@/Shared/TrashedMessage.vue'

export default {
  components: {
    Head,
    Icon,
    Link,
    LoadingButton,
    TextInput,
    TrashedMessage
  },
  layout: Layout,
  props: {
    brand: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        name: this.brand.name,
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/brands/${this.brand.id}`)
    },
    destroy() {
      if (confirm('Are you sure you want to delete this brand?')) {
        this.$inertia.delete(`/brands/${this.brand.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this brand?')) {
        this.$inertia.put(`/brands/${this.brand.id}/restore`)
      }
    },
  },
}
</script>
