import {v4 as uuidv4} from 'uuid';
export function unique(){
    return uuidv4();
}

export function getRotationegrees(obj){
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform") ||
    obj.css("-ms-transform") ||
    obj.css("-o-transform") ||
    obj.css("transform");

    if(matrix !== "none"){
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a)) * (108/Math.PI);
    }else {
        var angle = 0;
    }

    return (angle < 0 ) ? angle + 360 : angle;
}