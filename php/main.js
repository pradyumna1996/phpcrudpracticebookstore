let bookid= $("input[name*='book_id']")
bookid.attr("readonly","readonly");

$(".btnedit").click(e=>{
let textvalues=displayData(e);

let bookname= $("input[name*='book_name']");
let bookauthor= $("input[name*='book_author']");
let bookgivento= $("input[name*='book_given_to']");
let bookpublisher= $("input[name*='book_publisher']");
let bookprice=$("input[name*='book_price']");

bookid.val(textvalues[0]);
bookname.val(textvalues[1]);
bookauthor.val(textvalues[2]);
bookgivento.val(textvalues[3]);
bookpublisher.val(textvalues[4]);
bookprice.val(textvalues[5]);
});

function displayData(e) {
let id=0;
const td=$("#tbody tr td");
let textvalues=[];

for(const value of td){
    if(value.dataset.id == e.target.dataset.id) {
        textvalues[id++]=value.textContent;
    }
}
return textvalues;
}