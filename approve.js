var xmlHttp

function approve_sale(id, table) {

    // Get xmlHttpObject object，if null，then the browser doesn't suppport ajax
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert ("Browser does not support HTTP Request");
        return false;
    }
    // Get url
    var url = "approve.php";
    url = url + "?id=" + id;
    url = url + "&table=" + table;
    url = url + "&sid=" + Math.random();
    // Set the callback function
    xmlHttp.onreadystatechange=refreshPage;
    //open
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
    return false
} 

// Refresh page
function refreshPage() {
    // Some delay to wait for the database to be ready
    var t = setTimeout("location.reload()",100);
}
 
// Get xmlHttp object
function GetXmlHttpObject() {
    var xmlHttp=null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
