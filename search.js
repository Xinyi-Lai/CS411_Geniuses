var xmlHttp = null
var search_item
var choosedb
var user_id
var tag

document.write("<script type='text/javascript' src='getQueryString.js'></script>")

function entersearch(){  
    var event = window.event || arguments.callee.caller.arguments[0];  
　　if (event.keyCode == 13)  
    {  
        jump_to_search();
    }  
}

function jump_to_search() {
    window.location.href = "search.php?search_item="+document.getElementById("search_box").value+
                                      "&choosedb="+document.getElementById("choosedb").value;
}

function load_page() {
    search_item = getQueryString("search_item")
    choosedb = getQueryString("choosedb")
    user_id = getQueryString("user_id")
    tag = getQueryString("tag")
    load_related(search_item, choosedb, user_id, tag)
}
 
function load_related(search_item, choosedb, user_id, tag)
{
    // Get xmlHttpObject object，if null，then the browser doesn't suppport ajax
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return false
    } 
    // Get url
    var url="get_related.php"
    url=url+"?search_item="+search_item+"&choosedb="+choosedb+"&user_id="+user_id+"&tag="+tag
    url=url+"&sid="+Math.random()
    // Set the callback function
    xmlHttp.onreadystatechange=stateChanged 
    //open
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
    return false
} 
 
function stateChanged() 
{ 
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    { 
        // Set the html content
        document.getElementById("related").innerHTML=xmlHttp.responseText 
        var search_info = document.getElementById("search_info")
        if (search_info){
            search_info.innerHTML = 'Search '+'"'+search_item+'"'+' in '+choosedb+((user_id) ? (" from "+user_id) : "")
        }
        return false
    } 
}
 
// Get xmlHttp object
function GetXmlHttpObject()
{
    var xmlHttp=null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
