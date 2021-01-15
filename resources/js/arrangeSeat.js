import {addSeatToRoom} from './control/seatControl';
import { seatList } from './module/constructor';
import $ from 'jquery';

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
        //evt.form.submit();

    }
})

