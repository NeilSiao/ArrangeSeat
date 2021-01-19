import {seatList, studentList} from '../arrangeSeat/module/constructor';
import {shuffle} from '../arrangeSeat/module/utils';
import {iterateSeats} from '../arrangeSeat/DOM/seatDom';

export function startRandom(){
    window.studentList = studentList;
    window.seatList = seatList;
    shuffle(studentList);
    seatList.forEach(function(seat){
        seat.isChoose = false;
        seat.student_id = null;
    })
    studentList.forEach(function(student){
        student.isChoose = false;
    })

    var cnt;    
    cnt = 0;
    seatList.forEach(function(seat, index){
        console.log(seat, cnt, studentList.length);
        if(studentList.length > cnt){
            var student = studentList[cnt];
            console.log('student' );
            console.log(student );
            if(student.isChoose === false && seat.isChoose === false){
                seat.student_id = student.id;
                student.isChoose = true
                cnt++;
            }
        }
    });
  
    iterateSeats();
}


export function bindModalEvent(){
    var seats = $(".room-wrapper .seat");
    seats.each(function(index, elem){
        $(elem).on('click', function(evt){
            $('#studentModal').modal('show');
            var target = evt.currentTarget;
            var stuId = $(target).attr('id');
            localStorage.setItem('currentStuId', stuId);
            console.log(localStorage.getItem('currentStuId'));
        });
    });
}