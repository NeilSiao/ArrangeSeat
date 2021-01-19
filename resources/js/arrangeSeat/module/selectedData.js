import {
    seatList,
    studentList
} from './constructor'

export function getSelectedSeat(seatId) {
    seatId = String(seatId);
    var idArray = seatList.map((seat) => String(seat.id));
    var index = idArray.indexOf(seatId);
    console.log(seatId, idArray, index);
    return seatList[index];
}

export function getSelStudent(studentId){
    studentId = String(studentId);
    var idArray =  studentList.map((student) => String(student.id));
    var index = idArray.indexOf(studentId);
    var student = studentList[index];
    if(student === undefined){
        return null;
    }
    return student;
}
