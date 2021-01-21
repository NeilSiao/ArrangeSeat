<template>
  <div class="modal show" tabindex="-1" role="dialog" id="studentModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">學生清單</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="overflow-y: scroll; height: 600px">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">選擇</th>
                <th scope="col">學號</th>
                <th scope="col">相片</th>
                <th scope="col">姓名</th>
              </tr>
            </thead>
            <tbody v-if="studentList != null">
              <template v-for="(student, index) in studentList">
                <tr :key="student.id">
                  <th class="align-middle" style="width: 10%" scope="row">{{ index + 1 }}</th>
                  <td class="align-middle" style="width: 20%">
                    <div class="form-control-lg">
                      <input
                        type="checkbox"
                        name="studentList"
                        :value="student.id"
                      />
                    </div>
                  </td>
                  <td class="align-middle" style="width: 20%">
                    {{ student.no }}
                  </td>
                  <td class="align-middle" style="width: 15%">
                    <img
                      width="64px"
                      height="64px"
                      :src="student.photo"
                      alt=""
                    />
                  </td>
                  <td class="align-middle" style="width: 20%">
                    {{ student.name }}
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            @click="close"
            class="btn btn-secondary"
            data-dismiss="modal"
          >
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["teamId"],
  data: function () {
    return {
      studentList: null,
    };
  },
  created: function () {
    const self = this;
    console.log(this.teamId);
    axios.get(`/team/${this.teamId}/students`).then((res) => {
      console.log(res.data);
      self.studentList = res.data;
    });
  },
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>