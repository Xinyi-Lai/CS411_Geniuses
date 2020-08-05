var xmlHttp = null
var search_item
var choosedb
var user_id
var tag
var campus
var id_excluded

document.write("<script type='text/javascript' src='getQueryString.js'></script>")

function entersearch(){  
    var event = window.event || arguments.callee.caller.arguments[0];  
　　if (event.keyCode == 13)  
    {  
        jump_to_search();
    }  
}

function jump_to_search(search_tag) {
    search_tag = search_tag || "";
    window.location.href = "search.php?search_item="+document.getElementById("search_box").value+
                                      "&choosedb="+document.getElementById("choosedb").value+
                                      "&campus="+document.getElementById("campus").value+
                                      "&tag="+search_tag;
}

function load_page() {

    load_related(getQueryString("search_item"), 
                 getQueryString("choosedb"), 
                 getQueryString("campus"),
                 getQueryString("user_id"), 
                 getQueryString("tag"),  
                 getQueryString("id_excluded"))
}

function ajax_load_related(){
    load_related(document.getElementById('search_box').value,
                 document.getElementById('choosedb').value,
                 document.getElementById('campus').value)
}
 
function load_related(search_item_, choosedb_, campus_, user_id_, tag_, id_excluded_)
{
    search_item = search_item_ || ''
    choosedb = choosedb_ || 'Sales'
    user_id = user_id_ || ''
    tag = tag_ || ''
    campus = campus_ || ''
    id_excluded = id_excluded_ || ''

    // Get xmlHttpObject object，if null，then the browser doesn't suppport ajax
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return false
    } 
    // Get url
    var url="get_related.php"
    url=url+"?search_item="+search_item+"&choosedb="+choosedb+"&user_id="+user_id+"&tag="+tag+"&campus="+campus+"&id_excluded="+id_excluded
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
            search_info.innerHTML = 'Search '+'"'+search_item+tag+'"'+' in '+choosedb+((user_id) ? (" from "+user_id) : "")
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
