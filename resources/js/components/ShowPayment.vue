<template>
 <div class="card">
    <div class="card-header">Student List</div>
      <div class="card-body">

          <table border="1" cellpadding="10" class="table table-bordered table-striped">

          
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Pic</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="item in payments" :key="item.id">
                <td>{{ item.name}}</td>
                <td>{{ item.email}}</td>
                <td>{{ item.message }}</td>
                <td><img :src="'/images/' + item.image_url" width="50px" height="50px" /></td>
              </tr>
            </tbody>
          </table>
        </div>
      

  </div>
</template>

<script>
export default {
  props: ['payments']
}
</script>