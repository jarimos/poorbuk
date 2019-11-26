/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getSelectionHtml() 
{
/*
//DEPENDS ON:
//CALL // GET THE SELECTED TEXT 
getSelectionHtml()
*/
    var mySelection = "";

    if (typeof window.getSelection !== "undefined") 
    {
        var sel = window.getSelection();
		
		//alert("getSelection = "+sel)
		//alert("sel.rangeCount =" +sel.rangeCount)
		
        if (sel.rangeCount) 
        {
            var container = document.createElement("div");
            for (var i = 0, len = sel.rangeCount; i < len; ++i) 
            {
                //alert("sel.getRangeAt(i) = " +sel.getRangeAt(i))
                container.appendChild(sel.getRangeAt(i).cloneContents());
            }
			
            mySelection = container.innerHTML;
        }
    } 
    else if (typeof document.selection !== "undefined") 
    {
        if (document.selection.type === "Text") 
        {
            mySelection = document.selection.createRange().htmlText;
        }
    }
    
    return mySelection ;

}


function myPromptWordSeached (myMessagePrompt)
{
/*
//DEPENDS ON:
    myClearAllTextSearchCSS();
//CALL // SHOW INPUT BOX TO USER WITH A MESSAGE 
var myMessagePrompt ="Enter the word to find";
var myWordToFind = myPromptWordSeached (myMessagePrompt);
*/
    var mySelection =  getSelectionHtml();
    var myWordToFind = prompt(myMessagePrompt, mySelection);

    if (myWordToFind !== null) 
    {
        //document.getElementById("demo").innerHTML =
        //"You are searching for " + myWordToFind + "! How are you today?";
        return myWordToFind;
    }
    else
    {
        myClearAllTextSearchCSS();
        exit;
    }
	
}


function myFindWord(myDivId)
{
/*
//DEPENDS ON: 
    myPromptWordSeached (myMessagePrompt);
    myClearAllTextSearchCSS();
        
//CSS STYLE
    <style>
    .findYellow{
        background-color: yellow;
        font-size: 40px;
        font-family: sans-serif;
    }
    </style>       
   
//CALL // FIND A WORD INTRODUCED BY THE USER 
var myDivId = "jarimTextId";
myFindWord(myDivId);
*/
    
    //GET THE WORD FROM USER PROMPT
    var myMessagePrompt ="Enter the word to find";
    var myWordToFind = myPromptWordSeached (myMessagePrompt);

    //INITIALIZE HTML TEXT TO jarimTextId
    //$("#jarimTextId").text($( "#main" ).html());

    //FIND TEXT AND MAKE IT HIGHLIGHT
    var re = new RegExp(myWordToFind,"gi");
 
    //var n = $('#jarimTextId').text().search(re);
    var n = $("#"+ myDivId).text().search(re);
    //alert(n);
    if(n!==-1)//WORD FOUND
    {
        var myFoundedWordWithCSS = $("#"+ myDivId).text().replace(re,"<span class='findYellow' >"+myWordToFind+"</span>");
       //var myWordToFind = $('#jarimTextId').text().replace(/"John"/g,"<span class='findYellow' >"+myWordToFind+"</span>");
       $("#"+ myDivId).html(myFoundedWordWithCSS);
       //alert("lorttttt!!!");
       return myWordToFind;       
    }
    else//WORD NOT FOUND
    {
        alert("Your word to search does not exist");
        return false;   
    }


}



function myClearAllTextSearchCSS()
{
/*
//DEPENDS ON: 
 
//CALL // CLEAR ALL THE SEARCH-CSS CREATED WHEN SEARCHING-REPLACING TEXT 
//KEEPING ONLY THE TEXT, SO THE YELLOW BACKGROUND AND BIG FONT SIZE DISSAPEAR
myClearAllTextSearchCSS();
*/
    //GET THE FIRST ELEMENT TEXT 
    //var myFoundedText = $(".findYellow").first().text(); 
     //DELETE SPAN: REPLACE ALL SPAN ELEMENTS CLASS=findYellow WITH ONLY THE TEXT INSIDE SPAN
    //$( ".findYellow" ).replaceWith(myFoundedText);
}


function myReplaceText(myDivId)
{
/*
//DEPENDEDS ON: 
    myPromptWordSeached (myMessagePrompt);
    myClearAllTextSearchCSS();
    myFindWord();
//CALL // REPLACE TEXT INTRODUCED BY THE USER - 
//THE USER CAN PRESS NEXT-CANCEL BUTTON
var myDivId = "jarimTextId";
myReplaceText(myDivId);
        
*/
    myClearAllTextSearchCSS();
    //REPLACE NEXT FUNCTION 
    

    //FIRST FIND THE WORDS
    var myFoundedText = myFindWord(myDivId);
    //NOW REPLACE
    var myMessagePrompt = "Enter the new word";
    var myNewText = myPromptWordSeached (myMessagePrompt);

    $( ".findYellow" ).each(function(index) 
    {
        var myFoundedText = $(this).text();
        $(this).css("background-color","red");
        //alert(index);
        var r = confirm("Replace "+myFoundedText+" with "+ myNewText +" ?" );
        if (r === true) 
        {
                //txt = "You pressed OK!";
                $(this).replaceWith(myNewText);
        } 
        else 
        {
                //txt = "You pressed Cancel!";
                myClearAllTextSearchCSS();
                exit;
        }

        //alert(index);
    });

}


function textEditorReplaceAll(myDivId)
{
/*
//DEPENDEDS ON: 
    myPromptWordSeached (myMessagePrompt);
    myClearAllTextSearchCSS();
    myFindWord();
//CALL // REPLACE ALL TEXT INTRODUCED BY USER
var myDivId = "jarimTextId";
textEditorReplaceAll(myDivId);   
*/

    //FIRST FIND THE WORDS
    var myFoundedText = myFindWord(myDivId);
    //NOW REPLACE
    var myMessagePrompt ="Enter the new word";
    var myNewText = myPromptWordSeached (myMessagePrompt);

    $( ".findYellow" ).each(function( index ) 
    {
        var myFoundedText = $(this).text();
        $(this).css("background-color","red");

        //var txt="";
        var r = confirm("Replace ALL??? "+myFoundedText+" with "+ myNewText +" ?" );
        if (r === true) 
        {
            //txt = "You pressed OK!";

            $( ".findYellow" ).each(function( index ) 
            {
                $(this).replaceWith(myNewText);
            });

            exit;

        } 
        else 
        {
            txt = "You pressed Cancel!";
            myClearAllTextSearchCSS();
            exit;
        }

        document.getElementById("demo").innerHTML = txt;
        //alert(index);
    });


}




$( "body" ).on( "click", "#searhTextEditor", function()
{
    //pass the Div-Id to a variable
    var myDivId = "jarimTextId";
    myFindWord(myDivId);

});//END ONCLICK

$( "body" ).on( "click", "#reinitializeSearchTextEditor", function()
{
    alert("You are what youy are");
    myClearAllTextSearchCSS();

	 
});//END ONCLICK


$( "body" ).on( "click", "#replaceTextEditor", function()
{
    //pass the Div-Id to a variable
    var myDivId = "jarimTextId";	
    myReplaceText(myDivId);

});//END ONCLICK


$( "body" ).on( "click", "#replaceAllTextEditor", function()
{
    //pass the Div-Id to a variable
    var myDivId = "jarimTextId";
    textEditorReplaceAll(myDivId);

});//END ONCLICK




