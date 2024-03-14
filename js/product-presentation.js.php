function getData(element,data,url)
{


var col = data.split("-");
var from = parseInt(col[0])+1;
var to = parseInt(col[1]);

$.post(url+"learnmore/product-presentation/more",{type:"Product Info",data:from,videoVersion:$("#cboVideoVersion").val()}, function(data){

$(element).parent().empty();
$("#wp-all-wrapper").append(data);

});


}
