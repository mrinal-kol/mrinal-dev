<template>
  <div>
    <h4>Students</h4>
    <ul class="list-group">
      <li 
        v-for="student in students" 
        :key="student.id" 
        class="list-group-item d-flex justify-content-between align-items-center"
      >
        <div>
          {{ student.name }} - {{ student.email }}
        </div>
        <div>
          <button 
            class="btn btn-warning btn-sm me-2" 
            @click="$emit('edit-student', student)"
          >
            Edit
          </button>
          <button 
            class="btn btn-danger btn-sm" 
            @click="deleteStudent(student.id)"
          >
            Delete
          </button>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  props: ['students'],
  methods: {
    async deleteStudent(id) {
      await axios.delete(`/api/students/${id}`)
      this.$emit('student-deleted') // notify parent to refresh
    }
  }
}
</script>
