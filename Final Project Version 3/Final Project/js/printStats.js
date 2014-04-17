// JavaScript Document
function printStats()
{
   var printStats=document.getElementById("table");
   newWin= window.open("");
   newWin.document.write(printStats.outerHTML);
   newWin.print();
   newWin.close();
}

$('printButton').on('click',function(){
printStats();
})
