<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4>Create new data</h4>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function addData() -->
        <form @submit.prevent="addData()">
          <div class="form-group">
            <label>Nama Item</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Masukkan nama item"
              v-model="form.nama_item"
              required
            >
          </div>
          <div class="form-group">
            <label>Unit</label>
            <input type="radio" id="kg" value="kg" v-model="picked">
            <label for="kg">Kg</label>
            <br>
            <input type="radio" id="pcs" value="pcs" v-model="picked">
            <label for="pcs">Pcs</label>
            <br>
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Masukkan jumlah stok"
              v-model="form.stok"
              required
            >
          </div>
          <div class="form-group">
            <label>Harga Satuan</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Masukkan harga satuan"
              v-model="form.harga_satuan"
              required
            >
          </div>
          <div class="dropbox">
          <input type="file" multiple :name="barang" :disabled="isSaving" @change="filesChange($event.target.name, $event.target.files); fileCount = $event.target.files.length"
            accept="image/*" class="input-file">
            <p v-if="isInitial">
              Drag your file(s) here to begin<br> or click to browse
            </p>
            <p v-if="isSaving">
              Uploading {{ fileCount }} files...
            </p>
        </div>
          <button id="btn-submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      form:{
        nama_item: '',
        unit: '',
        stok: '',
        harga_satuan: '',
        barang: ''
      }
    }
  },
  methods: {
    addData() {
      // post data ke api menggunakan axios
      axios
        .post("http://localhost:8000/api/item", {
          nama_item: this.form.nama_item,
          unit: this.form.unit,
          stok: this.form.stok,
          harga_satuan: this.form.harga_satuan,
          barang: this.form.barang
        })
        .then(response => {
          // push router ke read data
          this.$router.push("/");
        });
    }
  }
};
</script>