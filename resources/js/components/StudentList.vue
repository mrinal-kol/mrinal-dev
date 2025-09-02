<template>
  <div>
    <h2 class="mb-4 text-center">Student List</h2>
    <ul>
      <li v-for="(student, index) in students" :key="index">
        {{ student.name }} - {{ student.email }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "StudentList",
  data() {
    return {
      students: [
        { name: "John Doe", email: "john@example.com" },
        { name: "Jane Smith", email: "jane@example.com" },
        { name: "Alex Roy", email: "alex@example.com" },
      ]
    };
  }
};
</script>

<style scoped>
h2 {
  color: #007bff;
}
</style>
