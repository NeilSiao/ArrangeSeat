import {addSeatToRoom} from './arrangeSeat/control/seatControl';
import { seatList } from './arrangeSeat/module/constructor';
import { iterateSeats } from './arrangeSeat/DOM/seatDom';
import $ from 'jquery';

window.iterateSeats = iterateSeats;
window.setSeatList = setSeatList;

$(function(){
    var btn = document.getElementById('addBtn');
    var saveBtn = document.getElementById('saveBtn');
    btn.onclick= function(evt){
        evt.preventDefault();
        addSeatToRoom();
    }

    saveBtn.onclick = function(evt){
        evt.preventDefault();
        console.log(evt);
        console.log(seatList);
        var dataSet =  JSON.stringify(seatList);
        console.log(evt.form);
        var input = $('input[name=seatList]');
        input.remove();
       
        console.log(input);
        $('<input>').attr({
            type: 'hidden',
            name: 'seatList',
            value: dataSet
        }).appendTo('form');

        $('<input>').attr({
            type: 'hidden',
            name: 'roomOption',
            value: $("#roomOption").val()
        }).appendTo('form');

        $("#seatListForm").submit();
    } 
})

function setSeatList(input){
    console.log(input)
    input.forEach(element => {
        seatList.push(element)
    });
    
    console.log(seatList);
}


