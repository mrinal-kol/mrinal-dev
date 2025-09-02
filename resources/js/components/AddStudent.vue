<template>
  <div class="p-3 border rounded mb-3">
    <h4>Add Student</h4>
    <form @submit.prevent="addStudent">
      <input v-model="form.name" placeholder="Name" class="form-control mb-2" />
      <input v-model="form.email" placeholder="Email" class="form-control mb-2" />
      <button type="submit" class="btn btn-success">Add</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      form: { name: '', email: '' }
    }
  },
  methods: {
    async addStudent() {
      await axios.post('/api/students', this.form)
      this.form = { name: '', email: '' }
      this.$emit('student-added') // notify parent to refresh
    }
  }
}
</script>
