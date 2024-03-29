<template>
  <div>
    <Head title="Memories" />
    <h1 class="mb-8 text-3xl font-bold">Memories</h1>
    <div class="flex items-center justify-between mb-6">
      <Link class="btn-indigo" href="/memories/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Memory</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Type</th>
            <th class="pb-4 pt-6 px-6">Size</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="memory in memories.data" :key="memory.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/memories/${memory.id}/edit`">
                {{ memory.type }}
                <icon v-if="memory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/memories/${memory.id}/edit`">
                {{ memory.size }}
                <icon v-if="memory.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
              </Link>
            </td>
            <td class="w-px border-t">
              <Link class="flex items-center px-4" :href="`/memories/${memory.id}/edit`" tabindex="-1">
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link>
            </td>
          </tr>
          <tr v-if="memories.data.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No memories found.</td>
          </tr>
        </tbody>
      </table>
    </div>
    <pagination class="mt-6" :links="memories.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout.vue'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination.vue'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
  },
  layout: Layout,
  props: {
    memories: Object,
  },
  data() {
    return {
      form: {
      }
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/memories', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
