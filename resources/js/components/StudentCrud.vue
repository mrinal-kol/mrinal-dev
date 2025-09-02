<template>
  <div class="container mt-4">
    <add-student @student-added="fetchStudents" />

    <student-list 
      :students="students" 
      @student-deleted="fetchStudents" 
      @edit-student="selectStudent"
    />

    <edit-student 
      v-if="selectedStudent" 
      :student="selectedStudent" 
      @student-updated="handleUpdated" 
      @cancel-edit="selectedStudent = null"
    />
  </div>
</template>

<script>
import axios from 'axios'
import AddStudent from './AddStudent.vue'
import StudentList from './StudentList.vue'
import EditStudent from './EditStudent.vue'

export default {
  components: { AddStudent, StudentList, EditStudent },
  data() {
    return {
      students: [],
      selectedStudent: null
    }
  },
  mounted() {
    this.fetchStudents()
  },
  methods: {
    async fetchStudents() {
      const res = await axios.get('/api/students')
      this.students = res.data
    },
    selectStudent(student) {
      this.selectedStudent = { ...student } // copy for editing
    },
    handleUpdated() {
      this.selectedStudent = null
      this.fetchStudents()
    }
  }
}
</script>
