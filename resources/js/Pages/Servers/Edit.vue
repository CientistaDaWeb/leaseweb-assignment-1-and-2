<template>
  <div>
    <Head :title="form.name" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/servers">Servers</Link>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.name }}
    </h1>
    <trashed-message v-if="server.deleted_at" class="mb-6" @restore="restore"> This server has been deleted. </trashed-message>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.asset_id" :error="form.errors.asset_id" type="number" class="pb-8 pr-6 w-full lg:w-1/2" label="Asset Id" />
          <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
          <select-input v-model="form.brand_id" :error="form.errors.brand_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Brand">
            <option :value="null" selected>Please Select One</option>
            <option v-for="brand in brands" :value="brand.id">{{ brand.name }}</option>
          </select-input>
          <text-input v-model="form.price" :error="form.errors.price" type="currency" class="pb-8 pr-6 w-full lg:w-1/2" label="Price" />
        </div>
        <h2 class="mt-12 text-2xl font-bold">Memory (select at least one)</h2>
        <div class="flex flex-wrap mb-4 mt-2">
          <div v-for="memory in memories" class="lg:w-1/5 h-8" >
            <label>
              <input type="checkbox" v-model="form.memories" :true-value="[]" :key="memory.id" :value="memory.id"> {{ memory.type }} -
              {{ memory.size }}GB</input>
            </label>
          </div>
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!server.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Server</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Server</loading-button>
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
import SelectInput from "@/Shared/SelectInput.vue";

export default {
  components: {
    SelectInput,
    Head,
    Icon,
    Link,
    LoadingButton,
    TextInput,
    TrashedMessage
  },
  layout: Layout,
  props: {
    server: Object,
    brands: Array,
    memories: Array,
    memories_attached: Array
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        id: this.server.id,
        asset_id: this.server.asset_id,
        name: this.server.name,
        brand_id: this.server.brand_id,
        price: this.server.price,
        memories: this.memories_attached
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/servers/${this.server.id}`)
    },
    destroy() {
      if (confirm('Are you sure you want to delete this server?')) {
        this.$inertia.delete(`/servers/${this.server.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this server?')) {
        this.$inertia.put(`/servers/${this.server.id}/restore`)
      }
    },
  },
}
</script>
