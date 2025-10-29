<template>
  <div class="card">
    <div class="card-header">Student List</div>
    <div class="card-body" v-if="students.length">

      <table border="1" cellpadding="10" class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Sex</th>
            <th>message</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="student in students" :key="student.id">
            <td>{{ student.id }}</td>
            <td>{{ student.name }}</td>
            <td>{{ student.email }}</td>
            <td>{{ student.gender }}</td>
            <td>{{ student.message }}</td>
            <td>
              <button class="btn btn-success btn-sm" @click="editStudent(student.id)">Edit/Update</button>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
    <p v-else>No students found.</p>
  </div>
</template>

<script>
export default {
  name: "StudentCrud",
  data() {
    return {
      students: [] // multiple students
    };
  },
  methods: {
    async fetchStudents() {
      try {
        let res = await fetch('/students-data');
        if(res.ok){
          let data = await res.json();
          this.students = data; // assign array of students
        } else {
          console.error('Failed to fetch students. Status:', res.status);
        }
      } catch(err){
        console.error('Fetch error:', err);
      }
    },
    editStudent(id) {
      // Navigate to Laravel route for editing
      window.location.href = `/fetchData/${id}`; // adjust route as needed
    }
  },
  mounted() {
    this.fetchStudents();
  }
}
</script>

<style scoped>
.card {
  max-width: 800px;
  margin: 20px auto;
}
</style>
