var folderfiles = [];
var auth, authid, token, repourl, curl;

var folder = document.getElementById("folder");

//process files
folder.addEventListener("change", function (e) {
	var files = e.target.files;
    for(i=0; i<files.length; i++) {
    	var file = files[i];
        folderfiles.push(file);
    }
}, false);


$('#submit').click(function(){
    if($("form")[0].checkValidity()) {

	    var username = $("#username").val();
	    var password = $("#password").val();
	    var name = $("#name").val();
	    var description = $("#description").val();

	    auth = btoa(username+':'+password);

	    $("#results").text("Authenticating...");

		$.ajax({ 
		    url: 'https://api.github.com/authorizations',
		    type: 'POST',
		    beforeSend: function(xhr) { 
		        xhr.setRequestHeader("Authorization", "Basic " + auth); 
		    },
		    data: '{"scopes":["repo"],"note":"Create Repo with Ajax"}'
		}).success(function(response) {
			authid = response.id;
			token = response.token;
		    $("#results").text("Authenticated.");
		    postrepo(name,description);
		}).error(function(err) {
		    $("#results").text("Authorization Failed. Check console log.");
		    console.log(err);
		});

    } else {
	    $("#results").text("Please fill out the form.");
	}
});

function postrepo(name,description){

	$("#results").text("Creating GitHub Repository.");

	var postdata = '{"name":"'+name+'","description":"'+description+'","auto_init":true}';

	$.ajax({ 
		url: 'https://api.github.com/user/repos',
		type: 'POST',
		beforeSend: function(xhr) { 
			xhr.setRequestHeader("Authorization", "token " + token); 
		},
		data: postdata
	}).done(function(response) {
		curl = response.contents_url;
		repourl = response.html_url;
		$("#results").text("Created Repository.");
		postfiles(curl);
	}).error(function(err) {
		$("#results").text("Repo Creation Failed. Check console log.");
		console.log(err);
	});

}

function postfiles(){

  $("#results").text("Uploading Files to GitHub Repository. "+folderfiles.length+" files left to upload.");

  if(folderfiles.length>0){

	var f = folderfiles.pop();

	var filename = f.webkitRelativePath;
	var filemessage = "uploading a file";

	var reader = new FileReader();

	reader.onload = function(e) {

		var filecontent = reader.result;
		//var basecontent = btoa(filecontent);
		var basecontent = btoa(unescape(encodeURIComponent(filecontent)));
		var apiurl = curl.replace('{+path}',filename);
		var filedata = '{"message":"'+filemessage+'","content":"'+basecontent+'"}';

			$.ajax({ 
			    url: apiurl,
			    type: 'PUT',
			    beforeSend: function(xhr) { 
			        xhr.setRequestHeader("Authorization", "token " + token);
			    },
			    data: filedata
			}).done(function(response) {
				$("#results").text("Uploading...");
				postfiles();
			}).error(function(err) {
				$("#results").text("File Upload Failed.");
				console.log(err);
				postfiles();
			});

	}

	reader.readAsText(f,"UTF-8");

  } else {
	delauth();
  }

}

function delauth(){
	$.ajax({ 
		url: 'https://api.github.com/authorizations/'+authid,
		type: 'DELETE',
		beforeSend: function(xhr) { 
			xhr.setRequestHeader("Authorization", "Basic " + auth); 
		}
	});

	var htmlcode = 'Finished. Check it out: <a href="'+repourl+'">'+repourl+'</a>';
	$("#results").html(htmlcode);
}

