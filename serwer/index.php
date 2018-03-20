<html>
<head>
<title>Fifteen php</title>
<meta charset="utf-8">

<style>
 body 
 {
    text-align:center;
    }

    .fifteenOrder 
    {
    color:#FF7F00;
    }

    .empty
    {
        color:red;
    }
 
    table.fifteenOrder
 {
        background-color: #999888;
        border:2px solid #FF7F00;
        border-radius:8px;
        padding:2px;
        font-size:50px;
        margin: auto;
    }
 
    table.fifteenOrder td
 {
        vertical-align: middle
 }
    table.fifteenOrder td, div
 {
        border-radius:6px;
  border: 2px solid green;
  background: linear-gradient(#111222,#555111);

}
  table.fifteenOrder td div {
      width: 50px;
      height: 50px;
      background: linear-gradient(#118022,#558011);
  }
</style>
<script>
var fifteenOrder = [15,14,13,12,11,10,9,8,7,6,5,4,3,1,2,0];

function init()
{
 var i, div, td;
 for(i=0;i<fifteenOrder.length - 1; i++) 
 {
  div = document.createElement('div');
     
        div.innerHTML=fifteenOrder[i];
 
  td = document.getElementById('t'+i);
  td.appendChild(div);
 } 
}

function areNeighbors(n1, n2) {
  var row1 = Math.floor(n1 /4), 
      column1 = n1 % 4, 
      row2 = Math.floor(n2 / 4), 
      column2 = n2 % 4;
  return row1==row2 && (column1==column2+1 || column2==column1+1) ||
         column1==column2 && (row1==row2+1 || row2==row1+1);
}

function moveCells(from,to) 
{
    
 var i=document.getElementById("t"+from);
 var j=document.getElementById("t"+to);
 
 var k=i.firstChild;
 i.removeChild(k);
 j.appendChild(k);
 
 
} 
function move (place){
  //whether the cell is not empty
   if (fifteenOrder[place]==0) return;
   var emptyCell = fifteenOrder.indexOf(0);
   if (!areNeighbors(place,emptyCell)) return;
   moveCells(place, emptyCell);
   fifteenOrder[emptyCell] = fifteenOrder[place];
   fifteenOrder[place] = 0;
  
}

</script>
</head>

<body onload="init()">

<h1>  <a href="http://h-ua.com">Fifteen</a></h1>
  <table class="fifteenOrder">
   <tr>
        <td id='t0' onclick='move("0")'></td>
        <td id='t1' onclick='move("1")'></td>
        <td id='t2' onclick='move("2")'></td>
        <td id='t3' onclick='move("3")'></td>
   </tr>
   <tr>
      <td id='t4' onclick='move("4")'></td>
      <td id='t5' onclick='move("5")'></td>
      <td id='t6' onclick='move("6")'></td>
      <td id='t7' onclick='move("7")'></td> 
   </tr>  
   <tr>
      <td id='t8' onclick='move("8")'></td>
      <td id='t9' onclick='move("9")'></td>
      <td id='t10' onclick='move("10")'></td>
      <td id='t11' onclick='move("11")'></td>
   </tr>
   <tr>
        <td id='t12' onclick='move("12")'></td>
        <td id='t13' onclick='move("13")'></td>
        <td id='t14' onclick='move("14")'></td>
        <td id='t15' onclick='move("15")'></td>
   </tr>
</table>
 
</body>
</html>