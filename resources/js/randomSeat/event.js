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
        if(seat.student_id !== null){
            var student = getSelStudent(seat.student_id);
            student.seat_id = seat.id;
        }
    });

    studentList.forEach(function(student){
        if(student.seat_id == null){
            unChooseList.append(`<li class='list-group-item'>${student.no} :${student.name}  </li>`);
        }
    });
}

export function startRandom(evt) {
    evt.preventDefault();
    window.studentList = studentList;
    window.seatList = seatList;
    shuffle(studentList);
    seatList.forEach(function (seat) {
        seat.isChoose = false;
        seat.student_id = null;
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
            if (student.isChoose === false && seat.isChoose === false) {
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
            modalToggle();
            var target = evt.currentTarget;
            var seatId = $(target).attr('id');
            setClickedSeatId(seatId);
        });
    });
}

export function randomFormSubmit(evt) {
    evt.preventDefault();
    console.log(evt);
    console.log(seatList);
    var dataSet = JSON.stringify(seatList);
    console.log(evt.form);
    var input = $('input[name=seatList]');
    input.remove();
    $('input[name=roomOption]').remove();
    console.log(input);
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

    $("#randomForm").submit();
}

function saveModalAction(evt){
    var seatId = getClickedSeatId();
    var seat = getSelectedSeat(seatId);
    var stuNo = $('#StudentNo').val();
    $('#StudentNo').val('');
    var preStudent = getSelStudent(seat.student_id);
    var student = getSelStudentByNo(stuNo);
    if(student === null){
        $('#modal-warning').css('display', 'block') ;
        return;
    }else{
        $('#modal-warning').css('display', 'none') ;
    }
    //swap seat_id
    preStudent.isChoose = false;
    preStudent.seat_id = null;
    student.isChoose = true;
    seat.student_id = student.id;

    console.log(seat, seatId, stuNo, student);

    modalToggle();
    iterateSeats();
    bindModalEvent();
    renderUnChooseStudent();
}
