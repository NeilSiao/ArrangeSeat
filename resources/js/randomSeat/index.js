import {iterateSeats} from '../arrangeSeat/DOM/seatDom';
import {setSeatList, setStuList} from '../arrangeSeat/module/constructor';
import { bindModalEvent, startRandom } from './event'

window.iterateSeats = iterateSeats;
window.setSeatList = setSeatList;
window.setStuList = setStuList;
window.bindModalEvent = bindModalEvent;

$(function(){
    var saveBtn = document.getElementById('saveModal');
    $("#randomBtn").on('click', startRandom);
    
    $('#studentModal').on('shown.bs.modal', function (evt) {
        $('#StudentNo').trigger('focus')
      })


    $('#saveModal').on('click', function(){
        
    });


});