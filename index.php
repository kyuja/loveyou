<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<script src="xlsx.full.min.js"></script>
</head>
<body>
	<div id="field_MainModule">
		<p> field Main Module </p>
	</div>
	<div id="field_RelatedModule">
		<p> field Related Module </p>
	</div>


  <script>

//function a (){
  var url = "Book1.xlsx";
  var oReq = new XMLHttpRequest();
  oReq.open("GET", url, true);
  oReq.responseType = "arraybuffer";

  oReq.onload = function(e) {
    var arraybuffer = oReq.response;

    /* convert data to binary string */
    var data = new Uint8Array(arraybuffer);
    var arr = new Array();
    for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
    var bstr = arr.join("");

    /* Call XLSX */
    var workbook = XLSX.read(bstr, {type:"binary"});

    /* DO SOMETHING WITH workbook HERE */
    var first_sheet_name = workbook.SheetNames[0];
		var second_sheet_name = workbook.SheetNames[1];

		console.log(first_sheet_name)
		console.log(second_sheet_name)

    /* Get worksheet */
    var worksheet = workbook.Sheets[second_sheet_name];
    //console.log(XLSX.utils.sheet_to_json(worksheet,{raw:true}));
		var jsonWS = XLSX.utils.sheet_to_json(worksheet,{raw:true});
		console.log(jsonWS)


	  }

  oReq.send();
//}
  </script>

</body>
</html>
