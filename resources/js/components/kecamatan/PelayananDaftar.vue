<template>
  <div id="up">
    <h4 align="center">Daftar Pelayanan</h4>
    <br>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Pelayanan</th>
          <th>Jenis Pelayanan</th>
          <th>Atur</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="data in data" v-bind:key="data.id">
          <td>{{data.id}}</td>
          <td>{{data.pelayanan}}</td>
          <td>{{data.jenis_pelayanan}}</td>
          <td>
            <a :href="'pelayanan/'+data.slug">Atur</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Halaman Pelayanan Kecamatan");
    this.getPelayanan();
  },
  data() {
    return {
      base: window.location.origin,
      data: []
    };
  },
  methods: {
    getPelayanan() {
      var datas = this;
      axios
        .get(this.base + "/sippol/public/api/pelayananlist")
        .then(function(response) {
          console.log(response.data);
          datas.data = response.data.pelayanan;
        });
    }
  }
};
</script>
<style scoped>
#up {
  margin-top: 15px;
}
</style>

