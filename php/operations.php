<?php
require_once ("db.php");
require_once ("component.php");

$con=Createdb();

//Create Button Click
if(isset($_POST['create'])){
    createData();
}
if(isset($_POST['update'])){
    updateBook();
}

if(isset($_POST['delete'])){
    deleteBook();
}

if(isset($_POST['deleteAll'])){
    deleteAll();
}

function createData(){
 $bookName=textBoxValue("book_name");
 $bookAuthor=textBoxValue("book_author");
 $bookGivenTo= textBoxValue("book_given_to");
 $bookPublisher=textBoxValue("book_publisher");
 $bookPrice= textBoxValue("book_price");

if($bookName && $bookAuthor  || $bookGivenTo && $bookPublisher && $bookPrice){
$sql=" INSERT INTO books(book_name,book_author,book_given_to,book_publisher,book_price)
 VALUES('$bookName','$bookAuthor','$bookGivenTo','$bookPublisher','$bookPrice')";
if(mysqli_query($GLOBALS['con'],$sql)){
    echo TextNode("success","Record Added");

}else{
    echo "Record Not Inserted due to Following Error".mysqli_connect_error();
}
}else{
echo TextNode("error","Provide Data In Text Box");
}

}

function textBoxValue($value){
$textBox=mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
if(empty($textBox)){
    return false;
}else{
    return $textBox;
}

}
//messages
function TextNode($classname,$msg){
    $elememt ="<h6 class='$classname'>$msg</h6>";
    echo $elememt;
}

//Get Data From MySQL Database
function getBook(){
    $sql= "SELECT * FROM books";
    $result=mysqli_query($GLOBALS['con'],$sql);

    if(mysqli_num_rows($result)>=0) {
        while ($row = mysqli_fetch_assoc($result)) {
       return $result;
        }
    }
}

function updateBook(){
$bookid=textBoxValue("book_id");
$bookname=textBoxValue("book_name");
$bookauthor=textBoxValue("book_author");
$bookgivento=textBoxValue("book_given_to");
$bookpublisher=textBoxValue("book_publisher");
$bookprice=textBoxValue("book_price");
if($bookname || $bookauthor) {
    $sql = " UPDATE books SET book_name='$bookname',book_author='$bookauthor',
 book_given_to='$bookgivento',book_publisher='$bookpublisher',
 book_price='$bookprice' WHERE book_id='$bookid';
";
    if(mysqli_query($GLOBALS['con'],$sql)){
TextNode("success","Data Updated");
    } else{
      TextNode("error","Error In Updating");
    }
}  else{
    TextNode("error","Select Using Edit Icon");
}
}

//Delete Book
function deleteBook(){
    $bookid=(int)textBoxValue("book_id");
$sql="DELETE FROM books WHERE book_id=$bookid";

    if(mysqli_query($GLOBALS['con'],$sql)){
    TextNode("success","Record Deleted...!");
}else{
    TextNode("error","Unable To Delete");
}
}

function deleteBtn(){
    $result=getBook();
    $i=0;
    if($result){
    while($row=mysqli_fetch_assoc($result)){
        $i++;
        if($i>3){
           buttonElement("btn-deleteAll","btn btn-danger","<i class='fas fa-trash'></i>Delete All","deleteAll","");
        return;
        }
    }
}
}

function deleteAll(){
    $sql="DROP TABLE books";
    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","All Records Deleted");
        Createdb();
    }else{
        TextNode("error","Record Cannot Be Deleted");
    }
}

//set to TextBox
function setBookId(){
    $getBookId=getBook();
    $id=0;
    if($getBookId){
        while($row=mysqli_fetch_assoc($getBookId)){
            $id=$row['book_id'];
        }

    }
    return $id+1;
}