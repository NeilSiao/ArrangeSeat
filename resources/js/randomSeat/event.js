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
    })

    var cnt;
    cnt = 0;
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
    var student = getSelStudentByNo(stuNo);
    if(student === null){
        $('#modal-warning').css('display', 'block') ;
    }else{
        $('#modal-warning').css('display', 'none') ;
    }
    console.log(seat, seatId, stuNo, student);
    seat.student_id = student.id;
    modalToggle();
    iterateSeats();
    bindModalEvent();
}
