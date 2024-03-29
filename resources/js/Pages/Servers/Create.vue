<template>
  <div>
    <Head title="Create Server"/>
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/servers">Servers</Link>
      <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.asset_id" :error="form.errors.asset_id" type="number"
                      class="pb-8 pr-6 w-full lg:w-1/2" label="Asset Id"/>
          <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name"/>
          <select-input v-model="form.brand_id" :error="form.errors.brand_id" class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Brand">
            <option :value="null" selected>Please Select One</option>
            <option v-for="brand in brands" :value="brand.id">{{ brand.name }}</option>
          </select-input>
          <text-input v-model="form.price" :error="form.errors.price" type="currency" class="pb-8 pr-6 w-full lg:w-1/2"
                      label="Price"/>
        </div>
        <h2 class="mt-12 text-2xl font-bold">Memory (select at least one)</h2>
        <div class="flex flex-wrap mb-4 mt-2">
          <div v-for="memory in memories" class="lg:w-1/5 h-8" :error="form.errors.memories">
            <label>
              <input type="checkbox" v-model="form.memories" :true-value="[]" :key="memory.id" :value="memory.id"> {{ memory.type }} -
              {{ memory.size }}GB</input>
            </label>
          </div>
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Server</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import {Head, Link} from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'
import SelectInput from "@/Shared/SelectInput.vue";
import Checkbox from "@/Components/Checkbox.vue";

export default {
  components: {
    Checkbox,
    SelectInput,
    Head,
    Link,
    LoadingButton,
    TextInput,
  },
  layout: Layout,
  remember: 'form',
  props: {
    brands: Array,
    memories: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        asset_id: null,
        name: null,
        brand_id: null,
        price: null,
        memories: null
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/servers')
    },
  },
}
</script>
