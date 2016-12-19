var params={};

var initEditor= ( function(edt) {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function(edt) {
		var editorElement = CKEDITOR.document.getById( edt);

		// :(((
		if ( isBBCodeBuiltIn ) {
			editorElement.setHtml(
				'Hello world!\n\n' +
				'I\'m an instance of [url=http://ckeditor.com]CKEditor[/url].'
			);
		}

		// Depending on the wysiwygare plugin availability initialize classic or inline editor.
		if ( wysiwygareaAvailable ) {
			CKEDITOR.replace( edt);
		} else {
			editorElement.setAttribute( 'contenteditable', 'true' );
			CKEDITOR.inline( edt);

			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();


function botrun() {
	$.ajax({
		type: 'POST',
		dataType: 'json',
		timeout: 30000,
		url: params.site+"/buildfake/botrunexec",
		success: function (data) {

		}
	});
}

function showTimerRemaining(date,dayelement,hourelement,minuteselement,secondselement) {
	var upgradeTime = date-Math.floor(Date.now() / 1000);
	var seconds = upgradeTime;

	var days        = Math.floor(seconds/24/60/60);
    var hoursLeft   = Math.floor((seconds) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    if (minutes < 10) {
       minutes = "0" + minutes; 
    }
    if (days  < 10) {
       days  = "0" + days; 
    }
    if (hours < 10) {
       hours= "0" + hours; 
    }

	dayelement.html(days);
    hourelement.html(hours);
    minuteselement.html(minutes);
    secondselement.html(remainingSeconds);

	setInterval(function(){
		var days        = Math.floor(seconds/24/60/60);
	    var hoursLeft   = Math.floor((seconds) - (days*86400));
	    var hours       = Math.floor(hoursLeft/3600);
	    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
	    var minutes     = Math.floor(minutesLeft/60);
	    var remainingSeconds = seconds % 60;
	    if (remainingSeconds < 10) {
	        remainingSeconds = "0" + remainingSeconds; 
	    }
	    if (minutes < 10) {
	       minutes = "0" + minutes; 
	    }
	    if (days  < 10) {
	       days  = "0" + days; 
	    }
	    if (hours < 10) {
	       hours= "0" + hours; 
	    }

	    dayelement.html(days);
	    hourelement.html(hours);
	    minuteselement.html(minutes);
	    secondselement.html(remainingSeconds);
	    if (seconds == 0) {
	        clearInterval(this);
	    } else {
	        seconds--;
	    }
	},1000);
	
}


