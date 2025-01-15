<template>
<div class="row">

    <div  v-for="status in statuses"
            :key="status.slug" class="col-md-3">
        <div class="card shadow bg-light mb-2">
          <!-- Columns (Statuses) -->
          <div

            class="card-body"
          >
                <h6 class="mb-4">{{ status.title }}<span class="badge badge-pill bg-primary text-white ml-2"></span></h6>

                <!-- Tasks -->
                <draggable
                  class="flex-1 overflow-hidden"
                  v-model="status.tasks"
                  v-bind="taskDragOptions"
                  @end="handleTaskMoved"
                >
                  <transition-group
                    class="flex-1 flex flex-col h-full overflow-x-hidden overflow-y-auto rounded shadow-xs"
                    tag="div"
                  >
                    <div
                      v-for="task in status.tasks"
                      :key="task.id"
                      class="card shadow mb-2 custom-hover "
                    >
                    <div class="card-body">

                        <h6 class="text-dark mb-2 h7">
                            {{ task.title }}
                      </h6>
                      <p class="text-muted small">
                          {{ task.description }}
                      </p>
                      </div>
                      <div class="card-footer">
                          <div class="float-right">
                              <a class="btn btn-sm btn-danger" href="javascript:void(0)" @click="handleTaskDelete(task.id)">Hapus</a>
                              <a class="btn btn-sm btn-primary" href="javascript:void(0)" data-toggle="modal" :data-target="'#editModal' + task.id">Edit</a>
                          </div>
                      </div>
                    </div>
                    <!-- ./Tasks -->
                  </transition-group>
                </draggable>
                <!-- No Tasks -->
                <div
                  v-show="!status.tasks.length && newTaskForStatus !== status.id"
                  class="text-center"
                >
                  <small class="text-muted">Tidak ada data ...</small>
                </div>
                <!-- ./No Tasks -->
              <!-- </div> -->
            </div>
          <!-- ./Columns -->
        </div>
        <center>
            <button
            @click="openAddTaskForm(status.id)"
            class="btn btn-secondary btn-block mb-2"
            ><i class="fe fe-plus"></i>
            Tambah Data
        </button>
        <!-- AddTaskForm -->
        <AddTaskForm
                  v-if="newTaskForStatus === status.id"
                  :status-id="status.id"
                  v-on:task-added="handleTaskAdded"
                  v-on:task-canceled="closeAddTaskForm"
                />
                <!-- ./AddTaskForm -->
    </center>
    </div>
</div>
</template>

<script>
import draggable from "vuedraggable";
import AddTaskForm from "./AddTaskForm.vue";

export default {
  components: { draggable, AddTaskForm },
  props: {
    initialData: Array
  },
  data() {
    return {
      statuses: [],

      newTaskForStatus: 0
    };
  },
  computed: {
    taskDragOptions() {
      return {
        animation: 200,
        group: "task-list",
        dragClass: "status-drag"
      };
    }
  },
  mounted() {
    // 'clone' the statuses so we don't alter the prop when making changes
    this.statuses = JSON.parse(JSON.stringify(this.initialData));
  },
  methods: {
    openAddTaskForm(statusId) {
      this.newTaskForStatus = statusId;
    },
    closeAddTaskForm() {
      this.newTaskForStatus = 0;
    },
    handleTaskAdded(newTask) {
      // Find the index of the status where we should add the task
      const statusIndex = this.statuses.findIndex(
        status => status.id === newTask.status_id
      );

      // Add newly created task to our column
      this.statuses[statusIndex].tasks.push(newTask);

      // Reset and close the AddTaskForm
      this.closeAddTaskForm();
    },
    handleTaskMoved(evt) {
      axios.put("/tasks/sync", { columns: this.statuses }).catch(err => {
        console.log(err.response);
      });
    },
    handleTaskDelete(taskId) {
    // Tampilkan Sweet Alert konfirmasi penghapusan
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: 'Data Akan Terhapus Secara Permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#2E93fA',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengonfirmasi, lakukan penghapusan tugas
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post(`/tasks/${taskId}`, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => {
                // Tampilkan Sweet Alert berhasil dan muat ulang halaman setelah 3 detik
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Berhasil menghapus data."
                });
                setTimeout(() => {
                    location.reload();
                }, 3000);
            })
            .catch(error => {
                // Tangani kesalahan jika gagal menghapus tugas
                console.error("Gagal menghapus tugas:", error.response);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menghapus tugas!',
                });
            });
        }
    });
}


  }
};
</script>

<style scoped>
.status-drag {
  transition: transform 0.5s;
  transition-property: all;
}
</style>
