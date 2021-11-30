<template>
  <div>
    <!-- disini saya menggunakan bootstrap untuk design tabel nya. secara default bootstrap sudah di include di file welcome.blade.php jadi saya tidak perlu lagi untuk import file nya -->
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h4>Items</h4>
          </div>
          <div class="col-md-2">
            <!-- push router ke form membuat data -->
            <router-link class="btn btn-primary w-100" to="/create">+ Tambah</router-link>
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Item</th>
                <th scope="col">Unit</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Barang</th>

            </tr>
          </thead>
          <tbody>
            <!-- menampilkan data ke table -->
            <tr v-for="item in items" :key="item.id">
                <td style="width:40%">{{item.id}}</td>
                <td style="width:40%">{{item.nama_item}}</td>
                <td style="width:40%">{{item.unit}}</td>
                <td style="width:40%">{{item.stok}}</td>
                <td style="width:40%">{{item.harga_satuan}}</td>
                <td style="width:40%">{{item.barang}}</td>
                <td style="width:20%">
                <router-link class="btn btn-warning" :to="'/detail/'+item.id">Update</router-link>
                <button class="btn btn-danger" v-on:click="deleteData(item.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<!-- script js -->
<script>
export default {
  data() {
    return {
      // variable array yang akan menampung hasil fetch dari api
      items: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      // fetch data dari api menggunakan axios
      axios.get("http://localhost:8000/api/item").then(response => {
        // mengirim data hasil fetch ke varibale array persons
        this.items = response.data;
      });
    },
    deleteData(id) {
      // delete data
      axios.delete("http://localhost:8000/api/item/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script>
