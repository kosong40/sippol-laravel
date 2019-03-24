<template></template>

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
        .get(this.base + "/sippol/public/api/desakelurahan")
        .then(function(response) {
          console.log(response.data);
          datas.data = response.data.daerah;
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

