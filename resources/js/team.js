import studentListModal  from '../component/table.vue';

console.log('imported');

window.edit = edit;
window.studentModal = studentModal;

var vm = new Vue({
    el: '#app',
    data: {
        showModal: false,
        selTeamId: null,
    },
    components: {
        'student-modal' : studentListModal
    },
    methods:{
        open(e){
            var id= e.currentTarget.getAttribute('data-id');
            console.log(e, id)
            this.selTeamId=id;
            this.showModal = true; 
            $('#studentModal').modal('show');
        }
    }
});


  
function edit(evt) {
    window.evt = evt;
    var tr = $(evt).closest('tr');
    var tds = tr.find('td');

    var id = tr.find('th');

    var name = tds[0];
    console.log(name, tds);
    var nameText = $(name).text();
    var idText = $(id).data('id');
    window.tds = tds;
    document.getElementById('id').value = idText;
    document.getElementById('name').value = nameText;
    
    $('#editModal').show();
    var editFormAction = "{{ route('team.index') }}" + '/' + idText;
    document.getElementById('editForm').action = editFormAction;
}

function studentModal(evt) {
    window.stuEvt = evt;
    
    $('#studentModal').show();
    var editFormAction = "{{ route('team.index') }}";
    document.getElementById('editForm').action = editFormAction;
}