/* 
File Name: printStats.js
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This script prints the user's table, opening a print window similar to CTRL+P but it prints the table only. 
*/
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
