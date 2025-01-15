<template>
    <div class="card shadow bg-light">
        <div class="card-body">
            <form
              @submit.prevent="handleAddNewTask"
            >
                <input
                  class="form-control mb-2"
                  type="text"
                  placeholder="Masukan judul maksimal 56 karakter"
                  v-model.trim="newTask.title"
                  required
                />
                <textarea
                  class=" form-control"
                  rows="2"
                  placeholder="Masukan deskripsi (opsional)"
                  v-model.trim="newTask.description"
                ></textarea>
                <div v-show="errorMessage">
                  <span class="text-xs text-red-500">
                    {{ errorMessage }}
                  </span>
                </div>
              <div class="mt-2 float-right">
                <button
                  @click="$emit('task-canceled')"
                  type="reset"
                  class="btn btn-danger"
                >
                  Batal
                </button>
                <button
                  type="submit"
                  class="btn btn-success text-white"
                >
                  Kirim
                </button>
              </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
  props: {
    statusId: Number
  },
  data() {
    return {
      newTask: {
        title: "",
        description: "",
        status_id: null
      },
      errorMessage: ""
    };
  },
  mounted() {
    this.newTask.status_id = this.statusId;
  },
  methods: {
    handleAddNewTask() {
      // Basic validation so we don't send an empty task to the server
    //   if (!this.newTask.title) {
    //     this.errorMessage = "The title field is required";
    //     return;
    //   }

      // Send new task to server
      axios
        .post("/tasks", this.newTask)
        .then(res => {
          // Tell the parent component we've added a new task and include it
          this.$emit("task-added", res.data);
        })
        .catch(err => {
          // Handle the error returned from our request
          this.handleErrors(err);
        });
    },
    handleErrors(err) {
      if (err.response && err.response.status === 422) {
        // We have a validation error
        const errorBag = err.response.data.errors;
        if (errorBag.title) {
          this.errorMessage = errorBag.title[0];
        } else if (errorBag.description) {
          this.errorMessage = errorBag.description[0];
        } else {
          this.errorMessage = err.response.message;
        }
      } else {
        // We have bigger problems
        console.log(err.response);
      }
    }
  }
};
</script>
