<template>
  <div class="container-flex">
    <div class="left">
      <!-- Optional Left Column -->
    </div>

    <div class="middle">
      <div class="form-container">
        <h2 class="mb-4 text-center">Registration Form</h2>

        <!-- Vue form with default values -->
        <form id="reg_form" @submit.prevent="submitForm">
          <!-- @csrf is sent via headers -->

          <!-- Name -->
          <div class="form-group mb-3">
            <label for="name">Full Name</label>
            <input
              type="text"
              id="name"
              v-model="form.name"
              class="form-control"
              required
            />
          </div>

          <!-- Email -->
          <div class="form-group mb-3">
            <label for="email">Email Address</label>
            <input
              type="email"
              id="email"
              v-model="form.email"
              class="form-control"
              required
            />
          </div>

          <!-- Password -->
          <div class="form-group mb-3">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              v-model="form.password"
              class="form-control"
              required
            />
          </div>

          <!-- Gender -->
          <div class="form-group mb-3">
            <label>Gender</label><br />
            <input
              type="radio"
              id="male"
              value="male"
              v-model="form.gender"
            />
            <label for="male">Male</label>

            <input
              type="radio"
              id="female"
              value="female"
              v-model="form.gender"
            />
            <label for="female">Female</label>
          </div>

          <!-- Hobbies -->
          <div class="form-group mb-3">
            <label for="hobbies">Hobbies</label><br />
            <input
              type="checkbox"
              id="reading"
              value="Reading"
              v-model="form.hobbies"
            />
            <label for="reading">Reading</label>

            <input
              type="checkbox"
              id="travelling"
              value="Travelling"
              v-model="form.hobbies"
            />
            <label for="travelling">Travelling</label>

            <input
              type="checkbox"
              id="coding"
              value="Coding"
              v-model="form.hobbies"
            />
            <label for="coding">Coding</label>
          </div>

          <!-- Message -->
          <div class="form-group mb-3">
            <label for="message">Message</label>
            <textarea
              id="message"
              v-model="form.message"
              class="form-control"
              rows="4"
            ></textarea>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary w-100">
            Submit
          </button>
        </form>

        <!-- Success message -->
        <div
          v-if="successMessage"
          class="alert alert-success alert-dismissible fade show mt-3"
          role="alert"
        >
          {{ successMessage }}
          <button
            type="button"
            class="btn-close"
            @click="successMessage = ''"
          ></button>
        </div>
      </div>
    </div>

    <div class="right">
      <!-- Optional Right Column -->
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "AddStudent",
  data() {
    return {
      form: {
        name: "John Doe",
        email: "johndoe@example.com",
        password: "Password123",
        gender: "male", // default checked
        hobbies: ["Reading", "Travelling"], // default checked
        message: "Hello, I am interested in your services.",
      },
      successMessage: "",
    };
  },
  methods: {
    async submitForm() {
      try {
        const response = await axios.post("/api/students", this.form, {
          headers: {
            "X-CSRF-TOKEN": document
              .querySelector('meta[name="csrf-token"]')
              .getAttribute("content"),
          },
        });

        this.successMessage =
          response.data.message || "Form submitted successfully! ✅";

        // redirect after success
        setTimeout(() => {
          this.successMessage = "";
          window.location.href = "/students";
        }, 1500);
      } catch (error) {
        console.error("Form submit error:", error);
        alert("Something went wrong. Please try again!");
      }
    },
  },
};
</script>

<style scoped>
.container-flex {
  width: 100%;
  min-height: 100vh;
  background-color: #f8f9fa;
  display: flex;
  justify-content: center;
}
.middle {
  width: 70%;
  background-color: #ffffff;
}
.left,
.right {
  flex: 1;
  background-color: #f2f2f2;
}
.form-container {
  width: 100%;
  max-width: 600px;
  margin: auto;
}
</style>
