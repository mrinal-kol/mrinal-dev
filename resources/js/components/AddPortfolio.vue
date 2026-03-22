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
      
    </div>
  </div>
  <div class="container-flex" >
    
      <div class="middle" >
          <div class="form-container" style="background-color: white !important;">
            <h2 class="mb-4 text-center">Student List</h2>
        

            <table border="1" class="table">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>roll</th>
                <th>class</th>
                <th>email</th>
                <th>phone</th>
                <th>section</th>
                <th>details</th>
              </tr>

              <tr v-for="student in list" :key="student.id">
                <td>{{ student.id }}</td>
                <td>{{ student.name }}</td>
                <td>{{ student.roll }}</td>
                <td>{{ student.class }}</td>
                <td>{{ student.email }}</td>
                <td>{{ student.phone }}</td>
                <td>{{ student.section }}</td>
                <td>{{ student.details }}</td>
              </tr>
            </table>
        </div>
      </div>
  </div>
  <!-- {{ console.log(list) }} -->
</template>

<script>
import axios from "axios";

export default {
  name: "AddStudent",
   props: {
    list: Array   // 👈 THIS IS MISSING
  },
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

          // ✅ safely get CSRF token (prevents null error)
          const token = document.querySelector('meta[name="csrf-token"]');

          if (!token) {
            alert("CSRF token not found. Reload page.");
            return;
          }

          const response = await axios.post("/addregistration", this.form, {
            headers: {
              "X-CSRF-TOKEN": token.getAttribute("content"),
            },
          });

          // ✅ SUCCESS RESPONSE
          if (response.data.status === "success") {
            this.successMessage = response.data.message || "Form submitted successfully! ✅";
            this.errorMessage = "";

            alert(this.successMessage);

            setTimeout(() => {
              this.successMessage = "";
              // window.location.href = "/students";
            }, 1500);
          } 
          
          // ✅ MANUAL FAILURE (status: error but HTTP 200)
          else {
            this.errorMessage = response.data.message || "Something went wrong";
            this.successMessage = "";

            alert(this.errorMessage);
          }

        } catch (error) {

          console.error("Form submit error:", error);

          // ✅ Laravel validation error (422)
          if (error.response?.status === 422) {
            this.errorMessage = Object.values(error.response.data.errors).join(", ");
          }

          // ✅ Session expired (401)
          else if (error.response?.status === 401) {
            this.errorMessage = error.response.data.message;
            // window.location.href = "/login";
          }

          // ✅ Server error (500)
          else if (error.response) {
            this.errorMessage = error.response.data.message || "Server error";
          }

          // ✅ Network error
          else {
            this.errorMessage = "Network error. Please try again.";
          }

          this.successMessage = "";
          alert(this.errorMessage);
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
