<template>
  <div>
    <Head title="Create Memory" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/memories">Memories</Link>
      <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <select-input v-model="form.type" :error="form.errors.type" class="pb-8 pr-6 w-full lg:w-1/2" label="Type">
            <option :value="null">Please Select One</option>
            <option v-for="type in types" value="{{ type }}">{{ type}}</option>
          </select-input>
          <select-input v-model="form.size" :error="form.errors.size" class="pb-8 pr-6 w-full lg:w-1/2" label="Size">
            <option :value="null">Please Select One</option>
            <option v-for="size in sizes" :value="size">{{ size}}</option>
          </select-input>
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Memory</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'
import SelectInput from '@/Shared/SelectInput.vue'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    TextInput,
    SelectInput
  },
  layout: Layout,
  remember: 'form',
  props: {
    types: Array,
    sizes: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: null,
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/memories')
    },
  },
}
</script>
