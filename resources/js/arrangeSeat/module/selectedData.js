import {
    seatList,
    studentList
} from './constructor'

/**
 * Retrive Seat by Id
 */
export function getSelectedSeat(seatId) {
    seatId = String(seatId);
    var idArray = seatList.map((seat) => String(seat.id));
    var index = idArray.indexOf(seatId);
    console.log(seatId, idArray, index);
    return seatList[index];
}
/** 
 * Retrive student by student's Id and teamId
 * @param {*} studentId 
 * @param {*} teamId 
 */
export function getSelStudent(studentId, teamId){
    studentId = String(studentId);
    var idArray =  studentList.map((student) => String(student.id) + '_' + String(student.team_id));
    var index = idArray.indexOf(studentId + '_' + teamId);
    var student = studentList[index];
    if(student === undefined){
        return null;
    }
    return student;
}

/**
 * Retrive student by student's Id
 * @param {*} studentId 
 */
export function getSelStudentById(studentId){
    studentId = String(studentId);
    var idArray =  studentList.map((student) => String(student.id));
    var index = idArray.indexOf(studentId);
    var student = studentList[index];
    if(student === undefined){
        return null;
    }
    return student;
}

/**
 * Retrive student by student's No
 * @param {*} studentNo 
 */
export function getSelStudentByNo(studentNo){
    studentNo = String(studentNo);
    var idArray =  studentList.map((student) => String(student.no));
    var index = idArray.indexOf(studentNo);
    var student = studentList[index];
    if(student === undefined){
        return null;
    }
    return student;
}

/**
 * store Clicked Seat id into localStorage
 * @param {*} stuId 
 */
export function setClickedSeatId(stuId){
    localStorage.setItem('currentStuId', stuId);
}
/**
 * return previous stored seat Id.
 */
export function getClickedSeatId(){
    return localStorage.getItem('currentStuId');
}
