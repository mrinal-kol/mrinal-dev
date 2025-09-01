<template>
  <div class="p-3 border rounded">
    <h5>Live Preview</h5>

    <input v-model="name" type="text" class="form-control mb-2" placeholder="Enter your name">
    <textarea v-model="message" class="form-control mb-2" placeholder="Enter your message"></textarea>

    <button class="btn btn-primary" @click="submitted = true">Submit</button>

    <div v-if="submitted" class="alert alert-success mt-3">
      <strong>Preview:</strong>
      <p>Name: {{ name }}</p>
      <p>Message: {{ message }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      message: '',
      submitted: false
    }
  }
}
</script>
