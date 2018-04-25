function getJsonLength(jsonData){
	var jsonLength = 0;
	for(var item in jsonData){
    	jsonLength++;
    }
    return jsonLength;
}