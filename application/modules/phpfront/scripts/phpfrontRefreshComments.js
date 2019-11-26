
/********3 FUNCTIONS IN THIS SCRIPT************************************/
//function phpfrontRefreshComments_MAIN() // STARTED AT THE BOTTOM OF THE PAGE WITH INTERVAL EVERY 7 SECONDS
//CALL THE NEXT TWO FUNCTIONS TO GET REFRESHED ALL COMMENTS (ONLY COMMENTS DIV, NO NEW COMMENT DIV)
//
//function phpfrontRefreshComments_GET_POST_IDS () // 
//GET ALL  POSTS-IDS FOR COMMENTS AND SEND TO THE NEXT FUNCTION TO GET COMMENTS_HTML BY POST ID
//
//function phpRefreshCommentsByPostId_GET_HTML(postId) // GET COMMENTS HTML FOR POST ID



//console.log("phpfrontRefreshComments loaded");
function phpfrontRefreshCommentsByPostId_GET_HTML(postId)
{

    var myusernow = localStorage["poorbook.myuserid"];

    $.post("application/modules/phpfront/phpfrontRefreshCommentsByPostId_GET_HTML.php",
    {
            myusernow: myusernow,
            postId: postId
    },

    /***********************************************************************/
    //post back function
    function (data, status)
    {
        //console.log( "phpfrontShowPostById.js Data Loaded: " + data);
        $("#myDivAllComments"+postId).html(data);
//        $("#testingoo").html(data);       
        
        phpgeneralCommentsScrollAllDown();
        phpgeneralTranslatorChooseLanguage();

    });

}



function phpfrontRefreshComments_GET_POST_IDS()
{

    setStatus('Loading...','divLoadingStatus');
    //var myuserid = localStorage["poorbook.myuserid"];

    $('.divAllCommentsPostId').each(function(i, obj) 
    {
            var postId= $(this).text();
            phpfrontRefreshCommentsByPostId_GET_HTML(postId);
            
            //console.log(postId);
    });	
                
}



function phpfrontRefreshComments_MAIN() // STARTED AT THE BOTTOM OF THE PAGE WITH INTERVAL EVERY 7 SECONDS
{
                //console.log("phpfrontRefreshComments started inside");
//		var myusernow = localStorage["poorbook.myuserid"];
//		alert(myusernow);
                phpfrontRefreshComments_GET_POST_IDS();

}



//INITIALIZE FUNCTION WHEN THE SCRIPT IS LOADED: AUTO-RUN EVERY 10 SECONDS
var phpfrontRefreshCommentsStop=setInterval(function(){phpfrontRefreshComments_MAIN();},70000);




