<template>
 <div class="card">
    <div class="card-header">Payment List</div>
      <div class="card-body">

          <table border="1" cellpadding="10" class="table table-bordered table-striped">

          
            <thead>
              <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="item in payments" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.amount }}</td>
                <td>{{ item.status }}</td>
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