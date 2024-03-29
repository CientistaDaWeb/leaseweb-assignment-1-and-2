<template>
  <div>
    <Head :title="form.size"/>
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/memories">Memories</Link>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.name }}
    </h1>
    <trashed-message v-if="memory.deleted_at" class="mb-6" @restore="restore"> This memory has been deleted.
    </trashed-message>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <select-input v-model="form.type" :error="form.errors.type" class="pb-8 pr-6 w-full lg:w-1/2" label="Type">
            <option :value="null">Please Select One</option>
            <option v-for="type in types" :value="type">{{ type }}</option>
          </select-input>
          <select-input v-model="form.size" :error="form.errors.size" class="pb-8 pr-6 w-full lg:w-1/2" label="Size">
            <option :value="null" selected>Please Select One</option>
            <option v-for="size in sizes" :value="size">{{ size }}</option>
          </select-input>
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!memory.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button"
                  @click="destroy">Delete Memory
          </button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Memory
          </loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import {Head, Link} from '@inertiajs/vue3'
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
    memory: Object,
    sizes: Array,
    types: Array,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        type: this.memory.type,
        size: this.memory.size,
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/memories/${this.memory.id}`)
    },
    destroy() {
      if (confirm('Are you sure you want to delete this memory?')) {
        this.$inertia.delete(`/memories/${this.memory.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this memory?')) {
        this.$inertia.put(`/memories/${this.memory.id}/restore`)
      }
    },
  },
}
</script>
