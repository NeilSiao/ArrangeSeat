import {
    seatList,
    studentList,

} from '../arrangeSeat/module/constructor';
import {
    shuffle
} from '../arrangeSeat/module/utils';
import {
    iterateSeats
} from '../arrangeSeat/DOM/seatDom';

import {
    getSelStudent,
    setClickedSeatId,
    getClickedSeatId,
    getSelStudentByNo,
    getSelectedSeat,
    getSelStudentById,
} from '../arrangeSeat/module/selectedData'

export function init() {

    var saveModal = document.getElementById('saveModal');
    var saveBtn = document.getElementById('saveBtn');
    $("#randomBtn").on('click', startRandom);

    $('#studentModal').on('shown.bs.modal', function (evt) {
        $('#StudentNo').trigger('focus')
    })

    saveModal.onclick = saveModalAction;
    saveBtn.onclick = randomFormSubmit;

    $('#roomOption').on('change', function (evt) {
        evt.currentTarget.form.submit();
    });

    $('#teamOption').on('change', function (evt) {
        evt.currentTarget.form.submit();
    })

}

export function renderUnChooseStudent(){
    var unChooseList = $('#unChooseStudent');
    unChooseList.empty();
    seatList.forEach(function(seat){
        // if have same student id but different team, setting isChoose to true;
        var student = getSelStudentById(seat.student_id);
        if(student !== null){
            student.isChoose= true;
        }
    });
    studentList.forEach(function(student){
        if(student.isChoose === false){
            unChooseList.append(`<li class='list-group-item'>${student.no} :${student.name}  </li>`);
        }
    });
}

export function startRandom(evt) {
    shuffle(studentList);
    seatList.forEach(function (seat) {
        seat.student_id = null;
        seat.studentInfo= null;
    })
    studentList.forEach(function (student) {
        student.isChoose = false;
        student.seat_id = null;
    })

    var cnt;
    cnt = 0;

    shuffle(seatList);

    seatList.forEach(function (seat, index) {
        console.log(seat, cnt, studentList.length);
        if (studentList.length > cnt) {
            var student = studentList[cnt];
            console.log('student');
            console.log(student);
            if (student.isChoose === false) {
                seat.student_id = student.id;
                student.isChoose = true
                cnt++;
            }
        }
    });

    iterateSeats();
    renderUnChooseStudent();
    bindModalEvent();
}

function modalToggle(){
    $('#studentModal').modal('toggle');
}

export function bindModalEvent() {
    var seats = $(".room-wrapper .seat");
    seats.each(function (index, elem) {
        $(elem).on('click', function (evt) {
            var target = evt.currentTarget;
            var seatId = $(target).attr('id');
            if(evt.ctrlKey){
                console.log('ctrl + click');
                var seat = getSelectedSeat(seatId);
                var student = getSelStudentById(seat.student_id);
                if(student !== null){
                    student.isChoose = false;
                    student.seat_id = null;
                }
                
                seat.studentInfo = null;
                seat.student_id = null;
                seat.isChoose = false;
                iterateSeats();
                bindModalEvent();
                renderUnChooseStudent();
                return 
            }
            setClickedSeatId(seatId);
            modalToggle();

        });
    });
}

export function randomFormSubmit(evt) {
    evt.preventDefault();

    var dataSet = JSON.stringify(seatList);

    var input = $('input[name=seatList]');
    input.remove();
    $('input[name=roomOption]').remove();
    //$('input[name=teamOption]').remove();

    
    $('<input>').attr({
        type: 'hidden',
        name: 'seatList',
        value: dataSet
    }).appendTo('#randomForm');

    $('<input>').attr({
        type: 'hidden',
        name: 'roomOption',
        value: $("#roomOption").val()
    }).appendTo('#randomForm');

    
    // $('<input>').attr({
    //     type: 'hidden',
    //     name: 'teamOption',
    //     value: $("#teamOption").val()
    // }).appendTo('#randomForm');


    $("#randomForm").submit();
}

function saveModalAction(evt){
    var seatId = getClickedSeatId();
    var seat = getSelectedSeat(seatId);
    
    var stuNo = $('#StudentNo').val();
    $('#StudentNo').val('');
    var preStudent = getSelStudentById(seat.student_id);
    var student = getSelStudentByNo(stuNo);
    if(student === null){
        $('#modal-warning').css('display', 'block') ;
        return;
    }else{
        $('#modal-warning').css('display', 'none') ;
    }
    if(preStudent !== null){
        preStudent.isChoose = false;
    }
    student.isChoose = true;
    seat.student_id = student.id;
    seat.team_id = student.team_id;

    modalToggle();
    iterateSeats();
    bindModalEvent();
    renderUnChooseStudent();
}

