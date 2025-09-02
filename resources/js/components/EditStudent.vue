<template>
  <div v-if="student" class="p-3 border rounded mt-3">
    <h4>Edit Student</h4>
    <form @submit.prevent="updateStudent">
      <input v-model="student.name" class="form-control mb-2" />
      <input v-model="student.email" class="form-control mb-2" />
      <button type="submit" class="btn btn-primary">Update</button>
      <button type="button" class="btn btn-secondary ms-2" @click="$emit('cancel-edit')">Cancel</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  props: ['student'],
  methods: {
    async updateStudent() {
      await axios.put(`/api/students/${this.student.id}`, this.student)
      this.$emit('student-updated') // notify parent to refresh
    }
  }
}
</script>
