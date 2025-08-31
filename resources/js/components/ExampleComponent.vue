<template>
  <div class="alert alert-info">
    Hello from Vue Component 🎉  
    <button @click="count++" class="btn btn-primary">Clicked {{ count }} times</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      count: 0
    }
  }
}
</script>
