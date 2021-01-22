<template>
  <div class="modal" tabindex="-1" role="dialog" id="studentModal" :key="teamId">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">學生清單</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
            @click="close"
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
            <tbody v-if="chunkStudentList != null">
              <template v-for="(student, index) in chunkStudentList[current]">
                <tr :key="student.id">
                  <th class="align-middle" style="width: 10%" scope="row">
                    {{ (index + 1) + (perChunk * current) }}
                  </th>
                  <td class="align-middle" style="width: 20%">
                    <div class="form-control-lg">
                      <input
                        type="checkbox"
                        name="studentList"
                        :value="student.id"
                        v-model="selStudentId"
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
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item" v-bind:class="{disabled: current == 0}" ><a class="page-link"  @click="prevButton" href="#">Previous</a></li>
                <li class="page-item" :class="{disabled: current == totalPage}" ><a class="page-link"  @click="nextButton" href="#">Next</a></li>
              </ul>
            </nav>
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
      current: 0,
      chunkStudentList: [],
      selStudentId: [],
      perChunk: 5,
    };
  },
  created: function () {
    const self = this;

    const path = `/team/${this.teamId}/students`;
    console.log(path);
    axios.get(path).then((res) => {
      console.log(res.data);
      self.studentList = res.data;
      this.studentList.forEach((student) =>{
        console.log(student.isChoose)
        if(student.isChoose == 1){
          this.selStudentId.push(student.id);
        }
      });
      self.pagenate();
    });
  },
  mounted: function(){
    console.log('mounted');
      $('#studentModal').modal('show'); 
  },
  methods: {
    close() {
      $('#studentModal').modal('hide');
      console.log('hide');
      this.$emit("close");
    },
    pagenate() {
      this.chunkStudentList = this.studentList.reduce(
        (resultArray, item, index) => {
          const chunkIndex = Math.floor(index / this.perChunk);
          if (!resultArray[chunkIndex]) {
            resultArray[chunkIndex] = [];
          }
          resultArray[chunkIndex].push(item);
          return resultArray;
        },
        []
      );
      

    },
    prevButton(){
      this.current--;
    },
    nextButton(){
      this.current++;
    }
  },
  computed:{
          totalPage: function(){
            return this.chunkStudentList.length - 1;
          }
  }
};
</script>